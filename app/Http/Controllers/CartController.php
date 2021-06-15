<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;

class CartController extends Controller
{
    public function cart(){

    	// Check Login
    	if(!Auth::user()) {
            return redirect('/login');
        }
        elseif (Auth::user()->level == 'admin') {
        	return redirect('/login')->with('fail','Halaman ini hanya bisa diakses oleh Customers');
        }

        $cart = TransaksiDetail::where('kd_pel',Auth::user()->kd_pel)->where('status','Sedang diproses')->get();
        $harga = Transaksi::where('kd_pel',Auth::user()->kd_pel)->where('status','Sedang diproses')->get();
        $jumlah_pesanan = TransaksiDetail::where('kd_pel',Auth::user()->kd_pel)->where('status','Sedang diproses')->count();
        if(Auth::user()){
            return view('home.cart',['cart'=>$cart,'harga'=>$harga,'jumlah_pesanan'=>$jumlah_pesanan]);
        }

        return view('home.cart',['cart'=>$cart]);
    }

    public function addcart(Request $request, $no){

    	// Check Login
    	if(!Auth::user()) {
            return redirect('/login');
        }
        elseif (Auth::user()->level == 'admin') {
        	return redirect('/login')->with('fail','Halaman ini hanya bisa diakses oleh Customers');
        }

    	$this->validate($request,[
    		'jumlah'=>'required|numeric'      
        ]);

        if ($request->jumlah>0) {

            $number = Transaksi::orderBy('id', 'desc')->first();
            if ($number === null) {
                $kode = 'PSN00001';
            } else {
                $kode = new Transaksi();
                $kode = 'PSN0000' . ($number->id + 1);
            }

            $barang = Barang::where('no', $no)->first();

            $harga_total = $request->jumlah * $barang->harga;

            $pesanan = Transaksi::where('kd_pel', Auth::user()->kd_pel)->where('status', 'Sedang diproses')->first();

            if (empty($pesanan)) {
                Transaksi::create([
                    'kd_psnan' => $kode,
                    'kd_pel' => Auth::user()->kd_pel,
                    'harga_total' => $harga_total,
                    'status' => 'Sedang diproses'
                ]);

                $pesanan = Transaksi::where('kd_pel', Auth::user()->kd_pel)->where('status', 'Sedang diproses')->first();
                $pesanan->update();
            } else {
                $pesanan->harga_total = $pesanan->harga_total + $harga_total;
                $pesanan->update();
            }

            TransaksiDetail::create([
                'kd_psnan' => $pesanan->kd_psnan,
                'kd_pel' => Auth::user()->kd_pel,
                'nama' => $barang->nm_brng,
                'kd_brng' => $barang->kd_brng,
                'jumlah' => $request->jumlah,
                'status' => 'Sedang diproses',
                'total' => $harga_total,
            ]);

            return redirect()->back()->with('success', 'Data berhasil ditambahkan ke keranjang');
        }
        else{
            return redirect()->back()->with('gagal', 'Barang yang akan dibeli tidak boleh kurang dari nol.');
        }
    }
        

    public function delete($id){

        $delete = TransaksiDetail::find($id);

        if (!empty($delete)) {
            $pesanan = Transaksi::where('kd_psnan',$delete->kd_psnan)->first();
            $jumlahpesanan = TransaksiDetail::where('kd_psnan',$pesanan->kd_psnan)->count();
            if ($jumlahpesanan == 1) {
                $pesanan->delete();
            }else{
                $pesanan->harga_total = $pesanan->harga_total-$delete->total;
                $pesanan->update();
            }
            $delete->delete();
        }

        return redirect('/cart')->with('success','Data berhasil dihapus');;
    }

    public function checkout(){
    	$harga = Transaksi::where('kd_pel',Auth::user()->kd_pel)->where('status','Sedang diproses')->get();
    	$jumlah_pesanan = TransaksiDetail::where('kd_pel',Auth::user()->kd_pel)->where('status','Sedang diproses')->count();
    	$checkout = User::where('kd_pel',Auth::user()->kd_pel)->get();
    	return view('home.checkout',['checkout' => $checkout,'jumlah_pesanan'=>$jumlah_pesanan,'harga'=>$harga]);
    }

    public function editcheckout($id){
    	$harga = Transaksi::where('kd_pel',Auth::user()->kd_pel)->where('status','Sedang diproses')->get();
    	$jumlah_pesanan = TransaksiDetail::where('kd_pel',Auth::user()->kd_pel)->where('status', 'Sedang diproses')->count();
    	$checkout = User::where('id',$id)->get();
    	return view('home.editcheckout',['checkout' => $checkout,'jumlah_pesanan'=>$jumlah_pesanan,'harga'=>$harga]);
    }

    public function posteditcheck(Request $request){
    	$this->validate($request,[
            'forename' => 'required',
            'surname' => 'required',
            'telp' => 'required|numeric|digits_between:10,13',
            'prov_pel' => 'required',
            'kot_pel' => 'required',
            'kec_pel' => 'required',
            'kd_pos' => 'required|numeric|digits:5',
            'al_detail' => 'required',
        ]);

        User::where('id',$request->id)->update([
            'forename' => $request->forename,
            'surname' => $request->surname,
            'telp' => $request->telp,
            'prov_pel' => $request->prov_pel,
            'kot_pel' => $request->kot_pel,
            'kec_pel' => $request->kec_pel,
            'kd_pos' => $request->kd_pos,
            'al_detail' => $request->al_detail,
        ]);

        $metode = Transaksi::where('kd_pel',Auth::user()->kd_pel)->where('status','Sedang diproses')->first();
        $metode->metode = $request->metode;
        $metode->update();

        return redirect('/cart/checkout')->with('hore','Data berhasil diubah');

    }

    public function postcheckout(Request $request){

        $this->validate($request,['metode' => 'required']);

        $metode = Transaksi::where('kd_pel',Auth::user()->kd_pel)->where('status','Sedang diproses')->first();
        $metode->status = 'Belum dibayar';
        $metode->metode = $request->metode;
        $metode->update(); 

        $status = TransaksiDetail::where('kd_pel',Auth::user()->kd_pel)->where('status','Sedang diproses')->first();
        $status->status = '';
        $status->update();

        return redirect('/history')->with('mantap','Sukses Checkout.');
    }

    // history
    public function history(){

        // Check Login
        if(!Auth::user()) {
            return redirect('/login');
        }
        elseif (Auth::user()->level == 'admin') {
            return redirect('/login')->with('fail','Halaman ini hanya bisa diakses oleh Customers');
        }

        if(Auth::user())
        {
        	$history = Transaksi::where('kd_pel', Auth::user()->kd_pel)->get();
        }
        return view('home.history',['history'=>$history]);
    }

    public function detailhistory($kd_psnan){

        $transaksi = Transaksi::where('kd_psnan',$kd_psnan)->first();
        $transaksi_detail = TransaksiDetail::where('kd_psnan',$transaksi->kd_psnan)->get();
        return view('home.detail', compact('transaksi','transaksi_detail'));
    }
}

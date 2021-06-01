<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function addbrg(){
        return view('admin.barang.addbrg');
    }

    public function add(Request $request){
    	$this->validate($request,[
            'nm_brng' => 'required',
            'kategori' => 'required',
            'berat' => 'required|numeric',
            'satuan' =>'required',
            'jmlh' => 'required|numeric',
            'harga' => 'required|numeric',
            'desc' => 'required'       
        ]);

        $number = Barang::orderBy('no','desc')->first();
        if ($number === null) {
            $kode = 'BRG00001';
        }else{
            $kode = new Barang();
            $kode = 'BRG0000'.($number->no+1);
        }

        if ($request->hasfile('img_brng')) {
            $image = $request->file('img_brng');
            $imageName = time()."_".$image->getClientOriginalName();
            $imgLoc = 'assets/goods';
            $image->move($imgLoc,$imageName);
        }else{
            $imageName = 'default.png';
        }

    	Barang::create([
            'nm_brng' => $request->nm_brng,
            'kategori' => $request->kategori,
            'kd_brng' => $kode,
            'berat' => $request->berat,
            'satuan' => $request->satuan,
            'jmlh' => $request->jmlh,
            'harga' => $request->harga,
            'desc' => $request->desc,
            'img_brng'=>$imageName
        ]);
	    return redirect('/mainadmin/barang')->with('success','Data berhasil ditambahkan');
	}

    public function ebrg($no){
        $barang = DB::table('barang')->where('no',$no)->get();
        
        return view('admin.barang.ebrg',['barang'=>$barang]);
    }

    public function edit(Request $request){
        $this->validate($request,[
            'nm_brng' => 'required',
            'kategori' => 'required',
            'berat' => 'required|numeric',
            'satuan' => 'required',
            'jmlh' => 'required|numeric',
            'harga' => 'required|numeric',
            'desc' => 'required'
        ]);

        if ($request->hasfile('img_brng')) {
            $image = $request->file('img_brng');
            $imageName = time()."_".$image->getClientOriginalName();
            $imgLoc = 'assets/goods';
            $image->move($imgLoc,$imageName);
            Barang::where('no',$request->no,)->update(['img_brng'=>$imageName]);
        }

        Barang::where('no',$request->no,)->update([
            'nm_brng' => $request->nm_brng,
            'kategori' => $request->kategori,
            'berat' => $request->berat,
            'satuan' => $request->satuan,
            'jmlh' => $request->jmlh,
            'harga' => $request->harga,
            'desc' => $request->desc
        ]);
        return redirect('/mainadmin/barang')->with('success','Data berhasil diubah');
    }
    public function dbrg($no){
        DB::table('barang')->where('no',$no)->delete();
        return redirect('/mainadmin/barang')->with('success','Data berhasil dihapus');;
    }
}
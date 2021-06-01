<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;

class AdminController extends Controller{
    // login, register, dan forgot password
    public function admin(){
    	return view('admin.admin');
    }
    public function postLogin(Request $request){
    	if(!Auth::attempt([
    		'email'=>$request->email,
    		'password'=>$request->password
    	])){
    		return redirect()->back()->with('fail','Masukkan email dan password yang benar');
    	}
    	return redirect('/mainadmin')->with('berhasil','Berhasil Login');
    }

    public function register(){
    	return view('admin.register');
    }
    public function postRegister(Request $request){
    	$this->validate($request,[
    		'forename' => 'required|min:4',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|confirmed|min:5'
    	]);
        $imageName = "default.png";
        $level = "admin";
    	User::create([
    		'forename' => $request->forename,
    		'email' => $request->email,
    		'password' => bcrypt($request->password),
            'level' => $level,
            'image' =>  $imageName,
    	]);
    	return redirect('/admin')->with('success','Berhasil daftar akun');
    }

    public function forgot(){
        return view('admin.editpass');
    }
    public function editpsw(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5'
        ]);
        if ($validator->fails()) {
            User::where('email',$request->email)->update(['password' => bcrypt($request->password)]);
            return redirect()->back()->with('success','Password berhasil diubah');
        }else
           return redirect()->back()->with('fail','Email tidak terdaftar. Silahkan lakukan registrasi.'); 
    }

    //main
    public function mainadmin(){
        $akun = User::get();
        return view('mainadmin',['akun'=>$akun]);
    }
    public function dashboard(){
        $akun = User::get();
        $j_brng = DB::table('barang')->count();
        $j_cstmr = DB::table('users')->where('level','customers')->count();
        $j_trans = DB::table('transaksi')->count();
        $transaksi = Transaksi::where('status','Sudah dibayar')->sum('harga_total');

        return view('admin.dashboard'
            ,[
                'itembrg' => $j_brng,
                'itemcstmr' => $j_cstmr,
                'akun'=>$akun,
                'itemtrans' => $j_trans,
                'transaksi' => $transaksi,
            ]
        );
    }
    public function customers(){
        $customers = User::where('level','customers')->paginate(5);
        return view('admin.customers.customers',['customers'=>$customers]);
    }
    public function barang(){
        $barang = Barang::paginate(5);
        return view('admin.barang.barang',['barang'=>$barang]);
    }
    public function transaksi(){
        $transaksi = Transaksi::paginate(5);
        return view('admin.transaksi',['transaksi' => $transaksi]);
    }
    public function akun(){
        $akun = User::get();
        return view('admin.akun.akun',['akun'=>$akun]);
    }

    // Search
    public function searchbrg(Request $request){
        $search = $request->get('search');
        $barang = Barang::where('nm_brng','like','%'.$search.'%')->paginate(5);
        return view('admin.barang.barang',['barang'=>$barang]);
    }
    public function searchcstmr(Request $request){
        $search = $request->get('search');
        $customers = User::where([
            ['level','customers'],
            ['forename','like','%'.$search.'%'],
        ])->paginate(5);
        return view('admin.customers.customers',['customers'=>$customers]);
    }
    public function searchtrans(Request $request){
        $search = $request->get('search');
        $transaksi = Transaksi::where('kd_psnan','like','%'.$search.'%')->paginate(5);
        return view('admin.transaksi',['transaksi'=>$transaksi]);
    }

    // CRUD Akun
    public function eakun($id){
        $akun = User::where('id',$id)->get();
        return view('admin.akun.eakun',['akun'=>$akun]);
    }
    public function edit4(Request $request){
        $this->validate($request,[
            'forename' => 'required',
            'telp' => 'required|numeric|digits_between:10,13',
            'email' => 'required|email',
            'al_detail' => 'required',   
        ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time()."_".$image->getClientOriginalName();
            $imgLoc = 'assets/account';
            $image->move($imgLoc,$imageName);
            User::where('id',$request->id,)->update(['image'=>$imageName]);
        }

        User::where('id',$request->id)->update([
            'forename' => $request->forename,
            'telp' => $request->telp,
            'email' => $request->email,
            'al_detail' => $request->al_detail
        ]);
        return redirect('/mainadmin/akun')->with('success','Data berhasil diubah');
    }
    public function epswd($id){
        return view('admin.akun.epassword');
    }
    public function edit5(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5'
        ]);
        if ($validator->fails()) {
            User::where('email',$request->email)->update(['password' => bcrypt($request->password)]);
            return redirect('/mainadmin/akun')->with('success','Password berhasil diubah.');
        }else
           return redirect()->back()->with('fail2','Email tidak terdaftar. Silahkan lakukan registrasi.'); 
    }

    // Transaksi
    public function edittrans($id){

        $transaksi = Transaksi::where('id',$id)->get();
        return view('admin.edittrans',['transaksi'=>$transaksi]);
    }

    public function postedit(Request $request){

        $this->validate($request,['status' => 'required']);
        Transaksi::where('id',$request->id)->update(['status' => $request->status]);
        $kode = TransaksiDetail::get();
        TransaksiDetail::where('kd_psnan',$kode)->update(['status' => $request->status]);
        return redirect('/mainadmin/transaksi')->with('success','Data berhasil diubah');
    }

    public function detailtrans($kd_psnan)
    {

        $transaksi = Transaksi::where('kd_psnan', $kd_psnan)->first();
        $transaksi_detail = TransaksiDetail::where('kd_psnan', $transaksi->kd_psnan)->get();
        return view('admin.detailtrans', compact('transaksi', 'transaksi_detail'));
    }

    // Logout
    public function logout(){
        Auth::logout();
        return redirect('/admin')->with('success','Logout berhasil');
    }
}

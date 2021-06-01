<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Barang;
use App\Models\TransaksiDetail;

class MainController extends Controller
{
    public function index(){

        if(Auth::user()){
            $jumlah_pesanan = TransaksiDetail::where('kd_pel',Auth::user()->kd_pel)->where('status','Sedang diproses')->count();
            return view('main',['jumlah_pesanan'=>$jumlah_pesanan]);
        }

    	return view('main');
    }

    public function main(){

        $barang = Barang::whereDate('updated_at', '=', date('Y-m-d'))->paginate(4);
        $mringan = Barang::where('kategori','ringan')->paginate(4);
        $mpokok = Barang::where('kategori','pokok')->paginate(4);
        if(Auth::user()){
            $jumlah_pesanan = TransaksiDetail::where('kd_pel',Auth::user()->kd_pel)->where('status','Sedang diproses')->count();
            return view('home.konten',[
                'barang'=> $barang,
                'mringan' => $mringan,
                'mpokok' => $mpokok,
                'jumlah_pesanan'=>$jumlah_pesanan,
        ]);
        }

    	return view('home.konten',[
            'barang'=> $barang,
            'mringan' => $mringan,
            'mpokok' => $mpokok,
        ]);
    }

    // Login, register, forgot password
    public function loginlayout(){
    	return view('loglayout');
    }

    public function login(){
    	return view('home.login');
    }

    public function cekLogin(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/')->with('berhasil','Berhasil Login');
        }

        return redirect()->back()->with('fail','Masukkan email dan password yang benar');
    }

    public function daftar1(Request $request){
        $daftar = $request->session()->get('daftar');
    	return view('home.daftar.daftar1',compact('daftar',$daftar));
    }

    public function postdaftar1(Request $request){
    	$validatedData = $request->validate([
    		'email' => 'required|email|unique:users',
    		'password' => 'required|confirmed|min:5'
    	]);
        if (empty($request->session()->get('daftar'))) {
            $daftar = new User();
            $daftar->fill($validatedData);
            $request->session()->put('daftar',$daftar);
        }else{
            $daftar = $request->session()->get('daftar');
            $daftar->fill($validatedData);
            $request->session()->put('daftar',$daftar);
        }
    	return redirect('/create-daftar2');
    }

    public function daftar2(Request $request){
    	$daftar = $request->session()->get('daftar');
    	return view('home.daftar.daftar2',compact('daftar',$daftar));
    }

    public function postdaftar2(Request $request){
    	$validatedData = $request->validate([
    		'forename' => 'required|min:4',
    		'surname' => 'required',
            'nik' => 'required|numeric|digits:16',
            'tgl_lahir' => 'required',
            'telp' => 'required|numeric|digits_between:10,13',
    	]);
        $daftar = $request->session()->get('daftar');
    	$daftar->fill($validatedData);
    	$request->session()->put('daftar',$daftar);
    	return redirect('/create-daftar3');
    }

    public function daftar3(Request $request){
    	$daftar = $request->session()->get('daftar');
    	return view('home.daftar.daftar3',compact('daftar',$daftar));
    }

    public function postdaftar3(Request $request){
        $number = User::orderBy('id','desc')->first();
        if ($number === null) {
            $kode = 'CST00001';
        }else{
            $kode = new User();
            $kode = 'CST0000'.($number->id+1);
        }
        $daftar = $request->session()->get('daftar');
        $daftar->kd_pel = $kode;
        $daftar->image = 'default.png';
        $daftar->level = 'customers';
    	$validatedData = $request->validate([
    		'prov_pel' => 'required',
            'kot_pel' => 'required',
            'kec_pel' => 'required',
            'kd_pos' => 'required|numeric|digits:5',
            'al_detail' => 'required' 
    	]);
        $daftar->password = bcrypt($daftar->password); 
        $daftar->fill($validatedData);
        $save = $daftar->save();
        if ($save) {
            $request->session()->put('daftar');
            return redirect('/login')->with('success','Registrasi berhasil. Silahkan login.');
        }

    	return redirect('/create-daftar3');
    }

    public function lupa(){
        return view('home.editpsw');
    }
    public function editpsw(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5'
        ]);
        if ($validator->fails()) {
            User::where('email',$request->email)->update(['password' => bcrypt($request->password)]);
            return redirect('/login')->with('success','Password berhasil diubah. Silahkan login');
        }else
           return redirect()->back()->with('fail','Email tidak terdaftar. Silahkan lakukan registrasi.'); 
    }

    // Search
     public function searchprdk(Request $request){
        $search = $request->get('search');
        $barang = Barang::where('nm_brng','like','%'.$search.'%')->paginate(5);
        return view('home.search',['barang'=>$barang],['search'=>$search]);
    }

    // Akun
    public function akun(){
        $akun = User::get();
        $jumlah_pesanan = TransaksiDetail::where('kd_pel',Auth::user()->kd_pel)->where('status','Sedang diproses')->count();
        return view('home.akun.akun2',['akun'=>$akun,'jumlah_pesanan'=>$jumlah_pesanan]);
    }

    public function editakun($id){
        $akun = User::where('id',$id)->get();
        return view('home.akun.editakun',['akun'=>$akun]);
    }

    public function postedit(Request $request){
        $this->validate($request,[
            'forename' => 'required',
            'surname' => 'required',
            'nik' => 'required|numeric|digits:16',
            'tgl_lahir' => 'required',
            'telp' => 'required|numeric|digits_between:10,13',
            'email' => 'required|email',
            'prov_pel' => 'required',
            'kot_pel' => 'required',
            'kec_pel' => 'required',
            'kd_pos' => 'required|numeric|digits:5',
            'al_detail' => 'required', 
        ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time()."_".$image->getClientOriginalName();
            $imgLoc = 'assets/customers';
            $image->move($imgLoc,$imageName);
            User::where('id',$request->id)->update(['image'=>$imageName]);
        }

        User::where('id',$request->id)->update([
            'level' => 'customers',
            'forename' => $request->forename,
            'surname' => $request->surname,
            'nik' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'telp' => $request->telp,
            'email' => $request->email,
            'prov_pel' => $request->prov_pel,
            'kot_pel' => $request->kot_pel,
            'kec_pel' => $request->kec_pel,
            'kd_pos' => $request->kd_pos,
            'al_detail' => $request->al_detail
        ]);
        return redirect('/akun')->with('sukses2','Data berhasil diubah');
    }

    public function editpass($id){
        return view('home.akun.editpass');
    }
    
    public function postpass(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5'
        ]);
        if ($validator->fails()) {
            User::where('email',$request->email)->update(['password' => bcrypt($request->password)]);
            return redirect('/akun')->with('sukses3','Password berhasil diubah.');
        }else
           return redirect()->back()->with('fail2','Email tidak terdaftar. Silahkan lakukan registrasi.'); 
    }

    // Logout
    public function logout(){

        auth::logout();

        return redirect('/')->with('success','Logout berhasil');
    }
}

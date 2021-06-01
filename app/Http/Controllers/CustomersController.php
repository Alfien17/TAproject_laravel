<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
	public function addcstmr(){
        return view('admin.customers.addcstmr');
    }

    public function add2(Request $request){
    	$this->validate($request,[
            'forename' => 'required',
            'nik' => 'required|numeric|digits:16',
            'tgl_lahir' => 'required',
            'telp' => 'required|numeric|digits_between:10,13',
            'email' => 'required|email|unique:users',
            'prov_pel' => 'required',
            'kot_pel' => 'required',
            'kec_pel' => 'required',
            'kd_pos' => 'required|numeric|digits:5',
            'al_detail' => 'required'       
        ]);

        $number = User::orderBy('id','desc')->first();
        if ($number === null) {
            $kode = 'CST00001';
        }else{
            $kode = new User();
            $kode = 'CST0000'.($number->id+1);
        }

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time()."_".$image->getClientOriginalName();
            $imgLoc = 'assets/customers';
            $image->move($imgLoc,$imageName);
        }else{
            $imageName = 'default.png';
        }

        $level = 'customers';

    	User::create([
            'level' => $level,
            'forename' => $request->forename,
            'kd_pel'=>$kode,
            'nik' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'telp' => $request->telp,
            'email' => $request->email,
            'prov_pel' => $request->prov_pel,
            'kot_pel' => $request->kot_pel,
            'kec_pel' => $request->kec_pel,
            'kd_pos' => $request->kd_pos,
            'al_detail' => $request->al_detail,
            'image'=>$imageName
        ]);
	    return redirect('/mainadmin/customers')->with('success','Data berhasil ditambahkan');
	}

    public function ecstmr($id){
        $customers = User::where('id',$id)->get();
        
        return view('admin.customers.ecstmr',['customers'=>$customers]);
    }

    public function edit2(Request $request){
        $this->validate($request,[
            'forename' => 'required',
            'nik' => 'required|numeric|digits:16',
            'tgl_lahir' => 'required',
            'telp' => 'required|numeric|digits_between:10,13',
            'email' => 'required|email',
            'prov_pel' => 'required',
            'kot_pel' => 'required',
            'kec_pel' => 'required',
            'kd_pos' => 'required|numeric|digits:5',
            'al_detail' => 'required' 
        ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time()."_".$image->getClientOriginalName();
            $imgLoc = 'assets/customers';
            $image->move($imgLoc,$imageName);
            User::where('id',$request->id,)->update(['image'=>$imageName]);
        }

        User::where('id',$request->id,)->update([
            'forename' => $request->forename,
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
        return redirect('/mainadmin/customers')->with('success','Data berhasil diubah');
    }
    public function dcstmr($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect('/mainadmin/customers')->with('success','Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Redirect;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email',$email)->first();
        if($data){
            if(Hash::check($password,$data->password)){
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('/dashboard');
            }
            else{
                return redirect('login')->with('failed','Email atau Password anda salah!');
            }
        }
        else{
            return redirect('login')->with('failed','Email atau Password anda salah!');
        }
    }

    public function postRegister(Request $request)
    {  
        $request->validate([
            'fullname'      => 'required|string|max:20',
            'email'         => 'required|email|unique:users,email',
            'date_of_birth' => 'required',
            'gender'        => 'required',
            'blood_type'    => 'required',
            'password'      => 'required|alpha_num|min:6',
            'konf_password' => 'required|same:password',
            'status'        => 'required'
        ]);

        $dataArray = array(
            "fullname"      => $request->fullname,
            "email"         => $request->email,
            "date_of_birth" => $request->date_of_birth,
            "gender"        => $request->input('gender'),
            "blood_type"    => $request->input('blood_type'),
            "password"      => Hash::make($request->password),
            "status"        => $request->input('status')
        );

        $user = User::create($dataArray);
        
        if(!is_null($user)) {
            return back()->with("success", "Register Berhasil");
        }else {
            return back()->with("failed", "Gagal Daftar");
        }
    }

    public function dashboard()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda belum login, silahkan login terlebih dahulu');
        }
        else{
            return view('dashboard');
        }
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login')->with("warning", "Telah logout");;
    }
}

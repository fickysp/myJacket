<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Mail\AuthMail;


class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);
        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        // verifikasi akun login
        if (Auth::attempt($infologin)) {
            if (Auth::user()->email_verified_at != null) {
                if (Auth::user()->role ==='admin') {
                    return redirect()->route('admin')->with('success', 'Halo admin, Anda Berhasil Login');
                } else if (Auth::user()->role ==='user') {
                    return redirect()->route('user')->with('success', 'Berhasil Login');
                }
            } else {
                Auth::logout();
                return redirect()->route('auth')->withErrors('Akun anda belum aktif.
                Harap verifikasi terlebih dahulu');
            }
        }else{
            return redirect()->route('auth')->withErrors('Kata sandi atau email salah');
        }
    }

    function create()
    {
        return view('auth.register');
    }

    function register(Request $request)
    {
        $str=Str::random(100);
        $request->validate([
            'fullname'=>'required|min:5',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:6',
        ],[
            'fullname.required'=>'nama wajib diisi',
            'fullname.min'=>'nama minimal 5 karakter',
            'email.required'=>'email wajib diisi',
            'email.unique'=>'email telah terdaftar',
            'password.required'=>'password wajib diisi',
            'password.min'=>'password minimal 6 karakter',
        ]);
        $inforegister=[
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'password'=>$request->password,
            'verify_key'=>$str
        ];
        // membuat inforegister user
        User::create($inforegister);
        $details=[
            'nama'=>$inforegister['fullname'],
            'role'=>'user',
            'datetime'=>date('Y-m-d H:i:s'),
            'website'=>'laravel10',
            'url'=>'http://'.request()->getHttpHost(). "/" . "verify/" . $inforegister['verify_key'],
        ];
        // data yang dimasukan dari inforegister dikirim ke email yang sudah didaftarkan
        Mail::to($inforegister['email'])->send(new AuthMail($details));

        return redirect()->route('auth')->with('success', 'Link verifikasai telah dikirim ke email anda. Cek email untuk melakukan verifikasi');
    }
    // verifikasi email
    function verify($verify_key) {
        $keyCheck = User::select('verify_key')
        ->where('verify_key', $verify_key)
        ->exists();
        if($keyCheck) {
            $user=User::where('verify_key', $verify_key)->update(['email_verified_at' =>date('Y-m-d H:i:s')]);
            return redirect()->route('auth')->with('success', 'Verifikasi berhasil, akun anda sudah aktif. ');
        } else {
            return redirect()->route('auth')->withErrors('Keys tidak valid, pastikan telah melakukan register')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirect ke halaman lain setelah logout
    }
}
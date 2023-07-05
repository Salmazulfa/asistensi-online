<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Aslab;
use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Mahasiswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rules\RequiredIf;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function tambahData()
    {
        return view('admin.tambahData', [
            'title' => "Admin - Master Data",
            'titleheader' => "Master Data - Input Data Baru",
            'matkul' => Matkul::all(),
            'dosen' => Dosen::all(),
            'user' => auth()->user(),
        ]);
    }

    public function saveData(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $level = $request->level;
        $matkul_id = $request->matkul_id;
        $dosen_id = $request->dosen_id;

        $user = new User();
        $user->username = $username;
        $user->password = bcrypt($password);
        $user->level = $level;
        $user->save();

        $last_id = User::max('id');

        if ($level == "Admin") {
            $admin = new Admin();
            $admin->user_id = $last_id;
            $admin->save();
            return redirect('/admin/dataAdmin')->with('success', 'Yeay berhasil!!');
        } else if ($level == "Dosen") {
            $dosen = new Dosen();
            $dosen->user_id = $last_id;
            $dosen->matkul_id = $matkul_id;
            $dosen->save();
            return redirect('/admin/dataDosen')->with('success', 'Yeay berhasil!!');
        } else if ($level == "Asisten Praktikum") {
            $aslab = new Aslab();
            $aslab->user_id = $last_id;
            $aslab->dosen_id = $dosen_id;
            $aslab->save();
            return redirect('/admin/dataAslab')->with('success', 'Yeay berhasil!!');
        } else if ($level == "Mahasiswa") {
            $mhs = new Mahasiswa();
            $mhs->user_id = $last_id;
            $mhs->save();
            return redirect('/admin/dataMhs')->with('success', 'Yeay berhasil!!');
        }

        // return redirect('/admin/dataAdmin')->with('gagal', 'Gagal!!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->level == 'Admin') {
                if ($request->has('rememberme')) {
                    Cookie::queue('adminuser', $request->username, 1440);
                    Cookie::queue('adminpwd', $request->password, 1440);
                }
                return redirect()->intended('/admin/dashboard');
            } else if (auth()->user()->level == 'Dosen') {
                if ($request->has('rememberme')) {
                    Cookie::queue('adminuser', $request->username, 1440);
                    Cookie::queue('adminpwd', $request->password, 1440);
                }
                return redirect()->intended('/dosen/materi');
            } else if (auth()->user()->level == 'Asisten Praktikum') {
                if ($request->has('rememberme')) {
                    Cookie::queue('adminuser', $request->username, 1440);
                    Cookie::queue('adminpwd', $request->password, 1440);
                }
                return redirect()->intended('/aslab/dashboard');
            } else if (auth()->user()->level == 'Mahasiswa') {
                if ($request->has('rememberme')) {
                    Cookie::queue('adminuser', $request->username, 1440);
                    Cookie::queue('adminpwd', $request->password, 1440);
                }
                return redirect()->intended('/mhs/dashboard');
            } else {
                return back()->with('loginError', 'Login gagal!');
            }
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

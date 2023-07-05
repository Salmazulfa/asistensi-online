<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\DB;

use App\Models\Admin;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Aslab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all()->count();
        $dosen = Dosen::all()->count();
        $aslab = Aslab::all()->count();
        $mhs = Mahasiswa::all()->count();

        return view('admin.dashboard', [
            'title' => "Admin - Dashboard",
            'titleheader' => "Dashboard",
            'user' => auth()->user(),
            'admin' => $admin,
            'dosen' => $dosen,
            'aslab' => $aslab,
            'mhs' => $mhs,
        ]);
    }

    public function dataAdmin()
    {
        return view('admin.masterAdmin.dataAdmin', [
            'title' => "Admin - Master Data",
            'titleheader' => "Master Data - Admin",
            'admin' => Admin::all(),
            'user' => auth()->user(),
        ]);
    }

    public function editAdmin($id)
    {
        $admin = Admin::find($id);

        return view('admin.masterAdmin.editAdmin', [
            'title' => "Admin - Master Data",
            'titleheader' => "Master Data - Admin",
            'admin' => $admin,
            'user' => auth()->user(),
        ]);
    }

    public function updateAdmin(Request $request)
    {
        $id = $request->id;
        $username = $request->username;
        $newpass = $request->newpass;
        $confirmpass = $request->confirmpass;
        $nama_admin = $request->nama_admin;
        $email = $request->email;

        if ($username != "") {
            if ($confirmpass == "" && $newpass == "") {
                $user_id = Admin::find($id);
                $user_id = $user_id->user_id;
                $user = User::find($user_id);
                $user->username = $username;
                $user->save();

                $admin = Admin::find($id);
                $admin->nama_admin = $nama_admin;
                $admin->email = $email;
                $admin->save();
                return back()->with('success', 'Yeay pinter deh..!');
            } else if ($confirmpass != "" && $newpass == "") {
                return back()->with('error', 'Ada yang masih kosong tuh..');
            } else if ($confirmpass == "" && $newpass != "") {
                return back()->with('error', 'Ada yang masih kosong tuh..');
            } else {
                if ($newpass == $confirmpass) {
                    $user_id = Admin::find($id);
                    $user_id = $user_id->user_id;
                    $user = User::find($user_id);
                    $user->username = $username;
                    $user->password = bcrypt($confirmpass);
                    $user->save();

                    $admin = Admin::find($id);
                    $admin->nama_admin = $nama_admin;
                    $admin->email = $email;
                    $admin->save();
                    return back()->with('success', 'Yeay pinter deh..!');
                } else {
                    return back()->with('error', 'Passwordmu ngga sama yus!!!');
                }
            }
        } else {
            return back()->with('error', 'Username ngga boleh kosong yaa..');
        }

        return redirect('/admin/dataAdmin')->with('success', 'Yeay berhasil!!');
    }

    public function hapusAdmin($id)
    {

        $user_id = Admin::find($id);
        $user_id = $user_id->user_id;
        Admin::find($id)->delete();
        User::find($user_id)->delete();
        return redirect('/admin/dataAdmin')->with('success', 'Yeay berhasil!!');
    }

    public function profile()
    {
        $user = auth()->user();
        $admin = Admin::all()->where('user_id', $user->id);
        foreach ($admin as $admin) {
            $id = $admin->id;
            $nama_admin = $admin->nama_admin;
            $email = $admin->email;
        }

        return view('admin.profile.profile', [
            'title' => "Admin - Profile",
            'titleheader' => "Profile",
            'user' => $user,
            'admin' => $admin,
            'id' => $id,
            'nama_admin' => $nama_admin,
            'email' => $email
        ]);
    }
    
    public function updateProfile(Request $request)
    {
        $id = $request->id;
        $nama_admin = $request->nama_admin;
        $email = $request->email;

        $admin = Admin::find($id);
        $admin->nama_admin = $nama_admin;
        $admin->email = $email;
        $admin->save();

        return back()->with('success', 'Yeay berhasil..!');
    }

    public function ubahpw()
    {
        $user = auth()->user();

        return view('admin.profile.ubahpw', [
            'title' => "Admin - Profile",
            'titleheader' => "Ubah Password",
            'user' => $user
        ]);
    }

    public function updatePw(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $newpass = $request->newpass;
        $confirmpass = $request->confirmpass;

        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            if ($newpass == $confirmpass) {
                // dd('Yuhuu');
                $password = bcrypt($confirmpass);
                User::where('id', auth()->user()->id)->update(['password' => $password]);
                return back()->with('success', 'Yeay berhasil!!');
            } else {
                return back()->with('error', 'Passwordnya ngga sama');
            }
        } else {
            return back()->with('error', 'Password lama salah ey');
        }
    }
}

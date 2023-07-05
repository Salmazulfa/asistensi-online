<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{

    // FUNCTION FOR ADMIN
    public function dataDosen()
    {
        return view('admin.masterDosen.dataDosen', [
            'title' => "Admin - Master Data",
            'titleheader' => "Master Data - Dosen",
            'dosen' => Dosen::all(),
            'user' => auth()->user(),
        ]);
    }

    public function editDosen($id)
    {
        $dosen = Dosen::find($id);

        return view('admin.masterDosen.editDosen', [
            'title' => "Admin - Master Data",
            'titleheader' => "Master Data - Dosen",
            'dosen' => $dosen,
            'matkul' => Matkul::all(),
            'user' => auth()->user(),
        ]);
    }

    public function updateDosen(Request $request)
    {
        $id = $request->id;
        $username = $request->username;
        $newpass = $request->newpass;
        $confirmpass = $request->confirmpass;
        $nama_dosen = $request->nama_dosen;
        $matkul_id = $request->matkul_id;
        $tempat_lahir = $request->tempat_lahir;
        $tanggal_lahir = $request->tanggal_lahir;
        $jenis_kelamin = $request->jenis_kelamin;
        $alamat = $request->alamat;
        $email = $request->email;

        if ($username != "") {
            if ($confirmpass == "" && $newpass == "") {
                $user_id = Dosen::find($id);
                $user_id = $user_id->user_id;
                $user = User::find($user_id);
                $user->username = $username;
                $user->save();

                $dosen = Dosen::find($id);
                $dosen->nama_dosen = $nama_dosen;
                $dosen->matkul_id = $matkul_id;
                $dosen->nama_dosen = $nama_dosen;
                $dosen->tempat_lahir = $tempat_lahir;
                $dosen->tanggal_lahir = $tanggal_lahir;
                $dosen->jenis_kelamin = $jenis_kelamin;
                $dosen->alamat = $alamat;
                $dosen->email = $email;
                $dosen->save();
                return back()->with('success', 'Yeay pinter deh..!');
            } else if ($confirmpass != "" && $newpass == "") {
                return back()->with('error', 'Ada yang masih kosong tuh..');
            } else if ($confirmpass == "" && $newpass != "") {
                return back()->with('error', 'Ada yang masih kosong tuh..');
            } else {
                if ($newpass == $confirmpass) {
                    $user_id = Dosen::find($id);
                    $user_id = $user_id->user_id;
                    $user = User::find($user_id);
                    $user->username = $username;
                    $user->password = bcrypt($confirmpass);
                    $user->save();

                    $admin = Dosen::find($id);
                    $admin->nama_dosen = $nama_dosen;
                    $admin->email = $email;
                    $admin->save();
                    return back()->with('success', 'Yeay pinter deh..!');
                } else {
                    return back()->with('error', 'Passwordmu ngga sama min!!!');
                }
            }
        } else {
            return back()->with('error', 'Username ngga boleh kosong yaa..');
        }
        return redirect('/admin/dataDosen')->with('success', 'Yeay berhasil!!');
    }

    public function hapusDosen($id)
    {
        $user_id = Dosen::find($id);
        $user_id = $user_id->user_id;
        Dosen::find($id)->delete();
        User::find($user_id)->delete();
        return redirect('/admin/dataDosen')->with('success', 'Yeay berhasil!!');
    }

    // FUNCTION FOR DOSEN
    public function index()
    {
        return view('dosen.dashboard', [
            'title' => "Dosen - Dashboard",
            'titleheader' => "Dashboard",
            'user' => auth()->user()
        ]);
    }

    public function profile()
    {
        $user = auth()->user();
        $dosen = Dosen::all()->where('user_id', $user->id);
        foreach ($dosen as $dosen) {
            $id = $dosen->id;
            $matkul_id = $dosen->matkul_id;
            $nama_dosen = $dosen->nama_dosen;
            $tempat_lahir = $dosen->tempat_lahir;
            $tanggal_lahir = $dosen->tanggal_lahir;
            $jenis_kelamin = $dosen->jenis_kelamin;
            $email = $dosen->email;
            $alamat = $dosen->alamat;
        }
        $matkul = Matkul::all()->where('id', $matkul_id);
        foreach ($matkul as $matkul) {
            $matkul = $matkul->matkul;
        }

        return view('dosen.profile.profile', [
            'title' => "Dosen - Profile",
            'titleheader' => "Profile",
            'user' => $user,
            'id' => $id,
            'matkul' => $matkul,
            'nama_dosen' => $nama_dosen,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'email' => $email,
            'alamat' => $alamat
        ]);
    }

    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nama_dosen' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'email' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);


        Dosen::where('id', $validatedData['id'])->update($validatedData);
        return back()->with('success', 'Yeay berhasil!!');
    }
    
    public function ubahpw()
    {
        return view('dosen.profile.ubahpw', [
            'title' => "Dosen - Profile",
            'titleheader' => "Ubah Password",
            'user' => auth()->user(),
            'user1' => User::all()
        ]);
    }

    public function updatePwDosen(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $newpass = $request->newpass;
        $confirmpass = $request->confirmpass;
        
        if (Auth::attempt($credentials)) {
            if ($newpass == $confirmpass) {
                // dd('Yuhuu');
                $password = bcrypt($confirmpass);
                User::where('id', auth()->user()->id)->update(['password' => $password]);
                return back()->with('success', 'Yeay berhasil!!');
            } else {
                return back()->with('error', 'Password ngga Sama');
            }
        } else {
            return back()->with('error', 'Password lama salah');
        }
    }
}

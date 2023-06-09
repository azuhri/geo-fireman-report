<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestRegister;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        $user = Auth::user();
        if($user) {
            if($user->isFireman()) {
                return redirect()->route('fireman.home');
            } else {
                return redirect()->route('user.home');
            }
        }
        return view('app.login');
    }

    public function selectUserRegister()
    {
        return view("app.select-user");
    }

    public function registerView($typeUser)
    {
        if($typeUser != "user" && $typeUser != "pemadam") {
            \abort(404);
        }
        $copyWriteUserType = $typeUser == "user" ? "Pengguna" : "Pemadam Kebakaran";
        $dataArr[] = "copyWriteUserType";
        $dataArr[] = "typeUser";
        return view("app.register", \compact($dataArr));
    }

    public function registerPost(RequestRegister $request)
    {
        if($request->password != $request->confirm_password) {
            return redirect()->back()->with("errors", "konfirmasi password tidak cocok");
        }
        $typeUser = $request->type_user;
        $newUser = new User();
        $newUser->type_user = $typeUser == "1" ? 1 : 0;
        $newUser->name = $request->name;
        $newUser->phonenumber = "62".$request->phonenumber;
        $newUser->email = $request->email;
        $newUser->password = $request->password; 
        if($typeUser) {
            $newUser->gender = $request->jenis_kelamin;
        }
        $newUser->address = $request->address;
        $newUser->password = bcrypt($request->password);
        $newUser->save();
        $request->session()->regenerate();
        $checkingCredentials = Auth::attempt(["email" => $newUser->email, "password" => $request->password], \true);
        if($newUser->isFireman()) {
            return \redirect()->intended("/app/fireman/add-geo-locations");
        } else {
            return \redirect()->intended("/app/user/home");
        }
    }

    public function loginPost(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $findUser = User::where("email", $email)->first();
        if(!$findUser) {
            return \redirect()
                    ->back()
                    ->with("errors", "email atau password salah!")
                    ->withInput();
        }
        
        $checkingCredentials = Auth::attempt(["email" => $email, "password" => $password], \true);
        if(!$checkingCredentials) {
            return \redirect()
                    ->back()
                    ->with("errors", "email atau password salah!")
                    ->withInput();
        }
        $request->session()->regenerate();
        if($findUser->isFireman()) {
            return \redirect()->intended("/app/fireman/add-geo-locations");
        } else {
            return \redirect()->intended("/app/user/home");
        }
    }

    public function logout(Request $request)
    {
        Auth::user()->remember_token = null;
        Auth::user()->update();
        $request->session()->inValidate();
        $request->session()->regenerateToken();

        return \redirect()->route("login");
    }

}

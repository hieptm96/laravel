<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLogin;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;

class AuthController extends Controller
{
    public function getLogin() {
        return view('welcome');
    }

    public function postLogin(StoreLogin $request)
    {
        try {
            $remember = (bool) $request->get('remember', false);
            if (Sentinel::authenticate($request->all(), $remember)) {
                return redirect()->intended($this->redirectTo);
                //return Sentinel::getUser();
            } else {
                $err = "Tên đăng nhập hoặc mật khẩu không đúng!";
            }
        } catch (NotActivatedException $e) {
            $err = "Tài khoản của bạn chưa được kích hoạt";
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $err = "Tài khoản của bạn bị block trong vòng {$delay} sec";
        }
        return redirect()->back()
            ->withInput()
            ->with('err', $err);
    }
}

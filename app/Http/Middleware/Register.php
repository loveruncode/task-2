<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Register
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $password1 = $request->input('password1');
        $password2 = $request->input('password2');

        $taikhoan = $request->input('taikhoan');

        $kiemTraTaiKhoan = User::where('name', $taikhoan)->get();

        if($kiemTraTaiKhoan->count() > 0){
            return redirect()->route('Register')->with('error', 'Tên Tài Khoản đã tồn tại');
        }


        if ($password1 == null || $password2 == null){

            return redirect()->route('Register')->with('error', 'Không Được để trống Mật Khẩu hoặc tài khoản');
        }elseif($password1 != $password2){

            return redirect()->route('Register')->with('error', 'Mật khẩu không giống hãy thử lại ');

        }else{

            return $next($request);
        }



    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{

    public function kiemtra(Request $request){

         $request->validate([
            'taikhoan'  =>'required',
            'password1' => 'required'

         ]);

        $taikhoan = $request->input('taikhoan');
        $pas2 = $request->input('password2');

        $user = new User();

         $user->name = $taikhoan;
         $user->password = Hash::make($pas2);
         $user->save();

         return redirect()->route('Register')->with('success', 'Đăng ký thành công ');

    }

    public function login(Request $request){


        $taikhoan = $request->input('taikhoan');
        $matkhau = $request->input('matkhau');

        $user = DB::table('users')
            ->where('name', $taikhoan)
            ->first();

        if($user && Hash::check($matkhau, $user->password)){

            return redirect('/homepage')->with('success', ' Đăng nhập thành công');
        }else{

            return redirect ('/')->with('error', ' Thất bại');
        }









    }





}


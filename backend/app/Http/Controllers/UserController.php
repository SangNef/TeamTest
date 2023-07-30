<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //tạo tài khoản
   function register(Request $request)
    {
        // Kiểm tra định dạng email phải là @gmail.com
        $emailParts = explode('@', $request->input('email'));
        if (count($emailParts) != 2 || $emailParts[1] != 'gmail.com') {
            return ["error" => "Invalid email format. Only Gmail accounts are allowed."];
        }

        // Kiểm tra password có chữ hoa ở chữ cái đầu tiên
        $password = $request->input('password');
        $firstChar = substr($password, 0, 1);
        if (!ctype_upper($firstChar)) {
            return ["error" => "Password must start with an uppercase letter."];
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = Hash::make($password);
        $user->save();

        return $user;
    }


 function login(Request $request){
    // Tìm người dùng dựa trên địa chỉ email.
        $user = User::where('email',$request->email)->first();
            // Kiểm tra xem người dùng có tồn tại và mật khẩu có khớp hay không.
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return["error" =>"Email or password is not matched"];
        }
        return $user;
        }
}

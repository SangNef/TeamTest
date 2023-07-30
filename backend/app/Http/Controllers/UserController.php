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
        $emailErrors = []; // Mảng để lưu trữ các lỗi về email
        $passwordErrors = []; // Mảng để lưu trữ các lỗi về password

        // Kiểm tra định dạng email phải là @gmail.com
        $emailParts = explode('@', $request->input('email'));
        if (count($emailParts) != 2 || $emailParts[1] != 'gmail.com') {
            $emailErrors[] = "Invalid email format. Only Gmail accounts are allowed.";
        }

        // Kiểm tra password có chữ hoa ở chữ cái đầu tiên và chứa ít nhất một số và một kí tự đặc biệt
        $password = $request->input('password');
        $firstChar = substr($password, 0, 1);
        if (!ctype_upper($firstChar)) {
            $passwordErrors[] = "Password must start with an uppercase letter.";
        }

        if (!preg_match('/[0-9]/', $password)) {
            $passwordErrors[] = "Password must contain at least one number.";
        }

        if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
            $passwordErrors[] = "Password must contain at least one special character.";
        }

        // Nếu có lỗi về email hoặc password, trả về các mảng lỗi tương ứng
        if (!empty($emailErrors) || !empty($passwordErrors)) {
            return ["email_errors" => $emailErrors,
                     "password_errors" => $passwordErrors];
        }

        // Nếu không có lỗi, tiến hành tạo tài khoản
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

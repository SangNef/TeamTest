<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Tạo tài khoản
    public function register(Request $request)
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
            return response()->json(['email_errors' => $emailErrors, 'password_errors' => $passwordErrors], 400);
        }

        // Nếu không có lỗi, tiến hành tạo tài khoản
        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->email = $request->input('email');
        $user->password = Hash::make($password);
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        return response()->json(['message' => 'User created successfully'], 201);
    }

    // Đăng nhập
    public function login(Request $request)
    {
        // Tìm người dùng dựa trên địa chỉ email.
        $user = User::where('email', $request->email)->first();

        // Kiểm tra xem người dùng có tồn tại và mật khẩu có khớp hay không.
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Email or password is not matched'], 401);
        }

        return response()->json(['message' => 'Login successful']);
    }

    // Tạo profile user
    public function createProfile(Request $request)
    {
        $profile = new Profile;
        $profile->avatar = $request->file('avatar')->store('profiles');
        $profile->profile_name = $request->input('profile_name');
        $profile->profile_phone = $request->input('profile_phone');
        $profile->address = $request->input('address');
        $profile->save();

        return response()->json(['message' => 'Profile created successfully'], 201);
    }

    // Chỉnh sửa profile user
    public function updateProfile(Request $request, $id)
    {
        // Tìm kiếm profile dựa trên ID
        $profile = Profile::find($id);

        // Kiểm tra xem profile có tồn tại hay không
        if (!$profile) {
            return response()->json(['error' => 'Profile not found'], 404);
        }

        // Cập nhật thông tin profile
        $profile->profile_name = $request->input('profile_name');
        $profile->profile_phone = $request->input('profile_phone');
        $profile->address = $request->input('address');
        $profile->save();

        return response()->json(['message' => 'Profile updated successfully']);
    }

    // Xoá profile user
    public function deleteProfile($id)
    {
        // Tìm kiếm profile dựa trên ID
        $profile = Profile::find($id);

        // Kiểm tra xem profile có tồn tại hay không
        if (!$profile) {
            return response()->json(['error' => 'Profile not found'], 404);
        }

        // Xoá profile
        $profile->delete();

        return response()->json(['message' => 'Profile deleted successfully']);
    }

    // Trang dashboard của admin (yêu cầu phải là admin)
    public function adminDashboard(Request $request)
    {
        $user = auth()->user();
        if ($user->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Xử lý logic cho trang dashboard của admin ở đây
        return response()->json(['message' => 'Welcome, Admin!']);
    }

    // Trang profile của user (yêu cầu phải là user hoặc admin)
    public function userProfile(Request $request)
    {
        $user = auth()->user();
        if (!in_array($user->role, ['user', 'admin'])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Xử lý logic cho trang profile của user ở đây
        return response()->json(['message' => 'Welcome to your profile!']);
    }
}

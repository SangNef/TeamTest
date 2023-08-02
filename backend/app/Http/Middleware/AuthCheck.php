<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Người dùng đã đăng nhập, tiến hành kiểm tra và phân quyền truy cập vào các route dựa trên vai trò.
            $user = Auth::user();
            $request->attributes->add(['user' => $user]);

            // Kiểm tra vai trò của người dùng và cho phép truy cập vào các route phù hợp.
            if ($user->role === 'admin') {
                // Nếu là admin, cho phép truy cập vào tất cả các route.
                return $next($request);
            } elseif ($user->role === 'user') {
                // Nếu là user, chỉ cho phép truy cập vào các route của user.
                return $this->handleUserRoutes($request, $next);
            }
        }

        // Người dùng chưa đăng nhập hoặc không có quyền truy cập.
        return redirect('/login');
    }

    /**
     * Xử lý các route cho người dùng (user).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    private function handleUserRoutes(Request $request, Closure $next)
    {
        // Xử lý logic cho trang profile của user ở đây
        if ($request->is('user/profile')) {
            return $next($request);
        }

        // Người dùng không có quyền truy cập vào các route khác.
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}

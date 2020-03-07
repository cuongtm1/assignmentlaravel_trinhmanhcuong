<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\{LoginRequest,RegistrationRequest};
use Illuminate\Http\Request;
use Arr;
use Auth;
// use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function getLoginForm(){
        return view('Auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect('home');
    }

    public function login(LoginRequest $request){
        $data = Arr::except($request->all(), ['_token']);
        if(Auth::attempt($data)){
            if(Auth::User()->is_active == 0){
                return redirect()->back()->with('thongbao','Tài Khoản Của Bạn Đã Bị Khóa');
            }else{
                return redirect()->route('home.index');
            }
        }else{
            return redirect()->back()->with('thongbao','Bạn Nhập sai tài khoản hoặc mật khẩu');
        }
    }




    public function getRegistrationForm(){
        return view('Auth.registration');
    }

    public function Registration(RegistrationRequest $request){
        // lưu lại tk và login
        $login=Arr::except($request->all(), ['_token','role','is_active','created_at','updated_at','name','phone','date_of_birth']);
        // mã hóa pass và thêm vào bảng
        $data = Arr::except($request->all(), ['_token']);
        $data['role']=1;
        $data['is_active']=1;
        $data['password']=bcrypt($data['password']);
        User::create($data);

        //tự động đăng nhập
        Auth::attempt($login);
        return redirect('home');

    }
   









}

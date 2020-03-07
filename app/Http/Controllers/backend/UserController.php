<?php

namespace App\Http\Controllers\backend;
use App\Models\{User,Comment,Post,Category};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{AddUsserRequest};
use Arr;
use Str;
use Auth;
use Carbon\Carbon;
class UserController extends Controller
{
    public function index(){
        $data['users']=User::paginate(8);
        return view('backend.users.ListUsers',$data);
    }

    public function show($id){
        $data['users']=User::find($id);
        if($data['users'] == null){
            return redirect()->back();
        }else{
            return view('backend.users.ShowUsers',$data);
        }
        
    }
    
    public function create(){
        return view('backend.users.AddUsers');
    }
    public function store(AddUsserRequest $request){
        $data=Arr::except($request, ['_token'])->toarray();
        User::create($data);
        return redirect()->back()->with('thongbao','Thêm Mới Thành Công ');
    }

    public function edit($id){
        $data['user']=User::find($id);
        if($data['user']== null){
            return redirect()->back();
        }else{
            return view('backend.users.EditUser',$data);
        }
        
    }

    public function update(AddUsserRequest $request,$id){

        $user = User::find($id);
        if($request->password == $user->password ){
            $data = Arr::except($request, ['_token','created_at','password'])->toarray();
        }else{
            $data = Arr::except($request, ['_token','created_at','updated_at'])->toarray();
            $data['password']=bcrypt($request->password);
        }
        $updated_at=Carbon::now()->toarray();
        $data['updated_at']=$updated_at['formatted'];
        $user->update($data);
        return redirect()->back()->with('thongbao','Đã Sửa Thành Công');

    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
    








}

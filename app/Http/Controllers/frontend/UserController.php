<?php

namespace App\Http\Controllers\frontend;
use App\Models\{User,Comment,Post,Category};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{CommentRequest,AddPostRequest,UpdateProfileRequest};
use Arr;
use Str;
use Auth;
use Carbon\Carbon;
// store
class UserController extends Controller
{

    // users comment 
    public function store(CommentRequest $request)
    {
        $data = Arr::except($request, ['_token'])->toarray();
        Comment::create($data);
        return redirect()->back();
    }
    // show all bài post của user
    public function my_post($id){
     $data['posts']=Post::where('user_id',$id)->orderBy('id', 'desc')->paginate(5);
     if($id != Auth::User()->id){
        return redirect()->back();
    }else{
     return view('frontend.user.index',$data);
 }
}

    // xem chi tiết bài viết của mình
public function Post_Detail($post_id){
    $data['post']=Post::find($post_id);
    if($data['post']['user_id'] != Auth::User()->id){
        return redirect()->back();
    }else{
        $data['comments']=Comment::where('post_id', $post_id)->orderBy('id','desc')->get();
        return view('frontend.user.detail_post',$data);
    }
}

    // tạo bài viết mới
public function new_post(){
    $data['Categories']=Category::all();
    return view('frontend.user.add_post',$data);
}
    // lưu bài viết
public function Save_Create_Post(AddPostRequest $request){
    $data = Arr::except($request, ['_token'])->toarray();
    $data['user_id']=Auth::user()->id;
        //check ảnh
    if ($request->hasFile('image')) {
        $data['image']=$request->file('image')->store('images','public');
    }else{
        $data['image']='noImage.jpg';
    }
    Post::create($data);
    return redirect()->back()->with('thongbao','đã thêm thành công');
}
    // show hồ sơ cá nhân
public function my_profile(){
    $data['user']=User::find(Auth::user()->id);
    return view('frontend.user.Profile_User',$data);
}

    // form sửa hồ sơ cá nhân
public function Edit_Profile(){
    $data['user']=User::find(Auth::user()->id);
    return view('frontend.user.Edit_Profile',$data);
}

    // Lưu hồ sơ cá nhân vừa sửa
public function Save_Edit_Profile(UpdateProfileRequest $request){
    $user = User::find(Auth::user()->id);
    if($request->password == $user->password ){
        $data = Arr::except($request, ['_token','created_at','password'])->toarray();
    }else{
        $data = Arr::except($request, ['_token','created_at','updated_at'])->toarray();
        $data['password']=bcrypt($request->password);
    }
    $updated_at=Carbon::now()->toarray();
    $data['updated_at']=$updated_at['formatted'];
    $user->update($data);
    return redirect("Profile_User")->with('thongbao','Đã Sửa Thành Công');
}
}

<?php

namespace App\Http\Controllers\frontend;
use App\Models\{User,Post,Comment};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
        $data['news']=Post::orderBy('id', 'desc')->paginate(5);
        $data['events']=Post::orderBy('id', 'desc')->limit(3)->get();
        return view('frontend.home.index',$data);
    }

    public function show($post){
        $data['detail']=Post::find($post);
        if($data['detail'] != null){
        $data['comments']=Comment::where([['post_id', $post],['is_active', '1'],])->orderBy('id','desc')->get();
        return view('frontend.home.detail_post',$data);
        }else{
            return redirect()->back();
        }
        
    }






































}

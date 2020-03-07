<?php

namespace App\Http\Controllers\backend;
use App\Models\{User,Comment,Post,Category};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{CategoryReuest};
use Arr;
use Str;
use Auth;
use Carbon\Carbon;


class CategoryController extends Controller
{
    public function index(){
        $data['categories']=Category::orderBy('id','desc')->paginate(8);
        return view('backend.categories.ListCategories',$data);
    }

    public function create(){
        return view('backend.categories.AddCategories');
    }

    public function store(CategoryReuest $request){
        $data=Arr::except($request, ['_token'])->toarray();
        $data['user_id']=Auth::user()->id;
        Category::create($data);
        return redirect()->back()->with('thongbao','Thêm Danh Mục Thành Công');
    }

    public function show($id){
        $data['category']=Category::find($id);
        if($data['category']==null){
            return redirect()->back();
        }else{
            return view('backend.categories.ShowCategories',$data);
        }
    }

    public function edit($id){
        $data['category']=Category::find($id);
        if($data['category']== null){
            return redirect()->back();
        }else{
            return view('backend.categories.EditCategories',$data);
        }
    }

    public function update(CategoryReuest $request,$id){
        $data=Arr::except($request, ['_token'])->toarray();
        $updated_at=Carbon::now()->toarray();
        $data['updated_at']=$updated_at['formatted'];
        $cate=Category::find($id);
        $cate->update($data);
        return redirect()->back()->with('thongbao','Sửa Danh Mục Thành Công');
    }


    public function destroy($id){
       Category::destroy($id);
       return redirect()->route('categories.index');
    }



}

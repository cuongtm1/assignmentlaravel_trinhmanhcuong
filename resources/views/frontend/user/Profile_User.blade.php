@extends('frontend.master.layout')
@section('title',"My Profile")
@section('content')
<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="blog-posts-area">
                    <div class="card card-primary">
                            @if(session('thongbao'))
                            <div style="background-color: blue;text-align: center;color: white;font-size: 18px;padding-top: 17px" class="card-header">
                                <h3 class="card-title">Cập Nhật Thông Tin Thành Công</h3>
                              </div>
                            @endif
                          <div class="card-header">
                            <h3 class="card-title">My Profile</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form method="GET" action="Edit_Profile" role="form">
                              @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Full Name</label>
                              <input type="text" class="form-control" value="{{ $user->name }}" id="exampleInputPassword1" readonly >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1"> Phone Number</label>
                                <input type="number" value="{{ $user->phone }}" class="form-control" id="exampleInputPassword1" readonly >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" value="{{ $user->email }}" class="form-control" id="exampleInputEmail1" readonly >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" value="{{ $user->password }}" class="form-control" id="exampleInputEmail1" readonly >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Date_of_birth</label>
                                <input type="date" value="{{ $user->date_of_birth }}" class="form-control" id="exampleInputEmail1" readonly >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Created_at</label>
                                <input type="text" value="{{ Carbon\carbon::parse($user->created_at)->format('d-m-Y') }}"  class="form-control"readonly id="exampleInputEmail1" >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Updated_at</label>
                                <input type="text"  value="{{ Carbon\carbon::parse($user->updated_at)->format('d-m-Y') }}" class="form-control" readonly  id="exampleInputEmail1" >
                              </div>
                            </div>
                            <!-- /.card-body -->
            
                            <div class="card-footer">
                              <button type="submit" class="btn btn-danger">Chỉnh Sửa</button>
                            </div>
                          </form>
                        </div>
                        <!-- /.card --> 
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Blog Area End ##### -->
@endsection
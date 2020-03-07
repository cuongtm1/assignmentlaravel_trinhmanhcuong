@extends('frontend.master.layout')
@section('title','Sửa Hồ Sơ')
@section('content')
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-th-list"></i> Thông tin phụ huynh</h1>
		</div>

	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<div class="col-md-10">
						<!-- general form elements -->
						<div style="margin-top: 100px;margin-left:100px" class="card card-primary">
						  <div class="card-header">
							<h3 class="card-title">Thông Tin Cá Nhân</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form method="POST" action="Save_Edit_Profile" role="form">
							  @csrf
							<div class="card-body">
							  <div class="form-group">
								<label for="exampleInputPassword1">Full Name</label>
								<br>
								<br>
								{!! ShowErrors($errors,"name") !!}
							  <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="exampleInputPassword1" >
							  </div>
							  <div class="form-group">
								<label for="exampleInputPassword1"> Phone Number</label>
								<br>
								<br>
								{!! ShowErrors($errors,"phone") !!}
								<input type="number" name="phone" value="{{ $user->phone }}" class="form-control" id="exampleInputPassword1" >
							  </div>
							  <div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<br>
								<br>
								{!! ShowErrors($errors,"email") !!}
								<input type="email" name="email" value="{{ $user->email }}" class="form-control" id="exampleInputEmail1" >
							  </div>
							  <div class="form-group">
								<label for="exampleInputEmail1">Password</label>
								<br>
								<br>
								{!! ShowErrors($errors,"password") !!}
								<input type="password" name="password" value="{{ $user->password }}" class="form-control" id="exampleInputEmail1" >
							  </div>
							  <div class="form-group">
								<label for="exampleInputEmail1">Date_of_birth</label>
								<br>
								<br>
								{!! ShowErrors($errors,"date_of_birth") !!}
								<input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" class="form-control" id="exampleInputEmail1" >
							  </div>
							  <div class="form-group">
								<label for="exampleInputEmail1">Created_at</label>
								<input type="text" name="created_at" value="{{ Carbon\carbon::parse($user->created_at)->format('d-m-Y') }}"  class="form-control"readonly id="exampleInputEmail1" >
							  </div>
							  <div class="form-group">
								<label for="exampleInputEmail1">Updated_at</label>
								<input type="text" name="updated_at" value="{{ Carbon\carbon::parse($user->updated_at)->format('d-m-Y') }}" class="form-control" readonly  id="exampleInputEmail1" >
							  </div>
							</div>
							<!-- /.card-body -->
			
							<div class="card-footer">
							  <button type="submit" class="btn btn-primary">Lưu Chỉnh Sửa</button>
							</div>
						  </form>
						</div>
						<!-- /.card -->	
					  </div>


				</div>
			</div>
		</div>
	</div>
</main>
<script>
	function confirmDelete(){
		let com = confirm('Bạn có muốn xóa không?');
		return com;
	}
</script>
@endsection


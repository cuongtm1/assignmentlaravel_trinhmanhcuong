@extends('backend.masster.layout')
@section('title',"List_Users")
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách người dùng</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Số ĐT</th>
                  <th>Trạng Thái</th>
                  <th>Vai Trò</th>
                  <th>Ngày Sinh</th>
                  <th>Ngày Tạo</th>
                  <th>Ngày cập nhật</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $users->name }}</td>
                  <td>{{ $users->email }}</td>
                  <td>{{ $users->phone }}</td>
                  <td>@if($users->is_active==0)<span style="color: red">Khóa</span>@else<span style="color: blue">Hoạt Động</span>@endif</td>
                  <td>@if($users->role==1) User @else Admin @endif</td>
                  <td>{{ Carbon\carbon::parse($users->date_of_birth)->format('d-m-Y') }}</td>
                  <td>{{ Carbon\carbon::parse($users->created_at)->format('d-m-Y') }}</td>
                  <td>{{ Carbon\carbon::parse($users->updated_at)->format('d-m-Y') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection
@push('scripts')
<script>
  $("button[id^='btn_delete_']").click(function (event) {
    id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');
    console.log('id', id);
    $("#delete_form_" + id).submit();
  });
</script>
@endpush
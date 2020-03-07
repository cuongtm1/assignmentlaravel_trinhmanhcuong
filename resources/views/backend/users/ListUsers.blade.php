@extends('backend.masster.layout')
@section('title',"List_Users")
@section('active','app-menu__item active')
@section('content')
<!-- Content Wrapper. Contains page content -->
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
                  <th></th>
                  <th></th>
                  <th><a href="{{ route('admin.create') }}" class="btn btn-success" >Thêm</a></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->phone }}</td>
                  <td>@if($item->is_active==0)<span style="color: red">Khóa</span>@else<span style="color: blue">Hoạt Động</span>@endif</td>
                  <td>@if($item->role==1) User @else Admin @endif</td>
                  <th><a href="{{ route('admin.show',$item->id) }}" class="btn btn-info" >Chi Tiết</a></th>
                  <th><a href="{{ route('admin.edit',$item->id) }}" class="btn btn-success" >Sửa</a></th>
                  <th>
                    <a onclick="return xoa()"id="btn_delete_{{ $item->id }}"class="btn btn-danger">Xóa</a>
                    <form id="delete_form_{{ $item->id }}" action="{{ route('admin.destroy',$item->id) }}"
                      method="post"style="display: none;"
                      >
                      @method('DELETE')
                      @csrf
                    </form> 
                  </th>
                </tr>
                @endforeach
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
  <!-- /.content-wrapper -->
  @endsection
  @push('scripts')
  <script>
    $("a[id^='btn_delete_']").click(function (event) {
      id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');
      $("#delete_form_" + id).submit();
    });
  </script>
  @endpush

  @push('scripts')
  <script>
   function xoa () {
     return confirm('Bạn có muốn xóa không');
   }
 </script>
 @endpush


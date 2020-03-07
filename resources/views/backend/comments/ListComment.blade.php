@extends('backend.masster.layout')
@section('title',"ListPosts")

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
                <th>Hình Ảnh</th>
                <th>Tiêu Đề</th>
                <th>Danh Mục</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
             @foreach ($posts as $key => $item )
             <tr>
              <td><img src="storage/{{ $item->image }}" width="70px" height="50px"></td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->ShowNameCategory['name'] }}</td>
              <th><a href="{{ route('comments.show',$item->id) }}" class="btn btn-info" >Xem bình luận</a></th>

              
            </tr>
            @endforeach
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

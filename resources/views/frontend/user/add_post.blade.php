@extends('frontend.master.layout')
@section('title',"Post New")
@section('content')
<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">
                    <h4 style="text-shadow: 0px 0px 1px;padding-left: 25px
                    ">New Post</h4>
                    <img style="padding: 50px;margin: auto" src="" width="500px">
                    <div style="margin-top: -60px;margin-left:10px" class="row">
                        <div class="col-xs-6 col-md-12 col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    @if(session('thongbao'))
                                    <div class="alert bg-success" style="height: 40px" role="alert">
                                        <span class="glyphicon glyphicon-remove">{{ session('thongbao') }}</span>
                                    </div>
                                    @endif
                                    <div class="row" style="margin-bottom:40px">

                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label>Danh mục</label><br>
                                                {!! ShowErrors($errors,'category_id') !!}
                                                <form action="Save_Create_Post" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <select name="category_id" class="form-control">
                                                        <option value="">Chọn danh mục</option>
                                                        @foreach ($Categories as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tiêu đề</label><br>
                                                    {!! ShowErrors($errors,'title') !!}
                                                    <input type="text" name="title" class="form-control" value="{{ old('title')}}">
                                                </div>

                                                <div class="form-group">
                                                    <label>Ảnh</label><br>
                                                    {!! ShowErrors($errors,'image') !!}
                                                    <input class="form-control" name="image" type="file">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Nội dung</label><br>
                                                    {!! ShowErrors($errors,'content') !!}
                                                    <textarea name="content" style="width: 100%;height: 100px;">{{ old('content')}}</textarea>
                                                </div>
                                                <div class="tile-footer">
                                                    <button class="btn btn-danger" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Thêm</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="blog-sidebar-area">


                    <!-- Popular News Widget -->
                    <div class="popular-news-widget mb-50">
                        <h3>4 Most Popular News</h3>

                        <!-- Single Popular Blog -->
                        <div class="single-popular-post">
                            <a href="#">
                                <h6><span>1.</span> Amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales.</h6>
                            </a>
                            <p>April 14, 2018</p>
                        </div>

                        <!-- Single Popular Blog -->
                        <div class="single-popular-post">
                            <a href="#">
                                <h6><span>2.</span> Consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer.</h6>
                            </a>
                            <p>April 14, 2018</p>
                        </div>

                        <!-- Single Popular Blog -->
                        <div class="single-popular-post">
                            <a href="#">
                                <h6><span>3.</span> Adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo.</h6>
                            </a>
                            <p>April 14, 2018</p>
                        </div>

                        <!-- Single Popular Blog -->
                        <div class="single-popular-post">
                            <a href="#">
                                <h6><span>4.</span> Eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                            </a>
                            <p>April 14, 2018</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Blog Area End ##### -->
@endsection
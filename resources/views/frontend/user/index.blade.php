@extends('frontend.master.layout')
@section('title',"My post")
@section('content')
<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">
                    @if($posts->total()  <= 0)
                        <h1 style="height:400px;color:red;margin:auto;margin-top:80px;font-size:20px">
                            Bạn chưa đăng bài viết nào cả
                        </h1>
                    @else
                    @foreach($posts as $value)
                    <!-- Single Featured Post -->
                    <div class="single-blog-post featured-post mb-30">
                        <div class="post-thumb">
                        </div>
                        <div class="post-data">

                            <a href="home/{{ $value->id  }}" class="post-title">
                                <h6>{{ $value->title }}</h6>
                            </a>
                            <div class="post-meta">
                                <p class="post-author">By <a href="#">{{ $value->ShowNameUser->name }}</a></p>
                                <p class="post-excerp">{!! $value->content !!}</p>
                                <!-- Post Like & Post Comment -->
                                <div class="d-flex align-items-center">
                                    <a href="#" class="post-like">{{ date_format($value->created_at,'d/m/Y') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
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
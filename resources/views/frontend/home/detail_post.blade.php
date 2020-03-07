@extends('frontend.master.layout')
@section('title',"Chi Tiết")
@section('content')
<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">

                    <!-- Single Featured Post -->
                    <div class="single-blog-post featured-post single-post">
                        <div class="post-thumb">
                            <a href="#"><img src="{{ $detail->image   }}" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-title">
                                <h6>{{ $detail->title }}</h6>
                            </a>
                            <div class="post-meta">
                                <p class="post-author">By <a href="#">{!! $detail->ShowNameUser->name !!}</a></p>
                                <p>{!! $detail->content !!}</p>
                                <div class="newspaper-post-like d-flex align-items-center justify-content-between">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix">
                        <h5 class="title">{{ count($comments) }} Comments</h5>

                        <ol>
                            @foreach ($comments as $item)
                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="https://bepphuquy.com/iCus/no-avatar.jpg" alt="author">
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <a href="#" class="post-author">{{ $item->user_name['name']}}</a>
                                        <a href="#" class="post-date">{{ Carbon\carbon::parse($item->updated_at)->format('d-m-Y') }}</a>
                                        <p>
                                            @if ($item->is_active == 1 )
                                            {{ $item->content }}
                                            @else
                                            <span style="color: red">Nội Dung Không Phù Hợp</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ol>
                    </div>

                    <div class="post-a-comment-area section-padding-80-0">
                        <h4>Leave a comment</h4>

                        <!-- Reply Form -->
                        <div class="contact-form-area">
                            <form role="form" method="POST" action="store">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <textarea name="content" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                        {!! ShowErrors($errors,'content') !!}
                                        <input type="hidden" name="post_id" value="{{ $detail->id}}">
                                        <input type="hidden" name="user_id" value="{{ $detail->user_id}}">
                                        <input type="hidden" name="is_active" value="1">
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
                                    </div>
                                </div>
                            </form>
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
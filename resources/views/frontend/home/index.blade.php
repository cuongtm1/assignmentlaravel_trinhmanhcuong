@extends('frontend.master.layout')
@section('title',"Trang Chủ")
@section('content')
    <div class="popular-news-area section-padding-50-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
	                  {{--   <div class="section-heading">
	                        <h6>Popular News</h6>
	                    </div> --}}

                    <div class="row">
                    	@foreach($news as $value)
                        <!-- Single Post -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    <a href="{{ route('home.show',$value->id) }}"><img src="img/bg-img/12.jpg" alt=""></a>
                                    {{-- <a href="{{ route('home.show',$value->id) }}"><img src="{{ $value->image   }}" alt=""></a> --}}
                                </div>
                                <div class="post-data">
                                    <a href="{{ route('home.show',$value->id) }}" class="post-catagory">{{ $value->title }}</a>
                                    <a href="{{ route('home.show',$value->id) }}" class="post-title">
                                        <h6>{!! $value->content !!}</h6>
                                    </a>
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-like">{{ date_format($value->updated_at,'d/m/Y') }}</a>
                                        <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""><span>{{ $value->ShowNameUser->name }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                   {{--  <div class="section-heading">
                        <h6>Info</h6>
                    </div> --}}
                    <!-- Popular News Widget -->
                    <div class="popular-news-widget mb-30">
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

                    <!-- Newsletter Widget -->
                    <div class="newsletter-widget">
                        <h4>Newsletter</h4>
                        <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <form action="#" method="post">
                            <input type="text" name="text" placeholder="Name">
                            <input type="email" name="email" placeholder="Email">
                            <button type="submit" class="btn w-100">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Popular News Area End ##### -->
<div style="margin:10px 0px"></div>
   
@endsection


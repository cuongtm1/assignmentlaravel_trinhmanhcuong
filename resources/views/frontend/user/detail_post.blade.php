@extends('frontend.master.layout')
@section('title',"Chi Tiết")
@section('content')
<div class="plan">
			<div class="container">
				<h3 class="plan-text">
				</h3>
			</div>
		</div>
<div class="project plan-project" style="background-color: #f7f7f7;margin-top: 0; padding-top: 50px;">
			<div class="container" style="background-color: #fff; padding: 15px;box-shadow: 0 0 10px rgba(0,0,0,0.1)">
				<div class="row">
					<div class="col-12 col-lg-8 plan-detail-text">
						<h4 style="text-shadow: 0px 0px 1px;
						">{{ $post->title }}</h4>
						<img style="padding: 50px;margin: auto" src="storage/{{ $post->image   }}" width="500px" height="400px">
						<p>{!! $post->content !!}</p>

						<table class="table" style="margin-top: 60px">
							<thead class="thead-light">
							  <tr>
								<th scope="col" colspan="5">Tổng ({{ count($comments) }} Bình luận)</th>
							  </tr>
							</thead>
							<tbody>
								@foreach ($comments as $item)
								<tr>
								<td>
									<p style="font-weight: 500"> Người Gửi : {{ $item->user_name['name']}}</p>

									<p style="font-weight: 500"> {{ Carbon\carbon::parse($item->updated_at)->format('d-m-Y') }}</p>
									
									<p style="margin-top: 10px">
										@if ($item->is_active == 1 )
										{{ $item->content }}
										@else
										<span style="color: red">Nội Dung Không Phù Hợp</span>
										@endif
									</p>
								</td>
								  </tr>
								@endforeach
							</tbody>
						  </table>

						  <form role="form" method="POST" action="store" style="margin-top: 60px">
							@csrf
							<div class="form-group">
							  <label for="exampleFormControlTextarea1">Bình Luận</label>
								<br>
								{!! ShowErrors($errors,'content') !!}
							  <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" placeholder="Nhập nội dung bình luận ..."></textarea>
							</div>
							<input type="hidden" name="post_id" value="{{ $post->id}}">
							<input type="hidden" name="user_id" value="{{ $post->user_id}}">
							<input type="hidden" name="is_active" value="1">
							<button type="submit" class="btn btn-primary">Submit</button>
						  </form>




					</div>
					<div class="col-lg-4">
						<div class="news-transfer-list">
							<div class="news-transfer-title">
								<i class="fas fa-caret-right"></i>
								<h4 class="news-transfer-text">Tin liên quan</h4>
							</div>
							<hr style="width: 100%;height: 1px;background-color: #18998e;margin-top: 0">
							<div class="news-transfer">
								<div class="news-transfer-block">
									<a href=""><img src="http://hanoicenterkids.com/uploaded/_thumbs/Images/logo/LOGO.jpg.pagespeed.ce.y0Uyg8EJB3.jpg" alt="" width="90" height="90"></a>
									<p><a href="">DÃ NGOẠI THÁNG 7 – CHỦ ĐỀ MÔI TRƯỜNG SỐNG QUANH TA</a></p>
								</div>
							</div>
							<div class="news-transfer">
								<div class="news-transfer-block">
									<a href=""><img src="http://hanoicenterkids.com/uploaded/_thumbs/Images/logo/LOGO.jpg.pagespeed.ce.y0Uyg8EJB3.jpg" alt="" width="90" height="90"></a>
									<p><a href="">DÃ NGOẠI THÁNG 7 – CHỦ ĐỀ MÔI TRƯỜNG SỐNG QUANH TA</a></p>
								</div>
							</div>
							<div class="news-transfer">
								<div class="news-transfer-block">
									<a href=""><img src="http://hanoicenterkids.com/uploaded/_thumbs/Images/logo/LOGO.jpg.pagespeed.ce.y0Uyg8EJB3.jpg" alt="" width="90" height="90"></a>
									<p><a href="">DÃ NGOẠI THÁNG 7 – CHỦ ĐỀ MÔI TRƯỜNG SỐNG QUANH TA</a></p>
								</div>
							</div>
							<div class="news-transfer">
								<div class="news-transfer-block">
									<a href=""><img src="http://hanoicenterkids.com/uploaded/_thumbs/Images/logo/LOGO.jpg.pagespeed.ce.y0Uyg8EJB3.jpg" alt="" width="90" height="90"></a>
									<p><a href="">DÃ NGOẠI THÁNG 7 – CHỦ ĐỀ MÔI TRƯỜNG SỐNG QUANH TA</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>

		
@endsection
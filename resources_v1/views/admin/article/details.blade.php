@extends('admin.master')
@section('content')
@if(isset($editModeData))
@section('title',' Article')
@else
@section('title',' Article')
@endif
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<i class="mdi mdi-table fa-fw"></i> @yield('title')
						</div>
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<a href="{{route('article.index')}}"
								class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
									class="fa fa-list-ul" aria-hidden="true"></i> View Articles </a>
						</div>
					</div>
				</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						<div class="col-lg-offset-2 col-md-8">
							<div class="white-box">
								<div class="comment-center p-t-10">
									<div class="comment-body">
										<div class="mail-contnet">
											<h5>{{$editModeData->title}}</h5>
											@php
											$noticeDate=strtotime($editModeData->publish_date);
											@endphp
											<span class="time">{{date(" d M Y ", $noticeDate)}}
												,{{$editModeData->createdBy->first_name}}
												{{$editModeData->createdBy->last_name}}</span>
											@php
											if($editModeData->attach_file!='')
											{
											$info = new SplFileInfo($editModeData->attach_file);
											$extension = $info->getExtension();

											if($extension === 'png' || $extension === 'jpg' || $extension === 'jpeg' ||
											$extension === 'PNG' || $extension === 'JPG' || $extension === 'JPEG'){
											echo '<img src="'.asset('uploads/notice/'.$editModeData->attach_file).'"
												width="50%">';
											}else{
											echo '<embed src="'.asset('uploads/notice/'.$editModeData->attach_file).'"
												width="50%" height="550px" />';
											}
											}
											@endphp
											<br>
											<br /><span class="">{!! $editModeData->description !!}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
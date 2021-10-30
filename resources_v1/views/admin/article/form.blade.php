@extends('admin.master')
@section('content')
@if(isset($editModeData))
@section('title','Edit Article')
@else
@section('title','Add Article')
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
						@if(isset($editModeData))
						{{ Form::model($editModeData, array('route' => array('article.update', $editModeData->article_id), 'method' => 'PUT','files' => 'true','class' => 'form-horizontal','id'=>'articleForm')) }}
						@else
						{{ Form::open(array('route' => 'article.store','enctype'=>'multipart/form-data','class'=>'form-horizontal','id'=>'articleForm')) }}
						@endif

						<div class="form-body">
							<div class="row">
								<div class="col-md-offset-2 col-md-6">
									@if($errors->any())
									<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert"
											aria-label="Close"><span aria-hidden="true">×</span></button>
										@foreach($errors->all() as $error)
										<strong>{!! $error !!}</strong><br>
										@endforeach
									</div>
									@endif
									@if(session()->has('success'))
									<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert"
											aria-hidden="true">×</button>
										<i
											class="cr-icon glyphicon glyphicon-ok"></i>&nbsp;<strong>{{ session()->get('success') }}</strong>
									</div>
									@endif
									@if(session()->has('error'))
									<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert"
											aria-hidden="true">×</button>
										<i
											class="glyphicon glyphicon-remove"></i>&nbsp;<strong>{{ session()->get('error') }}</strong>
									</div>
									@endif
								</div>
							</div>

							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label col-md-4 label-medium">Article Title<span
												class="validateRq">*</span></label>
										<div class="col-md-8">
											{!! Form::text('title',Input::old('title'), $attributes =
											array('class'=>'form-control required
											title','id'=>'title','placeholder'=>'Enter title')) !!}
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label col-md-4 label-medium">Description<span
												class="validateRq">*</span></label>
										<div class="col-md-8">
											{!! Form::textarea('description',Input::old('description'), $attributes =
											array('class'=>'form-control textarea_editor
											required','rows'=>'15','id'=>'description','placeholder'=>'Enter
											description')) !!}
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label col-md-4 label-medium">Status<span
												class="validateRq">*</span></label>
										<div class="col-md-8">
											{{ Form::select('status', array('Published' => 'Published', 'Unpublished' => 'Unpublished'), Input::old('status'), array('class' => 'form-control status select2 required')) }}
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label col-md-4 label-medium">Publish Date<span
												class="validateRq">*</span></label>
										<div class="col-md-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
												{!! Form::text('publish_date',(isset($editModeData)) ?
												dateConvertDBtoForm($editModeData->publish_date) :
												Input::old('publish_date'), $attributes = array('class'=>'form-control
												dateField','id'=>'publish_date','readonly'=>'readonly','placeholder'=>'Enter
												publish date')) !!}
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label col-md-4 label-medium">Attach File</label>
										<div class="col-md-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-files-o"></i></div>
												{!! Form::file('attach_file',$attributes =
												array('class'=>'form-control')) !!}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-offset-4 col-md-8">
											@if(isset($editModeData))
											<button type="submit" class="btn btn-success btn_style"><i
													class="fa fa-pencil"></i> Update</button>
											@else
											<button type="submit" class="btn btn-success btn_style"><i
													class="fa fa-check"></i> Save</button>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('page_scripts')
<link rel="stylesheet"
	href="{!! asset('admin_assets/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css')!!}" />
<script src="{!! asset('admin_assets/js/cbpFWTabs.js')!!}"></script>
<script src="{!! asset('admin_assets/plugins/bower_components/html5-editor/wysihtml5-0.3.0.js')!!}"></script>
<script src="{!! asset('admin_assets/plugins/bower_components/html5-editor/bootstrap-wysihtml5.js')!!}"></script>

<script type="text/javascript">
	(function() {
            $('.textarea_editor').wysihtml5();

            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });
        })();
</script>
@endsection
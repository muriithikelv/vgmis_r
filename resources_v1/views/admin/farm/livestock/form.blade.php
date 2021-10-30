@extends('admin.master')
@section('content')
    @if (isset($editModeData))
        @section('title', 'Edit Livestock')
        @else
        @section('title', 'Add Livestock')
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
                                    <a href="{{ route('livestock.index') }}"
                                        class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
                                            class="fa fa-list-ul" aria-hidden="true"></i> View Livestock</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                @if (isset($editModeData))
                                    {{ Form::model($editModeData, ['route' => ['livestock.update', $editModeData->livestock_id], 'method' => 'PUT', 'files' => 'true', 'class' => 'form-horizontal']) }}
                                @else
                                    {{ Form::open(['route' => 'livestock.store', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) }}
                                @endif
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-offset-2 col-md-6">
                                            @if ($errors->any())
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    @foreach ($errors->all() as $error)
                                                        <strong>{!! $error !!}</strong><br>
                                                    @endforeach
                                                </div>
                                            @endif
                                            @if (session()->has('success'))
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×</button>
                                                    <i
                                                        class="cr-icon glyphicon glyphicon-ok"></i>&nbsp;<strong>{{ session()->get('success') }}</strong>
                                                </div>
                                            @endif
                                            @if (session()->has('error'))
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="label-medium">Farmer<span class="validateRq">*</span></label>
                                                {{ Form::select('user_id', $data, Input::old('user_id'), ['class' => 'form-control user_id select2', 'required' => 'required', 'data-style' => 'btn-info btn-outline']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="label-medium">Animal<span class="validateRq">*</span></label>
                                                {!! Form::text(
                                                'livestock_name',
                                                Input::old('livestock_name'),
                                                $attributes = array(
                                                'class' => 'form-control required
                                                livestock_name',
                                                'id' => 'livestock_name',
                                                'placeholder' => 'Enter Livestock
                                                name'
                                                )
                                                ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="label-medium">Number<span class="validateRq">*</span></label>
                                                {!! Form::text(
                                                'number',
                                                Input::old('number'),
                                                $attributes = array(
                                                'class' => 'form-control required
                                                number',
                                                'id' => 'number',
                                                'placeholder' => 'Enter Livestock
                                                number'
                                                )
                                                ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInput" class="label-medium">Gender<span
                                                        class="validateRq">*</span></label>

                                                <select name="gender" class="form-control gender select2" required>
                                                    <option value="">--- Select gender---</option>

                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="label-medium">Age<span class="validateRq">*</span></label>
                                                {!! Form::text(
                                                'age',
                                                Input::old('age'),
                                                $attributes = array(
                                                'class' => 'form-control required
                                                age',
                                                'id' => 'age',
                                                'placeholder' => 'Enter Livestock
                                                age'
                                                )
                                                ) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-3">
                                                @if (isset($editModeData))
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
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@extends('admin.master')
@section('content')
@if(isset($editModeData))
@section('title','Edit Region')
@else
@section('title','Add Region')
@endif
@include('admin.partials.lower_top_menu_bar')
@endsection
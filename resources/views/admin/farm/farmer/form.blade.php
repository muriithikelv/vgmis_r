@extends('admin.master')
@section('content')
@if(isset($editModeData))
@section('title','Edit Farmer')
@else
@section('title','Add Farmer')
@endif
@include('admin.partials.lower_top_menu_bar')
@endsection
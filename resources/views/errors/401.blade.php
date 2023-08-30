@extends('errors.layout')

@php
  $error_number = 401;
@endphp

@section('title')
  {{ trans('Unauthorized action.') }}
@endsection

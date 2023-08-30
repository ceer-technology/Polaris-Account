@extends('errors.layout')

@php
  $error_number = 404;
@endphp

@section('title')
  {{ trans('Page not found.') }}
@endsection

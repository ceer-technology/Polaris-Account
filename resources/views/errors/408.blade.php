@extends('errors.layout')

@php
  $error_number = 408;
@endphp

@section('title')
  {{ trans('Request timeout.') }}
@endsection

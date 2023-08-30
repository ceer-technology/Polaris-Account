@extends('errors.layout')

@php
  $error_number = 429;
@endphp

@section('title')
  {{ trans('Too many requests.') }}
@endsection

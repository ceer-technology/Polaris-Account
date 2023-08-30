@extends('errors.layout')

@php
  $error_number = 403;
@endphp

@section('title')
  {{ trans('Forbidden.') }}
@endsection

@extends('errors.layout')

@php
  $error_number = 405;
@endphp

@section('title')
  {{ trans('Method not allowed.') }}
@endsection

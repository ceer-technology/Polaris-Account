@extends('errors.layout')

@php
  $error_number = 400;
@endphp

@section('title')
  {{ trans('Bad request.') }}
@endsection

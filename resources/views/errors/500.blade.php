@extends('errors.layout')

@php
	$error_number = 500;
    $exception_message = isset($exception) ? e($exception->getMessage()) : null;
@endphp

@section('title')
    {{ trans("It's not you, it's me.") }}
@endsection

@extends('layouts/base')

@section('content')

	<a href ="{{ config('app.url') }}/{{ $shortened }}" >
	{{ config('app.url') }}/{{ $shortened }}
	</a>
@stop
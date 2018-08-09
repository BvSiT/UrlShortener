@extends('layouts/base')




@section('content')
    <h1>The best URL Shortener out there!!!</h1>
    <form action="/" method="POST">
        {{ csrf_field() }} <?php /* default Laravel CSRF prevention */ ?>
        <input type="text" name="url" placeholder="Please insert your URL here">

        <!-- <input type="submit" value="Shorten URL"> -->
        {!! $errors->first('url','<p class="err-msg">:message</p>') !!}
    </form>
@stop
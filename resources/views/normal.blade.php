@extends('new')
@section('style')
<style>
    h1{
        color : orangered;
        background: yellow;
        max-width: 90%;
    }
    p{
        color: salmon;
        background: cadetblue;
    }
</style>
@endsection

@section('con')
@parent
<h1>this is normal page</h1>
<p>This is a paragraph </p>
<br>


@endsection
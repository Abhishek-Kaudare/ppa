@extends('layouts.master')

@section('content')

    <h1>Inwards</h1>
    @if(count($inwards)>1)
        @foreach($inwards as $in)
            <div class="well">
                <h3>{{$in->ReelNo}}</h3>
            </div>
        @endforeach
    @else
        <p>No Post Found</p>
    @endif

@stop
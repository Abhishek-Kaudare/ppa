@extends('layouts.master')

@section('content')

    <h1>Inwards</h1>
    @if(count($inwards)>0)
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Date</th>
                <th>Recieved From</th>
                <th>Brand</th>
                <th>Quality</th>
                <th>GSM</th>
                <th>Reel No.</th>
                <th>Gross Wt.</th>
                <th>Net Wt.</th>
            </tr>
            </thead>
            @foreach($inwards as $in)
                <tbody>
                <tr>
                    <td>{{$in->Date}}</td>
                    <td>{{$in->RecievedFrom}}</td>
                    <td>{{$in->Brand}}</td>
                    <td>{{$in->Quality}}</td>
                    <td>{{$in->Gsm}}</td>
                    <td>{{$in->ReelNo}}</td>
                    <td>{{$in->GrossWt}}</td>
                    <td>{{$in->NetWt}}</td>
                </tr>
                </tbody>
            @endforeach
        </table>
    @else
        <p>No Post Found</p>
    @endif

@stop
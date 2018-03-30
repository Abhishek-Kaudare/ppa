@extends('layouts.master') 
@section('content') 
@if(count($outwards)>0)
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Outwards</h3>
        <a class="btn btn-primary pull-right" href="{{ route('outwards.create') }}"> New Outwards</a>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover scrollbox dataTable">
            <thead >
                <tr>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Date of Dispatch</th>
                    <th scope="col">Their Design No.</th>
                    <th scope="col">Our Design No.</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Meter</th>
                    <th scope="col">Reel No.</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            @foreach($outwards as $out)
            <tbody>
                <tr>
                    <td>{{$out->CustomerName}}</td>
                    <td>{{$out->DateOfDispatch}}</td>
                    <td>{{$out->TheirDesignNo}}</td>
                    <td>{{$out->OurDesignNo}}</td>
                    <td>{{$out->Weight}}</td>
                    <td>{{$out->Meter}}</td>
                    <td>{{$out->ReelNo}}</td>
                    <td>{{$out->Remarks}}</td>
                    <td>
                        <a href="{{ route('outwards.edit',['id'=> $out->id ]) }}" class="btn btn-xs btn-info">
                            <span class="fa fa-edit"></span>
                        </a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['outwards.destroy', 'id'=> $out->id ],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@else
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Outwards</h3>
        <a class="btn btn-primary pull-right" href="{{ route('outwards.create') }}"> New Outwards</a>
    </div>
    <div class="box-body">
        <p>No Post Found</p>
    </div>
</div>
@endif 
@stop
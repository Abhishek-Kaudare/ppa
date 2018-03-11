@extends('layouts.master') @section('content') @if(count($inwards)>0)
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Inwards</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover scrollbox dataTable">
            <thead >
                <tr>
                    <th>Date</th>
                    <th>Recieved From</th>
                    <th>Brand</th>
                    <th>Quality</th>
                    <th>GSM</th>
                    <th>Reel No.</th>
                    <th>Gross Wt.</th>
                    <th>Net Wt.</th>
                    <th>Edit</th>
                    <th>Delete</th>
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
                    <td>
                        <a href="{{ route('inwards.edit',['id'=> $in->id ]) }}" class="btn btn-xs btn-info">
                            <span class="fa fa-edit"></span>
                        </a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['inwards.destroy', 'id'=> $in->id ],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                    <!-- <td>
                        <a href="{{ route('inwards.destroy',['id'=> $in->id ]) }}" class="btn btn-xs btn-danger">
                            <span class="fa fa-trash-o"></span>
                        </a>
                    </td> -->
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@else
<p>No Post Found</p>
@endif 
@stop
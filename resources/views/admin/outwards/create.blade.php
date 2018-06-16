@extends('layouts.master') 
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Inwards Entry</h3>
    </div>
    <div class="box-body">
        {!! Form::open(['action' => 'OutwardsController@store','method' => 'POST']) !!}
        <form>
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cname">Customer Name:</label>
                        <input type="text" id="cname" name="cname" class="form-control" placeholder="Customer Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dod">Date of Dispatch:</label>
                        <input type="date" id="dod" name="dod" class="form-control" placeholder="Date of Dispatch">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tdn">Their Design No:</label>
                        <input type="text" id="tdn" name="tdn" class="form-control" placeholder="Their Design No">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="odn">Our Design No:</label>
                        <input type="text" id="odn" name="odn" class="form-control" placeholder="Our Design No">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="weight">Weight:</label>
                        <input type="number" id="weight" name="weight" class="form-control" placeholder="Weight" min="0">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meter">Meter:</label>
                        <input type="number" id="meter" name="meter" class="form-control" placeholder="Meter" min="0">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ReelNo">Reel No.:</label>
                        <input type="text" id="ReelNo" name="ReelNo" class="form-control" placeholder="Reel No.">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="remarks">Remarks:</label>
                        <input type="text" id="remarks" name="remarks" class="form-control" placeholder="Remarks">
                    </div>
                </div>
            </div>
            <div class=" pull-right">
                <div class="form-group ">
                    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
                    <a class="btn btn-primary " href="{{ route('outwards.index') }}"> Back</a>
                </div>
            </div>
        </form>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@extends('layouts.master') @section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Inwards Entry</h3>
    </div>
    <div class="box-body">
        {!! Form::open(['action' => 'InwardsController@store','method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {{(Form::label('date','Date'))}} {{(Form::date('date','',['class' => 'form-control', 'placeholder' => 'Date']))}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{(Form::label('RecievedFrom','RecievedFrom'))}} {{(Form::text('recievedfrom','',['class' => 'form-control', 'placeholder'=>
                    'Recieved From']))}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{(Form::label('brand','Brand'))}} {{(Form::text('brand','',['class' => 'form-control', 'placeholder' => 'Brand']))}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {{(Form::label('quality','Quality'))}} {{(Form::text('quality','',['class' => 'form-control', 'placeholder' => 'Quality']))}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{(Form::label('gsm','GSM'))}} {{(Form::number('gsm','',['class' => 'form-control', 'placeholder' => 'GSM']))}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{(Form::label('reelno','ReelNo'))}} {{(Form::number('reelno','',['class' => 'form-control', 'placeholder' => 'ReelNo']))}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {{(Form::label('grosswt','GrossWt'))}} {{(Form::number('grosswt','',['class' => 'form-control', 'placeholder' => 'GrossWt']))}}
                </div>
            </div>
            <div class="col-md-4">
                
                    {{(Form::label('netwt','NetWt'))}} {{(Form::number('netwt','',['class' => 'form-control', 'placeholder' => 'NetWt']))}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{Form::submit('Submit',['class'=>'btn btn-success'])}} {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
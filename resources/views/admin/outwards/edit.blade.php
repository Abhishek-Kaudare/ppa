 @extends('layouts.master')
 @section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="box-title ">
                <h4 class="pull-left"> Inwards with Reel No. : {{ $inwards->ReelNo }} </h4>
            </div>
        </div>
        <div class="box-body">
            {!! Form::model($inwards, ['method' => 'PATCH','route' => ['inwards.update', $inwards->id]]) !!}
            {{--  {!! Form::model($inwards,array('route' => array('inwards.update', $inwards->id), 'method' => 'PUT'))!!} {{csrf_field()}}  --}}
            <form>
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Date:</label> 
                        <input type="date" id="date" name="date" class="form-control" value='{{ $inwards->Date }}' placeholder="Date">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="recievedfrom">Recieved From:</label> 
                        <input type="text" id="recievedfrom" name="recievedfrom" class="form-control" value='{{ $inwards->RecievedFrom }}' placeholder="Recieved From">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand">Brand:</label> 
                        <input type="text" id="brand" name="brand" class="form-control" value='{{ $inwards->Brand }}' placeholder="Brand">
                    </div>
                </div>
            </div>            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="quality">Quality:</label> 
                        <input type="text" id="quality" name="quality" class="form-control" value='{{ $inwards->Quality }}' placeholder="Quality">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gsm">GSM:</label> 
                        <input type="text" id="gsm" name="gsm" class="form-control" value='{{ $inwards->Gsm }}' placeholder="GSM">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="reelno">Reel No.:</label> 
                        <input type="text" id="reelno" name="reelno" class="form-control" value='{{ $inwards->ReelNo }}' placeholder="Reel Number">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="grosswt">Gross Weight:</label> 
                        <input type="text" id="grosswt" name="grosswt" class="form-control" value='{{ $inwards->GrossWt }}' placeholder="Gross Weight">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="netwt">Net Weight:</label> 
                        <input type="text" id="netwt" name="netwt" class="form-control" value='{{ $inwards->NetWt }}' placeholder="Net Weight">
                    </div>
                </div>
            </div>
            <div class=" pull-right">
                <div class="form-group ">
                    {{Form::submit('Submit',['class'=>'btn btn-success'])}} 
                    <a class="btn btn-primary " href="{{ route('inwards.index') }}"> Back</a>
                </div>
            </div>
            </form>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
<div id="alert">
    @if(count($errors) > 0) 
        @foreach($errors->all() as $message)
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">&CircleTimes;</button>
            {{ $message }}
        </div>
        @endforeach 
    @endif

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">&CircleTimes;</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif 
    
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">&CircleTimes;</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif 
    
    @if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">&CircleTimes;</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif 
    
    @if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">&CircleTimes;</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif 
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&CircleTimes;</button>
        Please check the form below for errors
    </div>
    @endif
</div>
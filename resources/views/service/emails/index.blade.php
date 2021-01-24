@extends('layouts.service')

@section('content')
<div class="container"> 
    <br><hr>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10 form-control" style="border-radius: 25px;">
        @if (count($errors))
    <div class="alert alert-danger">Upload Validation Error<br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if ($message= Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong> {{ $message }}</strong>
    </div>
    @endif
    <form action="{{ route('Mail.send')}}" method="post">
    @csrf 
    <div class="row">
    <div class="col-6">
    <div class="form-group">
        <label for="title">Subject : </label>
    <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="body">Message : </label>
    <textarea name="body" class="form-control" required></textarea>
    </div>
    <div class="form-group">
<label for="class">Class : </label>
<select name="status" class="col-sm-7 form-control">
       <option value="1" selected>Notification before 5 days </option>
       <option value="2">Notification before 3 days</option>
       <option value="3">Notification in the due date</option>
       <option value="4">Notification after due date</option>                
</select> 
</div>  
<input type="submit" value="Send Email To All" class="btn btn-primary">
</div> 
</div>
    </form>
    </div>
    <div class="col-sm-1"></div>
</div>   
</div> 
@endsection
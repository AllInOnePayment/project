@extends('layouts.service')

@section('content')
<div class="container">



    <form action="{{ route('Mail.send')}}" method="post">
    @csrf 
                    <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                        <label for="title">Title : </label>
                    <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Body : </label>
                    <textarea name="body" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                <label for="class">class : </label>
                <select name="status" class="col-sm-5">
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

@endsection
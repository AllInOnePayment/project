@extends('layouts.service')

@section('content')

<div class="container">
            <form action="{{route('ServiceNotification.store')}}" method="POST">
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
                    </div>

                    <div class="col-1">
                    </div>
                    <div class="col-5 card" >
                    <label for="title"> <br>Description : </label>
                    <label for="description"><br> This text field is prepared for sending notification for users while Users are  
                      <br>*5 Days behind the due date <br>
                      *3 Days behind the due date <br>
                      *In the due date <br>
                      *After the due date. </label>
                    </div> 
                    </div>     
                <button type="submit" class="btn btn-primary">Add notification</button>
                <a href="{{route('ServiceNotification.index')}}" class="btn btn-warning">Cancel</a> 
                </form>
    </div>

    
    
@endsection
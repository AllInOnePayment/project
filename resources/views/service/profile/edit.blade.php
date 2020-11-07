@extends('layouts.service')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>Change Profile Info</h2>
                <form action="{{route('ServiceProfile.info')}}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="name">User Name :</label>
                        <input type="text" name="name" value=" {{Auth::user()->name}}" required>
                        @error('name')
                            <p><span class="alert alert-danger">{{$message}}</span></p>
                        @enderror  
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="email">User Email : </label>
                        <input type="email" name="email" value="{{Auth::user()->email}}" required>
                        @error('email')
                            <p><span class="alert alert-danger">{{$message}}</span></p>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label for="phone">User Phone : </label>
                        <input type="tel" name="phone" value="{{Auth::user()->phone}}" required><br><br>
                        @error('phone')
                            <p><span class="alert alert-danger">{{$message}}</span></p>
                        @enderror 
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Info</button>
                </form>
            </div>
            <div class="col-sm-6">
                <h2>Change User Password</h2>
                <form action="{{route('ServiceProfile.password')}}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="current_password">Current Password : </label>
                        <input type="password" name="current_password" value="" required>

                        @if ($err_pass)
                        @if ($err_pass['current_pass'])
                        <p><span class="alert alert-danger col-sm">{{$err_pass['current_pass']}}</span></p>
                        @endif
                        
                        @endif
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="new_password">New Password : </label>
                        <input type="password" name="new_password" value="" required>
                        @if ($err_pass)
                        @if ($err_pass['new_pass'])
                        <p><span class="alert alert-danger col-sm">{{$err_pass['new_pass']}}</span></p>
                        @endif
                        
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="conform_password">Conform Password : </label>
                        <input type="password" name="conform_password" value="" required>
                        @if ($err_pass)
                        @if ($err_pass['conform_pass'])
                        <p><span class="alert alert-danger col-sm">{{$err_pass['conform_pass']}}</span></p>
                        @endif
                        
                        @endif
                    </div>
                    @if ($err_pass)
                    @if (!$err_pass['conform_pass'] || !$err_pass['new_pass'] || !$err_pass['current_pass'])
                    <p><span class="alert alert-default-success">Password has been successfully changed</span></p>
                    @endif
                    
                    @endif
                    <button type="submit" class="btn btn-primary">Edit Password</button>
                </form>   
            </div>
        </div>
            
                
    </div>
    
    
@endsection
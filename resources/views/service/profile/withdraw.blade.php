@extends('layouts.service')

@section('content')
<div class="container">
<form action="#" method="POST">
                @csrf 
                <div class="form-group"></div>
                <div class="form-group">
                    <label for="user_number" class="col-sm-4">Withdraw Money:</label>
                    
                </div><br>
                <div class="form-group">
                    <label for="user_name" class="col-sm-2">Amount :</label>
                    <input type="Number" name="user_name" class="col-sm-3" value="" required>
                </div><br>
                <div class="form-group">
                    <label for="level" class="col-sm-2">Mobile Bank : </label>
                    <select name="level" class="col-sm-2">
                         @foreach($bank as $banks)
                         <option value="{{$banks->bank_name}}" >{{$banks->bank_name}}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                    <br>
                    <input type="submit"class="btn btn-primary" value='Withdraw'></div>
                    
                </div><br>
</form>
</div>
@endsection
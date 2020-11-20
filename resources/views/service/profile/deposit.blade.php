@extends('layouts.service')

@section('content')
<div class="container">
<form action="#" method="POST">
                @csrf 
                <div class="form-group"></div>
                <div class="form-group">
                    <label for="user_number" class="col-sm-3">Deposit Money:</label>
                    
                </div><br>
                <div class="form-group">
                    <label for="user_name" class="col-sm-3">Amount :</label>
                    <input type="text" name="user_name" class="col-sm-5" value="" required>
                </div><br>
                <div class="form-group">
                    <label for="level" class="col-sm-3">Mobile Bank : </label>
                    <select name="level" class="col-sm-2">
                         @foreach($bank as $banks)
                         <option value="{{$banks->name}}" >$banks->name</option>
                        @endforeach
                    </select>
                    <input type="submit" value='Deposit'>
                </div><br>
</form>
</div>
@endsection
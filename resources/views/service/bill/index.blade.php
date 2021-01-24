@extends('layouts.service')

@section('content')

<div class="container">
    <div class="form-control" style="border-left: solid seagreen 2px; border-bottom: solid seagreen 2px; border-radius: 20px;">
            <h3 align="center">Import New Bills From Excel File</h3>
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
            <form action="{{ route('ImportBill')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-sm-2"><b class="text-info">Select File</b></div>
                <div class="col-sm-8">
                    <input type="file" name="bill" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="form-control btn btn-outline-info" name="upload" value="upload">
                </div>
            </div>  
            </form>
    </div> <br>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 form-control" style="border-bottom: solid seagreen 2px; border-left: solid seagreen 2px; border-radius: 20px;">
            
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Number</th>
                <th>User number</th>
                <th>User name</th>
                @if(session()->get('group')==4)
                    <th>Grade</th>
                    <th>Department</th>
                    <th>Class</th>
                @else
                    <th>User addres</th>
                @endif
                <th>online status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($data as $item)
                <tr>
                    <td>{{++$index}}</td>
                    <td>{{$item->user_number}}</td>
                    <td>{{$item->user_name}}</td>
                    @if(session()->get('group')==4)
                        <td>{{$item->level}}</td>
                        <td>{{$item->department}}</td>
                        <td>{{$item->class}}</td>
                    @else
                    <td>{{$item->addres}}</td>
                    @endif
                    <td>@if($item->status==1)
                            User
                        @else
                            Non user
                        @endif    
                    </td>
                    <td><a href="{{route('ServiceBill.show',$item->id)}}" class="btn btn-outline-info">Bill</a></td>
                        {{-- <form action="{{route('ServiceNews.destroy',$item->id)}}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }} 
                            <a href="{{route('ServiceNews.edit',$item->id)}}" class="btn btn-outline-warning">Edit</a>
                            
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form> --}}
                    
                </tr>
                
            @endforeach
        </tbody>
    </table>
        </div>
        <div class="col-sm-1"></div>
    </div>
    </div> 
@endsection


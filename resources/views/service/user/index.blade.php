@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <hr>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                
        <form action="{{ route('Filter')}}" method="POST" class="container card" >
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Online status</th>
                        <th>Payment status</th>
                        @if(session()->get('group')==4)
                            <th>Grade</th>  
                            <th>Class</th>
                            <th>Transport use</th>  
                        @endif
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($filter)
                        
                    <td>
                        <div class="form-control">
                        <select name="status">
                            <option value="all" @if($filter['status']=="all") selected @endif>all</option>
                            <option value=0 @if($filter['status']=="0") selected @endif>not user</option>
                            <option value=1 @if($filter['status']=="1") selected @endif>online user</option>
                          </select>    
                        </div>
                        </td>
                        <td><select name="payment">
                            <option value="all" @if($filter['payment']=="all")selected @endif>all</option>
                            <option value=0 @if($filter['payment']=="0")selected @endif>not paid</option>
                            <option value=1 @if($filter['payment']=="1")selected @endif>paid</option>
                          </select></td>
                        @if(session()->get('group')==4)
                            <td><select name="grade">
                            <option value="all" @if($filter['grade']=="all")selected @endif>all</option>       
                            @for( $i=1; $i<=$datagrade->grade_max; $i++)
                                <option value="{{$i}}" @if($filter['grade']=="{{$i}}")selected @endif>{{$i}}</option>
                            @endfor
                              </select></td> 
                            
                            <td><select name="class">
                            <option value="all" @if($filter['class']=="all")selected @endif>all</option>
                                        {{$j='A'}}
                                @for( $i=1; $i<=$datagrade->class_max; $i++)
                                    <option value="{{$j}}" @if($filter['class']=="{{$j}}")selected @endif>{{$j++}}</option>
                                @endfor
                              </select></td>
                            <td><select name="transport">
                                <option value="all" @if($filter['transport']=="all")selected @endif>all</option>
                                <option value=0 @if($filter['transport']=="0")selected @endif>not user </option>
                                <option value=1 @if($filter['transport']=="1")selected @endif>user</option>
                              </select></td>  
                        @endif
                    @else
                        <td><select name="status">
                            <option value="all">all</option>
                            <option value=0>not user</option>
                            <option value=1 selected>online user</option>
                          </select></td>
                        <td><select name="payment">
                            <option value="all" selected>all</option>
                            <option value=0>not paid</option>
                            <option value=1 >paid</option>
                          </select></td>
                        @if(session()->get('group')==4)
                            <td><select name="grade">
                                <option value="all" selected>all</option>
                                @for( $i=1; $i<=$datagrade->grade_max; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                             
                            <td><select name="class">
                                <option value="all" selected>all</option>
                                {{$j='A'}}
                                @for( $i=1; $i<=$datagrade->class_max; $i++)
                                    <option value="{{$j}}">{{$j++}}</option>
                                @endfor
                              </select></td>
                            <td><select name="transport">
                                <option value="all" selected>all</option>
                                <option value=0>not user </option>
                                <option value=1 >user</option>
                              </select></td>  
                        @endif
                    @endif
                   
                    <td><button type="submit" class="btn btn-outline-info">Filter</button></td>
                </tbody>
            </table> 
        </form>
            </div>
            <div class="col-sm-1"></div>
        </div><hr>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Number</th>
                <th>User number</th>
                <th>User name</th>
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
                    <td>@if($item->status==1)
                            User
                        @else
                            Non user
                        @endif    
                    </td>
                    <td><a href="{{route('ServiceUser.show',$item->id)}}" class="btn btn-outline-info">detail</a></td>
                        
                </tr>
                
            @endforeach
        </tbody>
    </table> 
        </div>
        <div class="col-sm-1"></div>
    </div> 
    </div> 
@endsection


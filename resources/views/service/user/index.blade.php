@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <form action="{{ route('Filter')}}" method="POST" class="container card" >
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Online status</th>
                        <th>Payment status</th>
                        @if(session()->get('service_id')>5)
                            <th>Grade</th> 
                            <th>Department</th>
                            <th>Class</th>
                            <th>Transport use</th>  
                        @endif
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($filter)
                    
                    <td><select name="status">
                            <option value="all" @if($filter['status']=="all") selected @endif>all</option>
                            <option value=0 @if($filter['status']=="0") selected @endif>not user</option>
                            <option value=1 @if($filter['status']=="1") selected @endif>online user</option>
                          </select></td>
                        <td><select name="payment">
                            <option value="all" @if($filter['payment']=="all")selected @endif>all</option>
                            <option value=0 @if($filter['payment']=="0")selected @endif>not paid</option>
                            <option value=1 @if($filter['payment']=="1")selected @endif>paid</option>
                          </select></td>
                        @if(session()->get('service_id')>5)
                            <td><select name="grade">
                                <option value="all" @if($filter['grade']=="all")selected @endif>all</option>
                                <option value=1 @if($filter['grade']=="1")selected @endif>1</option>
                                <option value=2 @if($filter['grade']=="2")selected @endif>2</option>
                                <option value=3 @if($filter['grade']=="3")selected @endif>3</option>
                                <option value=4 @if($filter['grade']=="4")selected @endif>4</option>
                                <option value=5 @if($filter['grade']=="5")selected @endif>5</option>
                                <option value=6 @if($filter['grade']=="6")selected @endif>6</option>
                                <option value=7 @if($filter['grade']=="7")selected @endif>7</option>
                                <option value=8 @if($filter['grade']=="8")selected @endif>8</option>
                                <option value=9 @if($filter['grade']=="9")selected @endif>9</option>
                                <option value=10 @if($filter['grade']=="10")selected @endif>10</option>
                                <option value=11 @if($filter['grade']=="11")selected @endif>11</option>
                                <option value=12 @if($filter['grade']=="12")selected @endif>12</option>
                              </select></td> 
                            <td><select name="department">
                                <option value="all" @if($filter['department']=="all")selected @endif>all</option>
                                <option value="natural" @if($filter['department']=="natural")selected @endif>natural</option>
                                <option value="social" @if($filter['department']=="social")selected @endif>social</option>
                              </select></td>
                            <td><select name="class">
                                <option value="all" @if($filter['class']=="all")selected @endif>all</option>
                                <option value="A" @if($filter['class']=="A")selected @endif>A</option>
                                <option value="B" @if($filter['class']=="B")selected @endif>B</option>
                                <option value="C" @if($filter['class']=="C")selected @endif>C</option>
                                <option value="D" @if($filter['class']=="D")selected @endif>D</option>
                                <option value="E" @if($filter['class']=="E")selected @endif>E</option>
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
                        @if(session()->get('service_id')>5)
                            <td><select name="grade">
                                <option value="all" selected>all</option>
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                                <option value=5>5</option>
                                <option value=6>6</option>
                                <option value=7>7</option>
                                <option value=8>8</option>
                                <option value=9>9</option>
                                <option value=10>10</option>
                                <option value=11>11</option>
                                <option value=12>12</option>
                              </select></td> 
                            <td><select name="department">
                                <option value="all" selected>all</option>
                                <option value="natural">natural</option>
                                <option value="social">social</option>
                              </select></td>
                            <td><select name="class">
                                <option value="all" selected>all</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                              </select></td>
                            <td><select name="transport">
                                <option value="all" selected>all</option>
                                <option value=0>not user </option>
                                <option value=1 >user</option>
                              </select></td>  
                        @endif
                    @endif
                   
                    <td><button type="submit" class="btn btn-info">Filter</button></td>
                </tbody>
            </table>
        </form>
    </div> 
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
                    <td><a href="{{route('ServiceUser.show',$item->id)}}" class="btn btn-info">detail</a></td>
                        
                </tr>
                
            @endforeach
        </tbody>
    </table>
    </div>
   
@endsection


@extends('layouts.service')

@section('content')



<form method="POST" action="{{route('UserRegister.store',$data->id)}}">
<div class="col-6">
<select name="selection">

@foreach ($datauser as $item)

<option size="" value="{{$item->name,$item->phone}}">{{$item->name.$item->phone}}</option>

@endforeach
</select>
</div>
<div class="col-6">
<button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
</button>
</div>

</form>
@endsection
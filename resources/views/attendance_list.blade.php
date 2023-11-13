@extends('main.main_layout')
@section('title', 'attendance-list')
@section('content')


{{-- {{$attendance}} --}}

<table class="table "> 
    
    <tr>
        <td>name</td>
        @foreach ($attendance as $date => $value)
        <td>
            {{$date}}
        </td>
        @endforeach
    </tr>
    @foreach ($data as $name => $value)
   
    <tr>
        <td>{{$name}}</td>
        @foreach ($value as $items)
       <td> {{$items->status ? 'present' : 'absent'}}</td>
            {{-- <td></td>
            <td></td> --}}

          
        @endforeach
    </tr>
  
    @endforeach
 
</table>


@endsection

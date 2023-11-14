@extends('main.main_layout')
@section('title', 'attendance-list')
@section('content')

<div class="pagetitle">
    <h1>Attendance List</h1>
  </div>
{{-- {{$attendance}} --}}
<div class="card">
    <div class="card-body">
        <table class="table p-3"> 
    
            <tr>
                <th>name</th>
                @foreach ($attendance as $date => $value)
                <th>
                    {{$date}}
                </th>
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
        
    </div>
</div>


@endsection

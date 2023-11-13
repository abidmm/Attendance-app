@extends('main.main_layout')
@section('title', 'My-attendance')
@section('content')



{{-- @foreach ($dategroup as $dategroup  => $date)
   {{ $dategroup}}
  
   <br>
@endforeach --}}
@foreach ($attendanceStatus as $status)
 {{$status->date}} ::
 @if($status->status == 1)
 present
 @else
 Absent
 @endif
<br>
@endforeach

@endsection

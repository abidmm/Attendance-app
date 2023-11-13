@extends('main.main_layout')
@section('title', 'Teachers')
@section('content')


<form action="{{route('searchteacher')}}" method="post">
  @csrf
  <input type="text" placeholder="search teacher" name="search">
  <button type="submit">search</button>
</form>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">NAME</th>
        <th scope="col">EMAIL</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($teachers as $teacher)
            
        
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$teacher->name}}</td>
        <td>{{$teacher->email}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection

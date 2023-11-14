@extends('main.main_layout')
@section('title', 'Teachers')
@section('content')


<div class="pagetitle d-flex justify-content-between">
  <h1>Teacher List</h1>
  <form action="{{route('searchteacher')}}" method="post">
    @csrf
    <div class="d-flex">
    <input class="form-control " type="text" placeholder="search teacher" name="search">
    <button type="submit" class="btn btn-primary">search</button>
  </div>
  </form>
</div>


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

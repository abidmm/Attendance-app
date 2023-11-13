@extends('main.main_layout')
@section('title', 'Students')
@section('content')


    <form action="{{route('searchstudent')}}" method="post">
        @csrf
        <input type="text" placeholder="search student" name="search">
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
            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <form action="{{ route('attendance') }}" method="post">
        @csrf
        @foreach ($students as $student)
            <label>
                {{ $student->name }}:
                <input type="hidden" name="attendance[{{ $student->id }}]" value="0">
                <input type="checkbox" name="attendance[{{ $student->id }}]" value="1">
            </label><br>
        @endforeach
        <button type="submit">Submit</button>
    </form> --}}
@endsection

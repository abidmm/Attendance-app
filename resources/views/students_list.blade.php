@extends('main.main_layout')
@section('title', 'Students')
@section('content')


    <div class="pagetitle d-flex justify-content-between">
        <h1>Student List</h1>
        <form action="{{ route('searchstudent') }}" method="post">
            @csrf
            <div class="d-flex">
                <input class="form-control mr-2" type="text" placeholder="search student" name="search"
                    style="margin-right: 15px">
                <button type="submit" class="btn btn-primary">search</button>
            </div>
        </form>
    </div>

    <div class="card">
        <div class="card-body">

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
        </div>
    </div>


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

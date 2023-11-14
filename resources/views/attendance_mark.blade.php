@extends('main.main_layout')
@section('title', 'Students')
@section('content')

    @php
        use App\Models\Attendance;
        $attendance = Attendance::where('date', now()->toDateString())->get();
    @endphp



    {{-- @if ($attendance->isEmpty())
        attendance not marked
    @else
        attendance marked
    @endif --}}

    <div class="pagetitle">
        <h1>Attendance</h1>
      </div>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('attendance.post') }}" method="post">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL</th>
                            <th>Mark Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td><input type="hidden" name="attendance[{{ $student->id }}]" value="0">
                                    <input type="checkbox" name="attendance[{{ $student->id }}]" value="1">
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-center"> <button type="submit" class="btn btn-primary">Submit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
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

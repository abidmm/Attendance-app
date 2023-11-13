@extends('main.main_layout')
@section('title', 'register')

@section('content')

    <h3>REGISTER {{ Auth::user()->role == 0 ? 'FORM' : 'STUDENT' }}</h3>
    <form action="{{ route('user.register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">NAME</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="mb-3 {{ Auth::user()->role == 0 ? '' : 'd-none' }}">
            <label for="name" class="form-label">ROLE</label>
            <select class="form-select" name="role">
                <option selected value="2">Student</option>
                <option value="1">Teacher</option>

            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">EMAIL</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">PASSWORD</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">CONFIRM PASSWORD</label>
            <input type="password" name="password_confirmation" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection

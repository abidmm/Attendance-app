@extends('main.main_layout')
@section('title', 'add-Student-details')
@section('content')



    <div class="pagetitle">
        <h1>Profile</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
                        <h2>{{ Auth::user()->name }}</h2>
                        <h3>
                            @if (Auth::user()->role == 0)
                                Principle
                            @elseif(Auth::user()->role == 1)
                                Teacher
                            @else
                                Student
                            @endif
                        </h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>



                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Subject</div>
                                    <div class="col-lg-9 col-md-8">{{ $details ? $details->subject : ''}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Department</div>
                                    <div class="col-lg-9 col-md-8">{{ $details ? $details->department : ''}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Class</div>
                                    <div class="col-lg-9 col-md-8">{{ $details ? $details->class : ''}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Salary</div>
                                    <div class="col-lg-9 col-md-8">{{ $details ? $details->salary : ''}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Joining date</div>
                                    <div class="col-lg-9 col-md-8">{{ $details ? $details->joining_date : ''}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">{!! nl2br($details ? $details->address : '') !!}</div>
                                </div>

                                {{-- <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">{{ $details ? $details->phone : ''}}</div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('add.details',['id'=>Auth::user()->id]) }}" method="post">
                                    @csrf
                                    {{-- <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="assets/img/profile-img.jpg" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm"
                                                    title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"
                                                    title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div> --}}
                                    
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Department</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="department" type="text" class="form-control" id="fullName"
                                                value="{{ $details ? $details->department : ''}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Subject</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="subject" type="text" class="form-control" id="fullName"
                                                value="{{ $details ? $details->subject : ''}}">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="course" class="col-md-4 col-lg-3 col-form-label">Joining Date</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="joining_date" type="text" class="form-control" id="course"
                                                value="{{ Auth::user()->created_at->format('Y-m-d')}}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="class" class="col-md-4 col-lg-3 col-form-label">Class</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="class" type="text" class="form-control" id="class"
                                                value="{{ $details ? $details->class : ''}}">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="address"
                                                value="{{ $details ? $details->address : '' }}">
                                        </div>
                                    </div>

                                     <div class="row mb-3">
                                        <label for="address" class="col-md-4 col-lg-3 col-form-label">Salary</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="salary" type="text" class="form-control" id="address"
                                                value="{{ $details ? $details->salary : '' }}" @if ($details){{$details->salary ? 'readonly': ''}} @endif>
                                        </div>
                                    </div>

                                    {{-- <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="phone"
                                                value="{{ $details ? $details->phone : '' }}">
                                        </div>
                                    </div> --}}

                                    {{-- <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                    </div> --}}



                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>



                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('put')

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="current_password" type="password" class="form-control"
                                                id="currentPassword">
                                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                        </div>
                                      
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                id="newPassword">
                                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                        </div>
                                     
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password_confirmation" type="password" class="form-control"
                                                id="renewPassword">
                                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                        </div>
                                       
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection








{{-- @extends('main.main_layout')
@section('title','Students')
@section('content')

<form action="{{ route('add.details',['id'=>Auth::user()->id]) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" name="subject" class="form-control" id="subject" value="{{$details ? $details->subject :''}}">
    </div>
    <div class="mb-3">
        <label for="department" class="form-label">department</label>
        <input type="text" name="department" class="form-control" id="department" value="{{$details ? $details->department :''}}">
    </div>
    <div class="mb-3">
        <label for="joining_date" class="form-label">joining date</label>
        <input type="date" name="joining_date" class="form-control" id="joining_date" value="{{$details ? $details->joining_date :''}}">
    </div>
    <div class="mb-3">
        <label for="class" class="form-label">class</label>
        <input type="text" name="class" class="form-control" id="class" value="{{$details ? $details->class :''}}">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">address</label>
        <input type="text" name="address" class="form-control" id="address" value="{{$details ? $details->address :''}}">
    </div>
    <div class="mb-3">
        <label for="salary" class="form-label">salary</label>
        <input type="text" name="salary" class="form-control" id="salary" value="{{$details ? $details->salary :''}}">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
   
</form>


@endsection --}}
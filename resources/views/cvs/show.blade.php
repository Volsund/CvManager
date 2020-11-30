@extends('layout')

@section('content')
    <div id="wrapper">

        <div class="container">

            <div class="row justify-content-center">
                <h3>{{ $cv->name . ' ' . $cv->surname }} </h3>
            </div>


            <div class="row" style="border-bottom:solid">
                <h3>Contact information</h4>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <p>{{ $address->country }}, {{ $address->city }}</p>
                    <p>{{ $address->address }} , {{ $address->apartment }}</p>
                    <p>{{ $address->postal_code }}</p>

                </div>
                <div>
                    <p><span class="font-weight-bold">E-mail:</span> {{ $cv->email }}</p>
                    <p><span class="font-weight-bold">Phone number: </span>{{ $cv->phone }}</p>
                </div>
            </div>

            <div class="row" style="border-bottom:solid">
                <h3>Education</h4>
            </div>
            <div class="row">
                @foreach ($institutions as $institution)
                    <div class="col-3">
                        <div id="education_div">
                            <p><span class="font-weight-bold">University: </span>{{ $institution->institution_name }}</p>
                            <p><span class="font-weight-bold">Faculty: </span> {{ $institution->faculty }}</p>
                            <p><span class="font-weight-bold">Study program: </span>{{ $institution->study_program }}</p>
                            <p><span class="font-weight-bold">Degree: </span>{{ $institution->degree }}</p>
                            <p><span class="font-weight-bold"> Years studied: </span>{{ $institution->years_studied }}</p>
                            <p> <span class="font-weight-bold">Status: </span>{{ $institution->status }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row" style="border-bottom:solid">
                <h3>Work Experience</h4>
            </div>
            <div class="row">
                @foreach ($workplaces as $workplace)
                    <div class="col-6">
                        <div id="workplace_div">
                            <p><span class="font-weight-bold">Company: </span>{{ $workplace->company_name }}</p>
                            <p><span class="font-weight-bold">Position: </span>{{ $workplace->position }}</p>
                            <p><span class="font-weight-bold">Schedule: </span>{{ $workplace->schedule }}</p>
                            <p><span class="font-weight-bold">Years worked: </span>{{ $workplace->years_worked }}</p>
                            <p><span class="font-weight-bold">Description: </span>{{ $workplace->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div>
                <form method="POST" action="/cvs/{{ $cv->id }}">
                    @csrf
                    <div>
                        <div class="row justify-content-between">
                            <div>
                                <a href="/cvs/{{ $cv->id }}/edit">
                                    <button type="button" class="btn btn-success">Edit</button>
                                </a>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


    </div>
    </div>
@endsection

@extends('layout')

@section('content')
    <div id="wrapper">

        <div class="container">

            <div class="row justify-content-center">
                <h3>{{ $cv->name . ' ' . $cv->surname }} </h3>
                <div>
                    <a href="/cvs/{{ $cv->id }}/edit"><button type="button" class="btn btn-success">Edit</button></a>

                </div>
            </div>
            <p>{{ $cv->email }}</p>
            <p>{{ $cv->phone }}</p>
            <div>
                <h3>Address</h4>
                    <p>{{ $address->country }}</p>
                    <p>{{ $address->city }}</p>
                    <p>{{ $address->address }}</p>
                    <p>{{ $address->postal_code }}</p>
            </div>
            <div>
                <h3>Education</h4>
                    @foreach ($institutions as $institution)
                        <div id="education_div" style="border:dotted">
                            <p>{{ $institution->institution_name }}</p>
                            <p>{{ $institution->faculty }}</p>
                            <p>{{ $institution->study_program }}</p>
                            <p>{{ $institution->degree }}</p>
                            <p>{{ $institution->years_studied }}</p>
                            <p>{{ $institution->status }}</p>
                        </div>
                    @endforeach
            </div>
            <div>
                <h3>Work Experience</h4>
                    @foreach ($workplaces as $workplace)
                        <div id="workplace_div" style="border:dotted">
                            <p>{{ $workplace->company_name }}</p>
                            <p>{{ $workplace->position }}</p>
                            <p>{{ $workplace->schedule }}</p>
                            <p>{{ $workplace->years_worked }}</p>
                            <p>{{ $workplace->description }}</p>
                        </div>
                    @endforeach
            </div>
            <div>
                <form method="POST" action="/cvs/{{ $cv->id }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection

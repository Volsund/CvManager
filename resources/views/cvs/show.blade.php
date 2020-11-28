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
                    <p>{{ $education->institution_name }}</p>
                    <p>{{ $education->faculty }}</p>
                    <p>{{ $education->study_program }}</p>
                    <p>{{ $education->degree }}</p>
                    <p>{{ $education->years_studied }}</p>
                    <p>{{ $education->status }}</p>
            </div>
            <div>
                <h3>Work Experience</h4>
                    <p>{{ $work->company_name }}</p>
                    <p>{{ $work->position }}</p>
                    <p>{{ $work->schedule }}</p>
                    <p>{{ $work->years_worked }}</p>
                    <p>{{ $work->description }}</p>
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
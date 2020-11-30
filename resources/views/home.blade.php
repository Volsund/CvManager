@extends('layout')

@section('content')
    <div id="wrapper">

        <div class="container">

            <div class="title row justify-content-center">
                <div>
                    <h2>Your CV list</h2>
                    <span class="byline">Currently you have <span style="color:rgb(41, 172, 41)">{{ count($cvs) }}</span>
                        CVs made</span>
                </div>

            </div>
            <div class="row">
                @foreach ($cvs as $cv)
                    <div class="col-4">
                        <a href="{{ $cv->path() }}">
                            <div class="card border-success" style="margin-bottom: 20px">
                                <div class="card-body ">


                                    <h5 class="card-title font-weight-bold">
                                        {{ $cv->name . ' ' . $cv->surname }}
                                    </h5>

                                    <p class="card-text font-weight-bold">{{ $cv->workplaces()->first()->position }}</p>
                                    <p>{{ $cv->email }}</p>
                                    <p>{{ $cv->phone }}</p>
                                    <p>{{ $cv->address()->first()->country }}, {{ $cv->address()->first()->city }}</p>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

@endsection

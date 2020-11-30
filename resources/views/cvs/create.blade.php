@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="extra" class="container">
            <div class="title">
                <h1>New CV</h1>
            </div>
            <form method="POST" action="/cvs">
                @csrf

                {{-- Main CV section --}}
                <h3>Basic information</h3>
                <div class="form-group">
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="First name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <p style="color:red">{{ $errors->first('name') }}</p>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <input type="text" class="form-control @error('surname') is-invalid @enderror"
                                placeholder="Last name" name="surname" value="{{ old('surname') }}" required>
                            @error('surname')
                                <p style="color:red">{{ $errors->first('surname') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <p style="color:red">{{ $errors->first('email') }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="number">Phone Number</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="number"
                                name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <p style="color:red">{{ $errors->first('phone') }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{----------- Address section ----------------}}
                <h3>Address</h3>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder=""
                        value="{{ old('country') }}" required>
                    @error('country')
                        <p style="color:red">{{ $errors->first('country') }}</p>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                        @error('city')
                            <p style="color:red">{{ $errors->first('city') }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code"
                            value="{{ old('postal_code') }}" required>
                        @error('postal_code')
                            <p style="color:red">{{ $errors->first('postal_code') }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="street_address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="420 Freedom St"
                            value="{{ old('address') }}" required>
                        @error('street_address')
                            <p style="color:red">{{ $errors->first('street_address') }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apartment">Address 2</label>
                        <input type="text" class="form-control" id="apartment" name="apartment"
                            placeholder="Apartment, studio, or floor" value="{{ old('apartment') }}">
                        @error('apartment')
                            <p style="color:red">{{ $errors->first('apartment') }}</p>
                        @enderror
                    </div>
                </div>

                {{----------------------- Education section
                -------------------}}
                <div id="education_container">
                    <h3>Education</h3>
                    <button type="button" class="btn btn-warning" id="addEducation">
                        Add more
                    </button>

                    <div id="single_institution">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="institution_name">Institution name</label>
                                <input type="text" class="form-control" id="institution_name" name="institution_name[]"
                                    placeholder="University Of Zimbabwe" value="{{ old('institution_name') }}" required>
                                @error('institution_name')
                                    <p style="color:red">{{ $errors->first('institution_name') }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="faculty">Faculty</label>
                                <input type="text" class="form-control" id="faculty" name="faculty[]"
                                    placeholder="The Faculty of Arts" value="{{ old('faculty') }}" required>
                                @error('faculty')
                                    <p style="color:red">{{ $errors->first('faculty') }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="study_program">Study program</label>
                                <input type="text" class="form-control" id="study_program" name="study_program[]"
                                    placeholder="" value="{{ old('study_program') }}" required>
                                @error('study_program')
                                    <p style="color:red">{{ $errors->first('study_program') }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="degree">Degree</label>
                                <input type="text" class="form-control" id="degree" name="degree[]"
                                    placeholder="Bachelor's,Master's.." value="{{ old('degree') }}" required>
                                @error('degree')
                                    <p style="color:red">{{ $errors->first('degree') }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="years_studied">Years studied</label>
                                <input type="text" class="form-control" id="years_studied" name="years_studied[]"
                                    placeholder="" value="{{ old('years_studied') }}" required>
                                @error('years_studied')
                                    <p style="color:red">{{ $errors->first('years_studied') }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status[]"
                                    placeholder="Finished, In progress.." value="{{ old('status') }}" required>
                                @error('status')
                                    <p style="color:red">{{ $errors->first('status') }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                {{----------------------- Work Experience
                -----------------------}}

                <h3>Work Experience</h3>
                <button type="button" id="addWorkplace" class="btn btn-warning">Add more</button>

                <div id="single_workplace">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="company_name">Company name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name[]" placeholder=""
                                value="{{ old('company_name') }}" required>
                            @error('company_name')
                                <p style="color:red">{{ $errors->first('company_name') }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" id="positon" name="position[]" placeholder=""
                                value="{{ old('position') }}" required>
                            @error('position')
                                <p style="color:red">{{ $errors->first('position') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="schedule">Schedule type</label>
                            <input type="text" class="form-control" id="schedule" name="schedule[]" placeholder=""
                                value="{{ old('schedule') }}" required>
                            @error('schedule')
                                <p style="color:red">{{ $errors->first('schedule') }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="years_worked">Years worked</label>
                            <input type="text" class="form-control" id="years_worked" name="years_worked[]" placeholder=""
                                value="{{ old('years_worked') }}" required>
                            @error('years_worked')
                                <p style="color:red">{{ $errors->first('years_worked') }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description[]" placeholder=""
                            value="{{ old('description') }}" required>
                        @error('description')
                            <p style="color:red">{{ $errors->first('description') }}</p>
                        @enderror
                    </div>
                </div>

                {{--- Submit CV button --}}
                <div>
                    <button type="submit" class="btn btn-primary mb-2">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(function() {
                $('#addEducation').click(function() {
                    $("#single_institution").append(`
                                    <div id="single_institution">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="institution_name">Institution name</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="institution_name"
                                                        name="institution_name[]"
                                                        placeholder="University Of Zimbabwe"
                                                        value="{{ old('institution_name') }}"
                                                        required>
                                                    @error('institution_name')
                                                                            <p style="color:red">{{ $errors->first('institution_name') }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="faculty">Faculty</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="faculty"
                                                        name="faculty[]"
                                                        placeholder="The Faculty of Arts"
                                                        value="{{ old('faculty') }}"
                                                        required>
                                                    @error('faculty')
                                                                            <p style="color:red">{{ $errors->first('faculty') }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="study_program">Study program</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="study_program"
                                                        name="study_program[]"
                                                        placeholder=""
                                                        value="{{ old('study_program') }}"
                                                        required>
                                                    @error('study_program')
                                                                            <p style="color:red">{{ $errors->first('study_program') }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="degree">Degree</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="degree"
                                                        name="degree[]"
                                                        placeholder="Bachelor's,Master's.."
                                                        value="{{ old('degree') }}"
                                                        required>
                                                    @error('degree')
                                                                            <p style="color:red">{{ $errors->first('degree') }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="years_studied">Years studied</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="years_studied"
                                                        name="years_studied[]"
                                                        placeholder=""
                                                        value="{{ old('years_studied') }}"
                                                        required>
                                                    @error('years_studied')
                                                                            <p style="color:red">{{ $errors->first('years_studied') }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="status">Status</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="status"
                                                        name="status[]"
                                                        placeholder="Finished, In progress.."
                                                        value="{{ old('status') }}"
                                                        required>
                                                    @error('status')
                                                         <p style="color:red">{{ $errors->first('status') }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    `);
                });
            });
        });
        $(document).ready(function() {
            $(function() {
                $('#addWorkplace').click(function() {
                    $("#single_workplace").append(`
                    <div id="single_workplace">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="company_name">Company name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name[]" placeholder=""
                                value="{{ old('company_name') }}" required>
                            @error('company_name')
                                <p style="color:red">{{ $errors->first('company_name') }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" id="positon" name="position[]" placeholder=""
                                value="{{ old('position') }}" required>
                            @error('position')
                                <p style="color:red">{{ $errors->first('position') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="schedule">Schedule type</label>
                            <input type="text" class="form-control" id="schedule" name="schedule[]" placeholder=""
                                value="{{ old('schedule') }}" required>
                            @error('schedule')
                                <p style="color:red">{{ $errors->first('schedule') }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="years_worked">Years worked</label>
                            <input type="text" class="form-control" id="years_worked" name="years_worked[]" placeholder=""
                                value="{{ old('years_worked') }}" required>
                            @error('years_worked')
                                <p style="color:red">{{ $errors->first('years_worked') }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description[]" placeholder=""
                            value="{{ old('description') }}" required>
                        @error('description')
                            <p style="color:red">{{ $errors->first('description') }}</p>
                        @enderror
                    </div>
                </div>
                                    `);
                });
            });
        });


    </script>
@endsection

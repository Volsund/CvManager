<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Address;
use App\Models\EducationalInstitution;
use App\Models\Workplace;

class CvController extends Controller
{
    public function show($cvid)
    {
        $cv = Cv::where('id', $cvid)->firstOrFail();

        $address = $cv->address()->first();

        $work = $cv->workplaces()->first();

        $education = $cv->institutions()->first();

        return view('cvs.show', [
            'cv' => $cv,
            'address' => $address,
            'education' => $education,
            'work' => $work,
        ]);
    }

    public function create()
    {
        return view('cvs.create');
    }

    public function store()
    {
        $validatedAttributes = $this->validateInputs();

        $cv = Cv::create($validatedAttributes);

        $cv->address()->create($validatedAttributes);

        $cv->institutions()->create($validatedAttributes);

        $cv->workplaces()->create($validatedAttributes);

        return redirect(route('cvs.index'));
    }

    public function edit($id)
    {
        $cv = Cv::find($id);
        $address = $cv->address()->first();
        $education = $cv->institutions()->first();
        $work = $cv->workplaces()->first();

        return view('cvs.edit', [
            'cv' => $cv,
            'address' => $address,
            'education' => $education,
            'work' => $work,
        ]);
    }

    public function update($id)
    {
        $validatedAttributes = $this->validateInputs();

        $cv = Cv::find($id);

        $address = $cv->address()->first();
        $education = $cv->institutions()->first();
        $work = $cv->workplaces()->first();

        $cv->update($validatedAttributes);

        $address->update($validatedAttributes);

        $education->update($validatedAttributes);

        $work->update($validatedAttributes);

        return redirect($cv->path());
    }

    public function destroy($id)
    {
        $cv = Cv::find($id);
        $cv->delete();

        return redirect(route('cvs.index'));
    }

    protected function validateInputs()
    {
        return request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'surname' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'min:4', 'max:255'],
            'phone' => ['required', 'min:8', 'max:255'],
            'country' => ['required', 'min:4', 'max:255'],
            'city' => ['required', 'min:3', 'max:255'],
            'address' => ['required', 'min:3', 'max:255'],
            'apartment' => ['max:255'],
            'postal_code' => ['required', 'min:4', 'max:255'],
            'institution_name' => ['required', 'min:4', 'max:255'],
            'faculty' => ['required', 'min:4', 'max:255'],
            'study_program' => ['required', 'min:4', 'max:255'],
            'degree' => ['required', 'min:4', 'max:255'],
            'years_studied' => ['required', 'min:1', 'max:255'],
            'status' => ['required', 'min:4', 'max:255'],
            'company_name' => ['required', 'min:3', 'max:255'],
            'position' => ['required', 'min:3', 'max:255'],
            'schedule' => ['required', 'min:3', 'max:255'],
            'years_worked' => ['required', 'min:1', 'max:255'],
            'description' => ['required', 'min:8', 'max:255'],
        ]);
    }
}

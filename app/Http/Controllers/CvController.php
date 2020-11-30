<?php

namespace App\Http\Controllers;

use App\Models\Cv;

class CvController extends Controller
{
    public function show($cvid)
    {
        $cv = Cv::where('id', $cvid)->firstOrFail();

        return view('cvs.show', [
            'cv' => $cv,
            'address' => $cv->address,
            'institutions' => $cv->institutions,
            'workplaces' => $cv->workplaces,
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

        for ($i = 0; $i < count($validatedAttributes['institution_name']); $i++) {
            $cv->institutions()->create([
                'institution_name' => $validatedAttributes['institution_name'][$i],
                'study_program' => $validatedAttributes['study_program'][$i],
                'faculty' => $validatedAttributes['faculty'][$i],
                'degree' => $validatedAttributes['degree'][$i],
                'years_studied' => $validatedAttributes['years_studied'][$i],
                'status' => $validatedAttributes['status'][$i],
            ]);
        };

        for ($i = 0; $i < count($validatedAttributes['company_name']); $i++) {
            $cv->workplaces()->create([
                'company_name' => $validatedAttributes['company_name'][$i],
                'position' => $validatedAttributes['position'][$i],
                'schedule' => $validatedAttributes['schedule'][$i],
                'years_worked' => $validatedAttributes['years_worked'][$i],
                'description' => $validatedAttributes['description'][$i],
            ]);
        };

        return redirect(route('cvs.index'));
    }

    public function edit($id)
    {
        $cv = Cv::where('id', $id)->firstOrFail();

        return view('cvs.edit', [
            'cv' => $cv,
            'address' => $cv->address,
            'institutions' => $cv->institutions,
            'workplaces' => $cv->workplaces,
        ]);
    }

    public function update($id)
    {
        $validatedAttributes = $this->validateInputs();
        $cv = Cv::find($id);

        $cv->update($validatedAttributes);

        $cv->address()->first()->update($validatedAttributes);

        for ($i = 0; $i < count($validatedAttributes['institution_name']); $i++) {

            if ($cv->institutions->get($i)) {
                $cv->institutions->get($i)->update([
                    'institution_name' => $validatedAttributes['institution_name'][$i],
                    'study_program' => $validatedAttributes['study_program'][$i],
                    'faculty' => $validatedAttributes['faculty'][$i],
                    'degree' => $validatedAttributes['degree'][$i],
                    'years_studied' => $validatedAttributes['years_studied'][$i],
                    'status' => $validatedAttributes['status'][$i],
                ]);
            } else {
                $cv->institutions()->create([
                    'institution_name' => $validatedAttributes['institution_name'][$i],
                    'study_program' => $validatedAttributes['study_program'][$i],
                    'faculty' => $validatedAttributes['faculty'][$i],
                    'degree' => $validatedAttributes['degree'][$i],
                    'years_studied' => $validatedAttributes['years_studied'][$i],
                    'status' => $validatedAttributes['status'][$i],
                ]);
            };
        };

        for ($i = 0; $i < count($validatedAttributes['company_name']); $i++) {
            if ($cv->workplaces->get($i)) {
                $cv->workplaces->get($i)->update([
                    'company_name' => $validatedAttributes['company_name'][$i],
                    'position' => $validatedAttributes['position'][$i],
                    'schedule' => $validatedAttributes['schedule'][$i],
                    'years_worked' => $validatedAttributes['years_worked'][$i],
                    'description' => $validatedAttributes['description'][$i],
                ]);
            } else {
                $cv->workplaces()->create([
                    'company_name' => $validatedAttributes['company_name'][$i],
                    'position' => $validatedAttributes['position'][$i],
                    'schedule' => $validatedAttributes['schedule'][$i],
                    'years_worked' => $validatedAttributes['years_worked'][$i],
                    'description' => $validatedAttributes['description'][$i],
                ]);
            };
        };

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

            'institution_name' => ['required', 'min:1'],
            'institution_name.*' => ['required', 'min:4', 'max:255'],
            'faculty' => ['required', 'min:1',],
            'faculty.*' => ['required', 'min:4', 'max:255'],
            'study_program' => ['required', 'min:1',],
            'study_program.*' => ['required', 'min:4', 'max:255'],
            'degree' => ['required', 'min:1',],
            'degree.*' => ['required', 'min:3', 'max:255'],
            'years_studied' => ['required', 'min:1',],
            'years_studied.*' => ['required', 'min:1', 'max:255'],
            'status' => ['required', 'min:1',],
            'status.*' => ['required', 'min:1', 'max:255'],

            'company_name' => ['required', 'min:1'],
            'company_name.*' => ['required', 'min:3', 'max:255'],
            'position' => ['required', 'min:1'],
            'position.*' => ['required', 'min:1', 'max:255'],
            'schedule' => ['required', 'min:1'],
            'schedule.*' => ['required', 'min:1', 'max:255'],
            'years_worked' => ['required', 'min:1'],
            'years_worked.*' => ['required', 'min:1', 'max:255'],
            'description' => ['required', 'min:1'],
            'description.*' => ['required', 'min:1', 'max:255'],
        ]);
    }
}

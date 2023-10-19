<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->middleware('auth');
        $this->model = new Registration;
    }

    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request): View|RedirectResponse
    {
        $school_years = Registration::school_years();

        if ($request->has(['student_id', 'school_year_id'])) {
            $key1 = $request->get('school_year_id');
            $key2 = $request->get('student_id');

            $registrations = Registration::search($key1, $key2);

            return redirect(route('registrations.index'))
                ->with('registrations', $registrations);

        } elseif (session()->has('registrations')) {
            $registrations = session()->get('registrations');

            if ($registrations->count() > 0) {
                toast('Matrícula existente', 'success');
            } else {
                toast('Matrícula inexistente', 'info');
            }
        } else {
            $registrations = Registration::items();
        }

        return view('others.registration.index', compact('registrations', 'school_years'));
    }

    /**
     * Show the form for creating a new resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\VIew\View
     */
    public function create(Request $request): View
    {
        if ($request->has('id')) {

            return view('others.registration.create', [
                'model' => $this->model,
                'student' => Registration::get_student($request->get('id'))
            ]);

        } else {

            if ($request->has('student_id')) {
                if ($students = Registration::find_student($request->get('student_id'))) {
                    toast('Aluno encontrado', 'success');
                } else {
                    toast('Aluno não registado', 'info');
                }
            } else {
                $students = Registration::students();
            }

            $records = Registration::nb_students();

            return view('others.registration.create', compact('students', 'records'));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\StoreRegistrationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRegistrationRequest $request): RedirectResponse
    {
        /**
         * Evaluate the model operation
         * Return the specific alert
         */
        $stored = Registration::store($request);
        toast($stored['message'], $stored['type']);

        return redirect(route('registrations.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Models\Registration $registration
     * @return \Illuminate\View\View
     */
    public function edit(Registration $registration): View
    {
        $model = $this->model;

        return view('others.registration.edit', compact('registration', 'model'));
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\UpdateRegistrationRequest $request
     * @param \App\Models\Registration $registration
     */
    public function update(UpdateRegistrationRequest $request, Registration $registration)
    {
        /**
         * Evaluate the model operation
         * Return the specific alert
         */
        $updated = $registration->_update($request);
        toast($updated['message'], $updated['type']);

        return redirect(route('registrations.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Summary of search
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function search(Request $request)
    {
        return Student::search($request);
    }

    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request): View|RedirectResponse
    {
        if ($request->student_id) {
            $search = Student::take($request->student_id);

            toast($search['message'], $search['type']);

            if ($search['status']) {
                return redirect(route('students.show', $search['student']));
            }
        }

        $records = Student::count();
        $students = Student::items();

        return view('others.student.index', compact('students', 'records'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('others.student.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\StoreStudentRequest
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(StoreStudentRequest $request): RedirectResponse
    {
        /**
         * Evaluate the model operation
         * Return the specific alert
         */
        $stored = Student::store($request);
        toast($stored['message'], $stored['type']);

        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     * @param \App\Models\Student $student
     * @return \Illuminate\View\View
     */
    public function show(Student $student): View
    {
        return view('others.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Models\Student $student
     * @return \Illuminate\View\View
     */
    public function edit(Student $student): View
    {
        return view('others.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Models\Student $student
     * @param \App\Http\Requests\UpdateStudentRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        /**
         * Evaluate the model operation
         * Return the specific alert
         */
        $updated = $student->_update($request);
        toast($updated['message'], $updated['type']);

        return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Student $student): RedirectResponse
    {
        /**
         * Evaluate the model operation
         * Return the specific alert
         */
        $destroyed = $student->_destroy();
        toast($destroyed['message'], $destroyed['type']);

        return redirect(route('students.index'));
    }
}

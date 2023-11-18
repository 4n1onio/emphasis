<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class dashboard extends Component
{
    public int $nbStudents;
    public int $nbEnrolleds;
    public int $nbCreatedClasses;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->nbStudents = \App\Models\Student::count();
        $this->nbEnrolleds = \App\Models\Registration::count();
        $this->nbCreatedClasses = \App\Models\CreatedClass::count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard');
    }
}

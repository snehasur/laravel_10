<?php

namespace App\Observers;

use App\Models\Student;

class StudentObserver
{


    public function creating(Student $student): void {
        \Log::info($student->name." is creating..., please wait!");
    }

    /**
     * Handle the Student "created" event.
     */
    public function created(Student $student): void
    {
        \Log::info($student->name." is created");
    }

    /**
     * Handle the Student "updated" event.
     */
    public function updated(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "deleted" event.
     */
    public function deleted(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "restored" event.
     */
    public function restored(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     */
    public function forceDeleted(Student $student): void
    {
        //
    }
}

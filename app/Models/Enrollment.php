<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batch;
use App\Models\Student;

class Enrollment extends Model
{
    use HasFactory;
        protected $table = 'enrollments';
        protected $primaryKey = 'id';
        protected $fillable = [        
            'enroll_no',
            'batch_id',    
            'student_id'            
        ];


        // protected $attributes = [
        //     "isEnrolled"
        // ];

        // public function getIsEnrolledAttribute() {
        //     return $this->status == 1 ? "Paid" : "Unpaid";
        // }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }


    // public function setEnrollNoAttribute($value)
    // {
    //     // $latestEno = static::max('enroll_no');
    //     // $nextEnoNumber = (int)substr($latestEno, 3) + 1; // Extract the numeric part and increment
    //     // $this->attributes['enroll_no'] = "EN-".$nextEnoNumber; // Convert name to uppercase
    // }

    public static function boot()
    {
        parent::boot();

        // Listen for the creating event and generate the Eno value
        static::creating(function ($item) {
            $latestEno = static::max('enroll_no');
            $nextEnoNumber = (int)substr($latestEno, 3) + 1; // Extract the numeric part and increment
            $item->enroll_no = 'EN-' . $nextEnoNumber;
        });
    }
}

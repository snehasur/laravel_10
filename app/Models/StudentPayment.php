<?php

namespace App\Models;
use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    protected $table = 'student_payments';
    protected $primaryKey = 'id';
    protected $fillable = [        
        'enroll_id',
        'customer_id',    
        'transaction_id',
        'currency',
        'amount',
        'payment_type',

    ];
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }



    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeCustomer extends Model
{
    protected $table = 'stripe_customers';
    protected $primaryKey = 'id';
    protected $fillable = [        
        'student_id',
        'student_name',    
        'student_email',
        'token'
    ];
    use HasFactory;
}

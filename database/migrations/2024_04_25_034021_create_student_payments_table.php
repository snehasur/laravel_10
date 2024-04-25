<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_payments', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('enroll_id');
            $table->foreign('enroll_id')
                  ->references('id')->on('enrollments')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
                  ->references('id')->on('stripe_customers')
                  ->onDelete('cascade');
            $table->string('transaction_id');
            $table->string('currency');
            $table->decimal('amount', 10, 2);
            $table->string('payment_type');
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_payments');
    }
};

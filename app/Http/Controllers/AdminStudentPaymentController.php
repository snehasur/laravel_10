<?php

namespace App\Http\Controllers;
use App\Models\Enrollment;
use App\Models\StripeCustomer;
use App\Models\StudentPayment;
use Illuminate\Http\Request;

class AdminStudentPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $datas = StudentPayment::all();
        dd($datas);
        return view('backend.payments.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $enrollments = Enrollment::where('status', '=', 0)->get();
        return view('backend.payments.create', ['enrollments' => $enrollments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentPayment  $studentPayment
     * @return \Illuminate\Http\Response
     */
    public function show(StudentPayment $studentPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentPayment  $studentPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentPayment $studentPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentPayment  $studentPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentPayment $studentPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentPayment  $studentPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentPayment $studentPayment)
    {
        //
    }
    // public function afterPayment()
    // {

    //     $datas = Enrollment::all();
    //     return view('backend.enrollments.index', ['datas' => $datas]);
    // }
     /**
     * payment view load with customer create in stripe
     */
    public function payment($enrollment_id)
    {
        $data = Enrollment::where('id',$enrollment_id)->first();
        $apiKey = env('STRIPE_SECRET');
        
        \Stripe\Stripe::setApiKey($apiKey);


		$amount = 1200;//$data->batch->course->fee;
        $amount = $amount * 100;
        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Student Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		//return view('checkout.credit-card',compact('intent', 'amount'));
        
        //dd($intent);
        return view('backend.payments.create', ['data' => $data,'intent' => $intent]);
    }
     /**
     * after payment order create and update enrollment status
     */
    public function afterPayment(Request $request)
    {
        //
        $stripe_customer=StripeCustomer::create([
            'student_id' => $request->student_id,
            'student_name' => $request->student_name,
            'student_email' => $request->student_email,
            'token' => $request->token
        ]);
        $customer_id = $stripe_customer->id;
        $payment=StudentPayment::create([
            'enroll_id' => $request->enroll_id,
            'customer_id' => $customer_id,
            'transaction_id' => $request->transaction_id,
            'currency' => $request->currency,
            'amount' => $request->amount,
            'payment_type' => $request->payment_type,

        ]);
        $paymentId=$payment->id;
        $updatePaymentStatus=Enrollment::where('id', $request->enroll_id)->update([
            'status' => 1
        ]);

        $datas = Enrollment::all();


        return view('backend.enrollments.index', ['datas' => $datas]);
    }
}


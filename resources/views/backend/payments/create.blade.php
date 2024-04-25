@extends('backend.layout.layout')

@section('space-work')
<div class="card">
  <div class="card-header">
    Payment Add
  </div>
  <div class="card-body">
        <h5 class="card-title">Enroll No:{{$data->enroll_no}}</h5>       
        <p class="card-text">Batch Name:{{$data->batch->name}}</p>
        <p class="card-text">Start Date:{{$data->batch->start_date}}</p>        
        <h5 class="card-title">Course Details:</h5>
        <p class="card-text">Course Name:{{$data->batch->course->name}}</p>
        <p class="card-text">Syllabus:{{$data->batch->course->syllabus}}</p>
        <p class="card-text">Duration:{{$data->batch->course->duration()}}</p>
        <h5 class="card-title">Teacher Details:</h5>
        <p class="card-text">Teacher Name:{{$data->batch->teacher->name}}</p>
        <p class="card-text">Teacher Email:{{$data->batch->teacher->email}}</p>
        <p class="card-text">Teacher Phone:{{$data->batch->teacher->phone}}</p>
        <p class="card-text">Teacher Address:{{$data->batch->teacher->address}}</p>
        <h5 class="card-title">Student Details:</h5>
        <p class="card-text">Name:{{$data->student->name}}</p>
        <p class="card-text">Email:{{$data->student->email}}</p>
        <p class="card-text">Phone No:{{$data->student->phone}}</p>
        <p class="card-text">Address:{{$data->student->address}}</p>
     
    @php
    $stripe_key = env('STRIPE_KEY');
    @endphp
    <div class="container" style="margin-top:10%;margin-bottom:10%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <p>Your Total Amount is {{$data->batch->course->fee}} INR</p>
                </div>
                <div class="card">
                    <form action="{{route('checkout.credit-card')}}"  method="post" id="payment-form">
                        @csrf
                        <input type="hidden" name="student_id" value="{{$data->student->id}}">
                        <input type="hidden" name="student_name" value="{{$data->student->name}}">
                        <input type="hidden" name="student_email" value="{{$data->student->email}}">
                        <input type="hidden" name="token" value="{{ $intent }}">


                        <input type="hidden" name="transaction_id" value="" id="transaction_id"> 
                        <input type="hidden" name="currency" value="" id="currency">
                        <input type="hidden" name="amount" value="{{$data->batch->course->fee}}">
                        <input type="hidden" name="enroll_id" value="{{$data->id}}" > 
                        <input type="hidden" name="payment_type" value="stripe" > 


                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Enter your credit card information
                                </label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="" />
                            </div>
                        </div>
                        <div class="card-footer">
                          <button
                          id="card-button"
                          class="btn btn-dark"
                          type="submit"
                          data-secret="{{ $intent }}"
                          > Pay </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <script src="https://js.stripe.com/v3/"></script>
  <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

              // Additional details to pass
            const additionalDetails = {
                email: '{{$data->student->email}}'//, // Customer's email
                // metadata: {
                //     orderId: '12345', // Custom metadata, such as order ID
                //     customField: 'value' // Additional custom fields
                // }
            };
            // Assuming cardHolderName is an input element
            const cardHolderName = document.getElementById('cardHolderName');
            // Assuming Stripe object is initialized
            stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    billing_details: { email: '{{$data->student->email}}' },
                    //...additionalDetails // Merge additional details with payment method data
                }

            // stripe.handleCardPayment(clientSecret, cardElement, {
            //     payment_method_data: {
            //         billing_details: { name: cardHolderName.value }
            //     }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                  $('#transaction_id').val(result.paymentIntent.id);
                  $('#currency').val(result.paymentIntent.currency);
                    //console.log(result.paymentIntent.currency);
                    form.submit();
                }
            });
        });
    </script>
    

  </div>
</div>
@endsection

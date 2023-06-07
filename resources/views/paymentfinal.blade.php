@extends('master')

@section('content')
  <div class="container py-5">
    <div class="card shadow-lg p-4">
      <h1 class="text-center mb-4"><b>PAYMENT DETAILS</b></h1>

      <div class="mb-4">
        <h4 class="fw-normal">Total Amount:</h4> 
        <p class="lead">{{ $total }}</p>
      </div>

      <h4 class="fw-normal mb-3">Payment Method:</h4>

      <form action="{{ route('pay') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-check payment-option">
              <input id="esewa" name="paymentMethod" type="radio" class="form-check-input" value="esewa" required>
              <label for="esewa" class="form-check-label d-flex align-items-center mb-0">
                eSewa
              </label>
            </div>
          </div>

        </div>

        <input type="hidden" name="email" value="test@test.com">
        <input type="hidden" name="user_id" value="{{ $user_id }}">
        <input type="hidden" name="amount" value="{{ $total }}">
        <input type="hidden" name="product_id" value="1">

        <div class="mt-4">
          <button type="submit" class="btn btn-success" style="width: 100%;">Pay Now</button>
        </div>
      </form>
    </div>
  </div>

<style>

.card {
  max-width: 600px;
  margin: 0 auto;
  border-radius: 10px;
}

.payment-option {
  position: relative;
}

.form-check-input[type="radio"] {
  position: absolute;
  left: -9999px;
}

.form-check-label {
  position: relative;
  padding-left: 40px;
  cursor: pointer;
}

.form-check-label:before {
  content: "";
  display: inline-block;
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background-color: #fff;
  border: 2px solid #d1d1d1;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.form-check-input:checked + .form-check-label:before {
  background-color: #28a745;
  border-color: #


  </style>
@endsection

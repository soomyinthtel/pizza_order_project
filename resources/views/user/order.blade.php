@extends('user.layout.style')
@section('content')
<div class="row mt-5 d-flex justify-content-center">
    <div class="col-4 ">
    <img src="{{ asset('uploads/'.$pizza->image) }}" class="img-thumbnail" width="100%">            <br>
        
        <a href="{{ route('user#index')}}">
            <button class="btn bg-dark text-white" style="margin-top: 20px;">
                <i class="fas fa-backspace"></i> Back
            </button>
        </a>
    </div>
    <div class="col-6">

        @if (Session::has('totalTime'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Order Success ! Please wait {{ Session::get('totalTime') }} minutes.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h5>Name</h5>
        <small>{{ $pizza->pizza_name }}</small><hr>
        <h5>Price</h5>
        <small>{{ $pizza->price-$pizza->discount_price }} Kyats</small><hr>
        <h5>Waiting Time</h5>
        <small>{{ $pizza->waiting_time }} Minutes</small><hr>
        <form action="" method="POST">
            @csrf
            <h5>Pizza Count</h5>
            <input type="number" name="pizzaCount" class="form-control" placeholder="Set number of pizza you want">
            @if ($errors->has('pizzaCount'))
                <p class="text-danger">{{ $errors->first('pizzaCount')}}</p>
            @endif
            <h5>Payment Type</h5>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="paymentType" id="inlineRadio1" value="1">
                <label class="form-check-label" for="inlineRadio1">Credit Card</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="paymentType" id="inlineRadio2" value="2">
                <label class="form-check-label" for="inlineRadio2">Cash</label>
              </div><br>
              @if ($errors->has('paymentType'))
                <p class="text-danger">{{ $errors->first('paymentType')}}</p>
            @endif
              <button class="btn btn-primary mt-5" type="sumbit"><i class="fas fa-shopping-cart"></i> Order</button>

        </form>
        
    </div>
</div>
@endsection
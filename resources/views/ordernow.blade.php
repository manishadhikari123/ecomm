@extends('master')
@section("content")
<div class="custom-product-ordernow" style="padding:100px;">
    
    <div class="col-sm-10">
    <table class="table">
  
  <tbody>
    <tr>
      <td>Amount</td>
      <td>Rs {{$total}}</td>
    </tr>
    <tr>
      <td>Tax</td>
      <td>Rs 0</td>
    </tr>
    <tr>
      <td>Delivery</td>
      <td>Rs 10</td>
    </tr>
    <tr>
      <td>Total Amount</td>
      <td>Rs{{$total+10}}</td>
    </tr>
  </tbody>
</table>  
<div>
<form style="padding:100px;">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <textarea type="email" placeholder="enter your address" class="form-control" ></textarea>
  </div>
  <div class="form-group" style="padding:20px;">
    <h2><label for="exampleInputPassword1">Payment method</label></h2>
    
    <input type="radio" name="payment"><span> online payment</span>
    <br>
    <input type="radio" name="payment"><span> payment on delivery</span>

  </div>
  <button type="submit" class="btn btn-primary">Order Now</button>
</form>
</div>
    


    </div> 
</div>
@endsection
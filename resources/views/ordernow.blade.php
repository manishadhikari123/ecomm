@extends('master')
@section('content')
    <div class="custom-product-ordernow" style="padding:100px;">

        <div class="col-sm-10">
            <table class="table">

                <tbody>
                    <tr>
                        <td>AMOUNT:</td>
                        <td>Rs {{ $total }}</td>
                    </tr>
                    <tr>
                        <td>TAX:</td>
                        <td>Rs.0</td>
                    </tr>
                    <tr>
                        <td>DELIVERY CHARGE:</td>
                        <td>Rs.80</td>
                    </tr>
                    <tr>
                        <td>TOTAL AMOUNT:</td>
                        <td>Rs {{ $total + 80 }}</td>
                    </tr>
                </tbody>
            </table>
            <div>




                <form action="/orderplace" method="POST" style="padding:100px;" onsubmit="validatesubmit(event)">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea id="address" name="address" oninput="validateAddress()" placeholder="Enter Your Address"
                            class="form-control"></textarea>
                        <span id="address-message" style="color:red;"></span>

                    </div>
                    <div class="form-group" style="padding:20px;">
                        <h2><label for="exampleInputPassword1">Payment Method</label></h2>

                        <input type="radio" value="online" name="payment" checked><span> Online Payment</span>
                        <br>
                        <!--<input type="radio" value="cash" name="payment"><span> payment on delivery</span>-->

                    </div>
                    <button type="submit" class="btn btn-primary">Start Payment Process</button>
                </form>
                
                <script>
                    window.formvalid = {
                        address: false
                    };

                    function validatesubmit(event) {
                        if (!formvalid.address) {
                            event.preventDefault();
                            alert('invalid input');
                        }

                    }

                    function validateAddress() {
                        var address = document.getElementById("address").value;
                        var addressMessage = document.getElementById("address-message");

                        if (!address) {
                            addressMessage.innerHTML = "Address is Required.";
                            formvalid.address = false;
                        } else if (/\d/.test(address)) {
                            addressMessage.innerHTML = "Address Cannot Contain Numbers.";
                            formvalid.address = false;
                        } else {
                            addressMessage.innerHTML = "";
                            formvalid.address = true;
                        }
                    }
                </script>




            </div>



        </div>
    </div>
@endsection

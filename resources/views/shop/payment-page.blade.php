
<button id="rzp-button1" hidden="">Pay</button> 
<form action="{{url('/payment-complete')}}" method="POST" hidden="">
        <input type="hidden" value="{{csrf_token()}}" name="_token" /> 
        <input type="text" class="form-control" id="rzp_paymentid"  name="rzp_paymentid">
        <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid">
        <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">
        <input type="text" class="form-control" id="rzp_amount" name="rzp_amount">
        <input type="text" class="form-control" id="product_id" name="product_id">
        <input type="text" class="form-control" id="address_id" name="address_id">
        <input type="text" class="form-control" id="cart_id" name="cart_id">
    <button type="submit" id="rzp-paymentresponse" class="btn btn-primary">Submit</button>
</form>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var tamount = {{$response['amount']}};
    document.getElementById('rzp_amount').value = tamount/100;

    var p_id = {{$response['product_id']}};
    document.getElementById('product_id').value = p_id;
    
    var a_id = {{$response['address_id']}};
    document.getElementById('address_id').value = a_id;
    var c_id = {{$response['cart_id']}};
    document.getElementById('cart_id').value = c_id;

var options = {
    "key": "{{$response['razorpayId']}}", // Enter the Key ID generated from the Dashboard
    "amount": "{{$response['amount']}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "{{$response['currency']}}",
    "description": "{{$response['description']}}",
    "image": "http://127.0.0.1:8000/assets/images/logo/logo-1.png", // You can give your logo url
    "order_id": "{{$response['orderId']}}",

    "handler": function (response,tamount){
        document.getElementById('rzp_paymentid').value = response.razorpay_payment_id;
        document.getElementById('rzp_orderid').value = response.razorpay_order_id;
        document.getElementById('rzp_signature').value = response.razorpay_signature;

        document.getElementById('rzp-paymentresponse').click();
    },
    "theme": {
        "color": "#ff4500"
    }
};
var rzp1 = new Razorpay(options);
window.onload = function(){
    document.getElementById('rzp-button1').click();
};

document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>


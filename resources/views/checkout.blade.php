@extends('layouts.header')
@section('content')
<style>
    .table_result .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .table_result .row .col-25 {
        -ms-flex: 25%; /* IE10 */
        flex: 25%;
    }

    .row .col-50 {
        -ms-flex: 50%; /* IE10 */
        flex: 50%;
    }

    .row .col-75 {
        -ms-flex: 75%; /* IE10 */
        flex: 75%;
    }

    .row .col-75 .col-25,
    .row .col-75 .col-50,
    .row .col-75 .col-75 {
        padding: 0 16px;
    }

    .table_result .row .col-75 .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }
   .btn_checkout {
        background-color: #9d43ac;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .btn_checkout:hover {
        background-color: #9d43ac;
    }

    a {
        color: #2196F3;
    }

    hr {
        border: 1px solid lightgrey;
    }

    span.price {
        float: right;
        color: grey;
    }
    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }
        .col-25 {
            margin-bottom: 20px;
        }
    }
</style>


<h2 style="text-align: center;padding: 30px 0px;text-transform: capitalize;">Checkout</h2>
<div class="table_result" style="min-height: calc(100vh - 500px)">


    <div class="row">
        <div class="col-75">
            <div class="container ">
                <div class="checkout_form">
                    <form action="{{ url('checkout') }}" method="post" class="make_ajax_submit">
                        @csrf
                        <div class="row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="f_name"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" id="f_name" name="f_name" placeholder="John M. Doe">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="email" placeholder="john@example.com">
                                <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
                                <input type="text" id="address" name="address" placeholder="542 W. 15th Street">
                                <label for="city"><i class="fa fa-institution"></i> City</label>
                                <input type="text" id="city" name="city" placeholder="New York">

                                <div class="row">
                                    <div class="col-50">
                                        <label for="state">State</label>
                                        <input type="text" id="state" name="state" placeholder="NY">
                                    </div>
                                    <div class="col-50">
                                        <label for="zip">Zip</label>
                                        <input type="text" id="zip" name="zip" placeholder="10001">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <input type="submit" value="Continue to checkout" class="btn_checkout">
                    </form>
                </div>
                <div id="paypal-button-container" style="text-align: center;margin-top: 50px">

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AX1sAfg8RMwWQ7ZAPkZR-MtM7t-zec_ejwefb4A3BewgbivH3Rx-wjdqkJprYN0bAJw14Z3AQ8UiMt3E&components=buttons"></script>
<script type="text/javascript">

//Paypal Integration

var order_id;
function accept_payment(){
    paypal.Buttons({
        style: {
            layout: 'vertical',
            color:  'blue',
            shape:  'rect',
            label:  'paypal'
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: {{ $total_amount }}
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            console.log(data);
            $.ajax({
                url: '{{ url('accept_payment') }}',
                method: 'POST',
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                data: {
                    'orderID': data.orderID,
                    'payerID': data.payerID,
                    local_order: order_id
                },
                success: function(response){
                    alert('Payment Completed!')
                    window.location.replace("{{ url('marketplace') }}");
                }

            });
        },
        onError: function (err) {
            alert('An Error Occured! Try Again.');
            window.location.replace("{{ url('marketplace') }}");

        }
    }).render('#paypal-button-container');
}

//End Paypal
$(document).on("submit", "form.make_ajax_submit", function (event) {
    event.preventDefault();
    var form = $(this).serialize();

    var btn = $(this).find("button[type=submit]");
    var btntxt = $(btn).html();
    res = validateForm("form.make_ajax_submit");
    if (res.flag == false) {
        res.dom.focus().scrollTop();
        return false;
    }
    addWait(btn, "working...");

    $.ajax({
        type: $(this).attr("method"),
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        url: $(this).attr("action"),
        data: new FormData(this),
        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
        success: function (res) {
            console.log(res)
            order_id = res.order_id
            removeWait(btn, btntxt);
            $('.checkout_form').html('');
            accept_payment();


// afterAajaxCall('success',res);
return false;
},
error: function (err) {
    console.log(err.responseJSON);
    toastr["error"](err.responseJSON.message, "Alert!");
    removeWait(btn, btntxt);
    return false;
},
});
    return false;
});
</script>
@endsection
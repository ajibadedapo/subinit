@extends('main')
@section('content')
    <div class="my_account">
        <section  class="box" style="padding: 10px;" id="subscription-form">
            <!-- Vendor libraries -->
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <h4><strong>How To Register For Payment</strong></h4>
                        <div class="alert alert-warning fade in" style="margin-bottom: 5px;">
                            <p>1. Signup for a Stripe Account <a href="https://stripe.com">Stripe.com</a> to register for your payment options.</p>
                            <p>2.. Activate your account then switch to Live mode.</p>
                            <p>3. Navigate to <a href="https://dashboard.stripe.com/live/plans">Plans</a> to create a plan with the <strong>Name</strong> &<strong>Id</strong> set as "palplan", nd choose your price.</p>
                            <p>4. Navigate to <a href="https://dashboard.stripe.com/account/apikeys">API</a> and copy your <strong>Live Secret Key</strong> and <strong>Live Publishable Key</strong> then paste it in the form on this page respectively.</p>
                            <p>5. Submit the form</p>
                            Then, you can manage Income on <a href="https://stripe.com">Stripe.com</a>
                        </div>
                     </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-heading display-table" >
                                <div class="row display-tr" >
                                    <h3 class="panel-title display-td" >Stripe Details</h3>
                                    <div class="display-td" >
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form role="form" id="payment-form" method="POST" action="{{url('/registerforpayment')}}">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label for="cardNumber">Plan Price</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
                                                    <input class="form-control js-widget" id="costvalue" type="text" name="price" value="{{Auth::user()->price}}" data-target="subscription-cost"></div><div class="cost_submit form-group">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label for="cardNumber">Live Secret Key</label>
                                                <div class="input-group">
                                                    <input
                                                            type="text"
                                                            class="form-control"
                                                            name="lsk"
                                                            placeholder="Live Secret Key"

                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label for="cardNumber">Live Publishable Key</label>
                                                <div class="input-group">
                                                    <input
                                                            type="text"
                                                            class="form-control"
                                                            name="lpk"
                                                            placeholder="Live Publishable Key"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="subscribe btn btn-success btn-lg btn-block" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <style>
        /* CSS for Credit Card Payment form */
        .credit-card-box .panel-title {
            display: inline;
            font-weight: bold;
        }
        .credit-card-box .form-control.error {
            border-color: red;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
        }
        .credit-card-box label.error {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }
        .credit-card-box .payment-errors {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }
        .credit-card-box label {
            display: block;
        }
        /* The old "center div vertically" hack */
        .credit-card-box .display-table {
            display: table;
        }
        .credit-card-box .display-tr {
            display: table-row;
        }
        .credit-card-box .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 50%;
        }
        /* Just looks nicer */
        .credit-card-box .panel-heading img {
            min-width: 180px;
        }
    .box {
    display: block;
    position: relative;
    border-radius: 10px;
    margin: 0px auto;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(215, 215, 215);
    border-image: initial;
    background: rgb(255, 255, 255);
    overflow: hidden;
    }
    .my_account #sidebar .header {
        font-size: 13px;
        border-bottom: 1px solid rgb(215, 215, 215);
        margin: 0px;
        padding: 15px;
    }
    .my_account section#profile_content, .my_account .content {
        float: left;
        width: 100%;
        min-height: 90px;
    }
</style>
@endsection

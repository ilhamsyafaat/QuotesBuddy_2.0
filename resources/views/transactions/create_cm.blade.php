<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/asset/css/tailwindcss-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('/asset/css/transactions.css') }}">
    <title>Payment Page</title>
</head>
<body>
    
    <!-- start: Payment -->
    <section class="payment-section">
        <div class="container">
            <div class="payment-wrapper">
                <div class="payment-left">
                    <div class="payment-header">
                        <div class="payment-header-icon"><i class="ri-flashlight-fill"></i></div>
                        <div class="payment-header-title">Order Summary</div>
                        <p class="payment-header-description">QuotesBuddy2.0 is the comprehensive collection of animated quote design templates to take your social media presence to the next level. The Quotes belong to several Motivational Category which will be liked and shared all over the social networking platforms</p>
                    </div>
                    <div class="payment-content">
                        <div class="payment-body">
                            <div class="payment-plan">
                                <div class="payment-plan-type">CM</div>
                                <div class="payment-plan-info">
                                    <div class="payment-plan-info-name">Commercial License</div>
                                    <div class="payment-plan-info-price">Normal Price <s>$37</s></div>
                                </div>
                                <a href="" class="payment-plan-change">Change</a>
                            </div>
                            <div class="payment-summary">
                                <div class="payment-summary-item">
                                    <div class="payment-summary-name"><s>Regular Price</s></div>
                                    <div class="payment-summary-price"><s>$27</s></div>
                                </div>
                                <div class="payment-summary-item">
                                    <div class="payment-summary-name">Discount 50%</div>
                                    <div class="payment-summary-price">$19</div>
                                </div>
                                <div class="payment-summary-divider"></div>
                                <div class="payment-summary-item payment-summary-total">
                                    <div class="payment-summary-name">Total</div>
                                    <div class="payment-summary-price">$19</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment-right">
                    <form action="{{ route('transactions.store_cm') }}" method="POST" class="payment-form">
                        @csrf
                        <h1 class="payment-title">Payment Details</h1>
                        <div class="payment-method">
                            <input type="radio" name="payment_method" id="method-1" value="visa" checked>
                            <label for="method-1" class="payment-method-item">
                                <img src="{{ asset('/asset/img_transaksi/visa.png') }}" alt="">
                            </label>
                            <input type="radio" name="payment_method" id="method-2" value="mastercard">
                            <label for="method-2" class="payment-method-item">
                                <img src="{{ asset('/asset/img_transaksi/mastercard.png') }}" alt="">
                            </label>
                            <input type="radio" name="payment_method" id="method-3" value="paypal">
                            <label for="method-3" class="payment-method-item">
                                <img src="{{ asset('/asset/img_transaksi/paypal.png') }}" alt="">
                            </label>
                            <input type="radio" name="payment_method" id="method-4" value="stripe">
                            <label for="method-4" class="payment-method-item">
                                <img src="{{ asset('/asset/img_transaksi/stripe.png') }}" alt="">
                            </label>
                        </div>
                        <div class="payment-form-group">
                            <input type="email" name="email" placeholder=" " class="payment-form-control" id="email">
                            <label for="email" class="payment-form-label payment-form-label-required">Email Address</label>
                        </div>
                        <div class="payment-form-group">
                            <input type="text" name="card_number" placeholder=" " class="payment-form-control" id="card-number">
                            <label for="card-number" class="payment-form-label payment-form-label-required">Card Number</label>
                        </div>
                        <div class="payment-form-group-flex">
                            <div class="payment-form-group">
                                <input type="date" name="expiry_date" placeholder=" " class="payment-form-control" id="expiry-date">
                                <label for="expiry-date" class="payment-form-label payment-form-label-required">Expiry Date</label>
                            </div>
                            <div class="payment-form-group">
                                <input type="text" name="cvv" placeholder=" " class="payment-form-control" id="cvv">
                                <label for="cvv" class="payment-form-label payment-form-label-required">CVV</label>
                            </div>
                        </div>
                        <button type="submit" class="payment-form-submit-button"><i class="ri-wallet-line"></i> Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Payment -->

</body>
</html>

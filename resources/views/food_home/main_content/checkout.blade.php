<!DOCTYPE html>
<html lang="en">

@include('food_home.layouts.head')
<link rel="stylesheet" href="{{ asset('checkoutcss/style.css') }}">
<style>

</style>

<body>
    @php
        $amount = 0;
        $taxRate = 0.1;
        $delivery_charges = 0;
        $total_payble_Amount = 0;
        foreach ($food_item as $item) {
            $amount += floatval($item->price);
        }
        $totalPriceWithTax = $amount * (1 + $taxRate);
        $tax_value = $totalPriceWithTax - $amount;
        $delivery_charges = $amount * 0.3;
        $total_payble_Amount = $amount + $tax_value + $delivery_charges;

    @endphp
    @include('food_home.layouts.header')
    <!-- ======= checkout Section ======= -->
    <section id="checkout" class="checkout section-bg" style="padding-top: 110px;">
        <div class="container" data-aos="fade-up">
            <div class="card text-center">
                <div class="card-header">
                </div>
                <div class="card-body" id="card-body">
                    <div id="itemszz">
                        @foreach ($food_item as $item)
                            <div class="product-container" id="product-container"
                                style="display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <p class="product-name" style="margin: 0;font-weight: bold;">{{ $item->name }}</p>
                                    <p class="product-detail item-prices" style="margin: 0; text-align:left;">
                                        ${{ $item->price }}
                                    </p>
                                    <p class="product-detail" style="margin: 0; text-align:left;">Detail 2</p>
                                    <p href="#" class="product-detail"
                                        style="margin: 0; text-align:left;cursor:pointer;" data-toggle="modal"
                                        data-target="#editModal2">Edit <span style="color: red;">*</span></p>
                                </div>
                                <div>
                                    <div class="quantity-input">
                                        <button class="quantity-btn decrement">-</button>
                                        <div class="quantity-value">1</div>
                                        <button class="quantity-btn increment">+</button>
                                    </div>
                                    <p class="additional-value" style="text-align: right; margin-right: 26px;">$
                                        {{ $item->price }}</p>
                                </div>
                            </div>
                            <div class="{{ $loop->last ? '' : 'dropdown-divider' }}"></div>
                        @endforeach
                    </div>
                    <div style="float: left; padding-top:3%;">
                        <button type="button" class="btn btn-outline-secondary" data-toggle="modal"
                            data-target="#myModal2"><i class="fa fa-cutlery"></i>&nbsp; Add Cooking
                            Instructions</button>
                    </div>
                </div>
            </div>
            <div class="card text-center">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div style="display: flex; align-items: center; justify-content: space-between; cursor:pointer;"
                        data-toggle="modal" data-target="#coupons">
                        <p class="card-title">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-certificate fa-stack-2x"></i>
                                <i class="fa fa-tag fa-stack-1x fa-inverse"></i>
                            </span>
                        </p>
                        <p class="coupon_isinactive" style="margin: 0; padding-right: 83%;"> View all coupons </p>
                        <p class="coupon_is_active d-none" style="margin: 0; padding-right: 83%;"> Coupon Applied </p>
                        <p style="margin: 0; cursor:pointer;">></p>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <p class="card-title">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x" style="color: #01cb29;"></i>
                                <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                            </span>
                        </p>
                        <p style="margin: 0; padding-right: 79%;"> FLAT 50% OFF applied </p>
                    </div>
                </div>
            </div>
            <div class="card text-center">
                <div class="card-header">
                </div>

                <div class="card-body">
                    <div
                        class="modal-body"style="max-height: 400px; margin: 0; margin: 0; display:flex;justify-content: space-between; overflow-y: auto;">
                        <div>
                            <p style="margin: 0;">Item Price</p>
                            <p class="d-none applied_coupon"
                                style="margin: 0;font-size:10px; cursor: pointer; color:red;" onclick="remove_coupon()">
                                Remove Coupon</p>
                        </div>
                        <div>
                            <p style="color: red;cursor:pointer;margin: 0;" id="item_price" class="">$</p>
                            <p style="color: green;cursor:pointer;margin: 0;" class="d-none coupon_class"
                                id="coupon_price">$</p>
                        </div>
                    </div>
                    <div
                        class="modal-body"style="max-height: 400px; margin: 0; display:flex;justify-content: space-between; overflow-y: auto;">
                        <div>
                            <p style="margin: 0; cursor:pointer;">Taxes
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-html="true"
                                    title="10% of Item Price"></i>
                            </p>
                        </div>
                        <p style="color: red;cursor:pointer;" id="tax_rate">$</p>
                    </div>
                    <div
                        class="modal-body"style="max-height: 400px; margin: 0; display:flex;justify-content: space-between; overflow-y: auto;">
                        <div>
                            <p style="margin: 0;">Delivery Charges</p>
                        </div>
                        <p style="color: red;cursor:pointer;" id="delivery_charges">${{ $delivery_charges }}</p>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div
                        class="modal-body"style="max-height: 400px; margin: 0; display:flex;justify-content: space-between; overflow-y: auto;">
                        <div>
                            <p style="margin: 0;">Total Payble Amount</p>
                        </div>
                        <p style="color: red;cursor:pointer;" id="total_payble_Amount">${{ $total_payble_Amount }}</p>
                    </div>
                </div>
            </div>

            {{--  --}}

            <div class="card text-center">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="container-xl">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>You <b>May</b> <b>Also</b> <b>Like</b></h2>
                                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">

                                    <!-- Carousel indicators -->
                                    <?php $totalProducts = count($similar_products); ?>
                                    <ol class="carousel-indicators">
                                        @for ($i = 0; $i < ceil($totalProducts / 4); $i++)
                                            <li data-target="#myCarousel" data-slide-to="{{ $i }}"
                                                {{ $i == 0 ? 'class="active"' : '' }}></li>
                                        @endfor
                                    </ol>
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner">

                                        <?php
                                        $counter = 0;
                                        $totalProducts = count($similar_products);
                                        do {
                                            $activeClass = ($counter == 0) ? 'active' : '';
                                        ?>

                                        <div class="item carousel-item {{ $activeClass }}">
                                            <div class="row">
                                                @for ($i = $counter; $i < min($counter + 4, $totalProducts); $i++)
                                                    <div class="col-sm-3">
                                                        <div class="thumb-wrapper">
                                                            <span class="wish-icon"><i
                                                                    class="fa fa-heart-o"></i></span>
                                                            <div class="img-box">
                                                                <img src="{{ $similar_products[$i]['image'] }}"
                                                                    class="img-fluid"
                                                                    alt="{{ $similar_products[$i]['name'] }}">
                                                            </div>
                                                            <div class="thumb-content">
                                                                <h4>{{ $similar_products[$i]['name'] }}</h4>
                                                                <p class="item-price">
                                                                    ${{ number_format($similar_products[$i]['price'], 2) }}
                                                                </p>
                                                                <p>Ingredients:
                                                                    {{ $similar_products[$i]['ingrediants'] }}</p>
                                                                <a href="#" class="btn btn-primary"
                                                                    onclick="add_to_cart({{ $similar_products[$i]['id'] }})">Add
                                                                    to
                                                                    Cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>

                                        <?php
                                            $counter += 4;
                                        } while ($counter < $totalProducts);
                                        ?>
                                    </div>
                                    <!-- Carousel controls -->
                                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===============End checkout Section================ -->
    <div class="sticky text-center" style="cursor: pointer;">
        <form action="{{ route('pay') }}" method="post">
            @csrf
            <input type="hidden" name="amount" id="additional-value-to-pay" class="additional-value-to-pay">
            <button type="submit" style="border: none; padding: 0; background: none;"><img
                    src="{{ asset('images/paypal.png') }}" style="max-width: 12%;" alt=""></button>
        </form>
    </div>
    @include('food_home.layouts.footer')

    <div class="modal fade animate" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content animate-bottom">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> Cooking Instructions For Restourant </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body"style="max-height: 400px; overflow-y: auto;">
                    <textarea name="instructions" id="instructions" cols="48" rows="10"
                        placeholder="Do you want to add cooking instructions?"></textarea><br>
                    <div id="count">
                        <span id="current_count">0</span>
                        <span id="maximum_count">/ 300</span>
                    </div>
                    <textarea name="disabled" id="disabled" cols="48" rows="10"
                        placeholder="The restourant will try their best to follow up your instructions.However,no cancellation or refund will be possible if your request is not met. Please note - instructions once added can't be removed or replaced."disabled></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Model --}}
    <div class="modal fade animate" id="editModal2" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content animate-bottom">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="position: absolute; right:256px; top:4px;">x</button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Coupons Model --}}
    <div class="modal fade animate" id="coupons" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content animate-bottom">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                @foreach ($coupons as $coupon)
                    <div
                        class="modal-body"style="max-height: 400px; display:flex;justify-content: space-between; overflow-y: auto;">
                        <div>
                            <p style="margin: 0;">{{ $coupon->coupon_discription }}</p>
                            <p style="margin: 0;">The Minumum Cart Value Should Be Above Or Equal To <br>
                                $ &nbsp;{{ $coupon->cart_value }} To Avail This Coupon </p>
                            <div>
                                <p class="p-border" style="border: 1px solid #afa2a2;background-color: #d9e3e3;">
                                    {{ $coupon->coupon_code }}</p>
                            </div>
                        </div>
                        <a style="color: red;cursor:pointer;" onclick="apply_coupon({{ $coupon->id }})">Apply</a>
                    </div>
                    <div class="{{ $loop->last ? '' : 'dropdown-divider' }}"></div>
                @endforeach
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="close"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    @include('food_home.layouts.scripts')
    <script>
        var grandTotal = 0;
        var taxRate = 0.1;
        var delivery_charges = 0;
        var total_payble_Amount = 0;

        function updateGrandTotalInput() {
            var totalPriceWithTax = grandTotal * (1 + taxRate);
            var tax_value = totalPriceWithTax - grandTotal;
            delivery_charges = grandTotal * 0.3;
            total_payble_Amount = grandTotal + tax_value + delivery_charges;
            $('#item_price').text('$ ' + grandTotal.toFixed(2));
            $('#tax_rate').text('$ ' + tax_value.toFixed(2));
            $('#delivery_charges').text('$ ' + delivery_charges.toFixed(2));
            $('#total_payble_Amount').text('$ ' + total_payble_Amount.toFixed(2));
            $('#additional-value-to-pay').val(total_payble_Amount.toFixed(2));
        }
        $(document).ready(function() {

            $('.quantity-input').each(function() {
                var container = $(this).closest('.product-container');
                var quantityElement = container.find('.quantity-value');
                var additionalValueElement = container.find('.additional-value');
                var itemPrice = parseFloat(container.find('.product-detail:first').text().replace('$', ''));
                var quantity = 1;

                container.find('.increment').click(function() {
                    quantity++;
                    quantityElement.text(quantity);
                    updateTotalPrice();
                    checkAndRemoveCoupon();
                });

                container.find('.decrement').click(function() {
                    if (quantity > 1) {
                        quantity--;
                        quantityElement.text(quantity);
                        updateTotalPrice();
                        checkAndRemoveCoupon();
                    }
                });

                function checkAndRemoveCoupon() {
                    if ($('.coupon_isinactive').hasClass('d-none')) {
                        remove_coupon();
                    }
                }

                function updateTotalPrice() {
                    var totalPrice = quantity * itemPrice;
                    grandTotal = calculateGrandTotal();
                    additionalValueElement.text('$ ' + totalPrice.toFixed(2));
                    updateGrandTotalInput();
                }

                function calculateGrandTotal() {
                    var total = 0;
                    $('.quantity-input').each(function() {
                        var container = $(this).closest('.product-container');
                        var itemPrice = parseFloat(container.find('.product-detail:first')
                            .text()
                            .replace('$', ''));
                        var quantity = parseInt(container.find('.quantity-value').text());
                        total += quantity * itemPrice;
                    });
                    return total;
                }
                updateTotalPrice();
            });
        });

        function apply_coupon(id) {

            var item_price = $('#item_price').text().replace('$', '');
            var tax_rate = $('#tax_rate').text().replace('$', '');
            var delivery_charges = $('#delivery_charges').text().replace('$', '');
            var total_payble_amount = $('#total_payble_Amount').text().replace('$', '');
            $.ajax({
                url: "{{ route('get_Coupons') }}",
                type: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.coupon_type == "percent") {
                        var couponValue = parseFloat(response.coupon_value);
                        var itemPrice = parseFloat(item_price);
                        grandTotal = (couponValue / 100) * itemPrice;
                        var discounted_price = item_price - grandTotal.toFixed(2);
                        var discounted_tax_rate = discounted_price * taxRate;
                        var discounted_delivery_charges = discounted_price * 0.3;
                        var discounted_total_payble_amount = discounted_price + discounted_tax_rate +
                            discounted_delivery_charges;

                        var tax_rate = $('#tax_rate').text('');
                        var delivery_charges = $('#delivery_charges').text('');
                        var total_payble_amount = $('#total_payble_Amount').text('');
                        var amount_to_pay = $('#additional-value-to-pay').val('');


                        $('#coupon_price').text('$ ' + discounted_price.toFixed(2));
                        $('#tax_rate').text('$ ' + discounted_tax_rate.toFixed(2));
                        $('#delivery_charges').text('$ ' + discounted_delivery_charges.toFixed(2));
                        $('#total_payble_Amount').text('$ ' + discounted_total_payble_amount.toFixed(
                            2));


                        $('#additional-value-to-pay').val(discounted_total_payble_amount.toFixed(2));
                        $('.applied_coupon').removeClass('d-none');
                        $('.coupon_class').removeClass('d-none');
                        $('.coupon_is_active').removeClass('d-none');
                        $('.coupon_isinactive').addClass('d-none');
                        $('#item_price').addClass('text-decoration-line-through');
                        $("#close").click();


                    } else {
                        alert('ok');
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        $('textarea').keyup(function() {
            var characterCount = $(this).val().length,
                current_count = $('#current_count'),
                maximum_count = $('#maximum_count'),
                count = $('#count');
            current_count.text(characterCount);
        });


        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $(document).ready(function() {
            $(".wish-icon i").click(function() {
                $(this).toggleClass("fa-heart fa-heart-o");
            });
        });

        function add_to_cart(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('add_to_cart') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id,
                },
                success: function(response) {
                    if (response.success) {
                        alert('Item added to cart successfully!');
                        location.reload(true);
                    } else {
                        alert('Error adding item to cart!');
                    }
                },
                error: function() {

                    alert('Error in AJAX request!');
                }
            });
        }

        function remove_coupon() {
            $('#tax_rate').text('');
            $('#delivery_charges').text('');
            $('#total_payble_Amount').text('');
            $('#additional-value-to-pay').val('');
            var item_price = $('#item_price').text().replace('$', '');
            $('.applied_coupon').addClass('d-none');
            $('.coupon_class').addClass('d-none');
            $('#item_price').removeClass('text-decoration-line-through');
            $('.coupon_is_active').addClass('d-none');
            $('.coupon_isinactive').removeClass('d-none');
            var tax_rate = item_price * taxRate;
            var delivery_charges = item_price * 0.3;
            var total_payble_amount = parseFloat(item_price) + parseFloat(tax_rate) + parseFloat(delivery_charges);
            $('#tax_rate').text('$ ' + tax_rate.toFixed(2));
            $('#delivery_charges').text('$ ' + delivery_charges.toFixed(2));
            $('#total_payble_Amount').text('$ ' + total_payble_amount.toFixed(2));
            $('#additional-value-to-pay').val(total_payble_amount.toFixed(2));

        }
    </script>
</body>

</html>

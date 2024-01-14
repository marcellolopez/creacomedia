@extends('layouts.app')

@section('content')

    <section class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Carrito de compras</a></li>
                        </ol>
                    </nav>
                    <h1 class="page-title">Carrito de compras</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="cart-list-area">
        <div class="container">
            @if($carts->count() > 0)
                <div class="row" id="cart_items_details">
                    <div class="col-lg-9">

                        <div class="in-cart-box">
                            <div class="title">{{ Cart::getTotal() }} cursos en el carrito</div>
                            <div class="">
                                <ul class="cart-course-list">
                                    @foreach ($carts as $cart)
                                        <li>
                                            <div class="cart-course-wrapper">
                                                <div class="image">
                                                    <a href="{{ route('course_detail', $cart->id) }}">
                                                        <img src="{{ asset('images/learning.jpg') }}" alt=""
                                                             class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="details">
                                                    <a href="">
                                                        <div class="name">{{ $cart->name }}</div>
                                                    </a>
                                                </div>
                                                <div class="move-remove">
                                                    <div>
                                                        <form action="{{ route('cart.remove', $cart->id) }}"
                                                              method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{ $cart->id }}">
                                                            <input type="submit" class="btn-success" value="Eliminar">
                                                        </form>
                                                    </div>
                                                    <!-- <div>Mover a la lista de deseos</div> -->
                                                </div>
                                                <div class="price">
                                                    <a href="">
                                                        <div class="current-price">
                                                            {{ $cart->price }}
                                                        </div>
                                                        <span class="coupon-tag">
                                                        <i class="fas fa-tag"></i>
                                                    </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <div class="cart-sidebar">
                            <div class="total">Total:</div>
                            <div class="total-price">
                                $<span id="total_price_of_checking_out">{{ Cart::getTotal() }}</span>
                            </div>
                            <button type="button" class="btn btn-primary btn-block checkout-btn"
                                    onclick="handleCheckOut()">Pagar
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <div class="title">El carrito está vacío</div>
            @endif
        </div>
    </section>

    <script>
        function handleCheckOut() {
            $.ajax({
                url: '/auth/check',
                success: function (res) {
                    console.log(res);
                    if (!res.success) {
                        $('#signInModal').modal('show');
                    } else {
                        $('#paymentModal').modal('show');
                        $('.total_price_of_checking_out').val($('#total_price_of_checking_out').text());
                    }
                }
            });
        }
    </script>

@endsection

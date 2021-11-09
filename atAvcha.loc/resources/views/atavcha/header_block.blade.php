<div class="header_block">
    <div class="inner">
        <div class="logo_wrapper">
            <a href="{{route('index.index')}}" class="logo"><h1>У Авчи</h1></a>
        </div>
        <div class="slogan">Интернет-магазин горшечных изделий с доставкой по Росcии</div>

        <div class="favorites">
            <a href="/favorites/">Избранное</a>
        </div>
        <div class="orders">
            <a href="/login/">Мои заказы</a>
        </div>
        <div class="basket">
            <a href="/basket/">
                Корзина(
                         <span class="total_quantity">
                            {{-- \Cart::session($_COOKIE['cart_id'])->getTotalQuantity()  --}}

                         </span>
                        )
            </a>
        </div>
    </div>
</div>

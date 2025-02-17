@section('content_h')
<nav class="navbar navbar-expand-custom navbar-mainbg">
    <a class="navbar-brand navbar-logo" style="padding-left: 10%">enterego test</a>
    <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
            <li class="nav-item abc228_index">
                <a class="nav-link" href={{ route('welcome')  }}><i class="fa-solid fa-shop"></i>Главная</a>
            </li>
            <li class="nav-item abc228_storage">
                <a class="nav-link" href={{ route('storage.index')  }}><i class="fa-solid fa-cart-shopping"></i><b id="card-amount"></b> Корзина</a>
            </li>
        </ul>
    </div>
</nav>
@endsection
@section('scripts')
    <script>
        // ---------Responsive-navbar-active-animation-----------
        function test(){
            let a = 'abc228_index';
            if (window.location.pathname==='/')
            {
                a='abc228_index'
                $('li[class*="abc228_index"]').removeClass('abc228_index').addClass('active');

            }
            if (window.location.pathname==='/storage')
            {
                a='abc228_storage'
                $('li[class*="abc228_storage"]').removeClass('abc228_storage').addClass('active');
            }
            if (window.location.pathname!=='/storage'&&window.location.pathname!=='/')
            {
                $('li[class*="abc228_index"]').removeClass('abc228_index').addClass('active');
            }
            var tabsNewAnim = $('#navbarSupportedContent');
            var activeItemNewAnim = tabsNewAnim.find('.active');
            var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
            var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
            var itemPosNewAnimTop = activeItemNewAnim.position();
            var itemPosNewAnimLeft = activeItemNewAnim.position();
            $(".hori-selector").css({
                "top":itemPosNewAnimTop.top + "px",
                "left":itemPosNewAnimLeft.left + "px",
                "height": activeWidthNewAnimHeight + "px",
                "width": activeWidthNewAnimWidth + "px"
            });
        }
        $(document).ready(function(){
            setTimeout(function(){ test(); });
        });
        $(window).on('resize', function(){
            setTimeout(function(){ test(); }, 500);
        });
        $(".navbar-toggler").click(function(){
            $(".navbar-collapse").slideToggle(300);
            setTimeout(function(){ test(); });
        });

        let count=0
        let card=  JSON.parse(sessionStorage.getItem('products'))
        Object.values(card).forEach(item=>{
            count += item.quantity
        })
        let cardAmountElement = document.getElementById('card-amount');
        if (count !== 0) {
            cardAmountElement.innerText = count;
        } else {
            cardAmountElement.innerText = 0;
        }
        document.addEventListener('DOMContentLoaded', () => {
            const products = sessionStorage.getItem('products');
            const cartIcon = document.querySelector('.fa-cart-shopping');
            if (products) {
                cartIcon.classList.add('fa-beat-fade');
            } else {
                console.log(123)
                cartIcon.classList.remove('fa-beat-fade');
            }
        });

    </script>
@endsection

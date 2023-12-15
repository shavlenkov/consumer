<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ml-stack-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ml-stack-nav-theme.css') }}">
</head>
<body name="#start" id="top" class="js">
<!-- Top Navbar -->
@include('partials.header')
<main class="">
    @yield('content')
</main>
@include('partials.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="{{ asset('js/slick.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"--}}
{{--        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"--}}
{{--        crossorigin="anonymous">--}}
</script>

<script src="{{ asset('js/ml-stack-nav.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        jQuery(".home-slider").slick({
            dots: false,
            infinite: false,
            variableWidth: false,
            centerMode: false,
            adaptiveHeight: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true
        });
        jQuery(".links-slider").slick({
            dots: false,
            infinite: false,
            variableWidth: false,
            centerMode: false,
            adaptiveHeight: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            centerPadding: '40px',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        arrows: true,
                        centerMode: false,
                        centerPadding: '30px',
                        slidesToShow: 3
                    }
                },                {
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        centerMode: false,
                        centerPadding: '30px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: false,
                        centerPadding: '30px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    });

</script>
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"--}}
{{--        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"--}}
{{--        crossorigin="anonymous">--}}
{{--</script>--}}

<script src="{{ asset('js/app.js') }}"></script>
<script>
    function changeLanguage(locale) {
        var currentUrl = window.location.href;
        var baseUrl = "{{ url('/') }}";

        // Визначаємо частину урл, що слід змінити (після домену)
        var path = currentUrl.replace(baseUrl, '');

        // Видаляємо першу локаль з урл
        path = path.replace(/^\/[a-z]{2}/, '');

        // Змінюємо мову та формуємо новий урл
        var newUrl = baseUrl + '/' + locale + path;

        // Переходимо за новим урл без перезавантаження сторінки
        window.location.href = newUrl;
    }

</script>
<script>
    $(document).ready(function () {
        $('.open-sitemap').on('click', function() {
            var $collapseSiteMap = $('#collapseSiteMap');

            if ($collapseSiteMap.css('display') === 'none') {
                $collapseSiteMap.css({
                    display: 'grid',
                    opacity: 0
                }).animate({
                    opacity: 1
                }, 500);
            } else {
                $collapseSiteMap.animate({
                    opacity: 0
                }, 500, function() {
                    $(this).css('display', 'none');
                });
            }
        });
        $('.navbar-toggler').click(function (e) {
            e.preventDefault();
            if (!$(this).hasClass('collapsed')) {
                $(this).addClass('collapsed');
            } else {
                $(this).removeClass('collapse');
            }
            $('.navbar-collapse').toggleClass('show');
        });
    });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PANEL ADMIN') }}</title>
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jsCalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="{{ asset('js/navbar/responsive-nav.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">

    @yield('styles')
    <style>
        header {
            background: #fff;
            position: fixed;
            z-index: 3;
            width: 100%;
            left: 0;
            top: 0;

        }

        .hidden-textarea {
            position: absolute;
            top: -9999px;
            left: -9999px;
            width: 1px;
            height: 1px;
            opacity: 0;
        }

        .navbar-toggler.opened:before {
            font-size: 32px;
            line-height: 38px;
            content: "\78"; /* Close icon */
        }

        nav ul > li a {
            height: auto;
        }

        #parkingTable > tfoot {
            display: none;
        }
    </style>

</head>
<body class="hold-transition sidebar-collapse js">
<div class="wrapper">

    <!-- Navbar -->
    <header class="main-header navbar">
        <a href="/admin" class="brand-link logo">
            <img src="{{ asset('images/parking-logo.png') }}"
                 alt="Parking Rondo Logo"
                 class="brand-image"
                 style="opacity: 1">
        </a>
        <button class="navbar-toggler position-relative collapsed" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent"
                aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <nav class="navbar-collapse justify-content-end collapse" id="navbarContent" aria-expanded="false" style="">
            <ul class="navbar-nav">
                <li class="menu-item"><a class="nav-link scroll-to" href="#orders-table" data-scroll>Zamowienia</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#calendar" data-scroll>Kalendarz</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#about-us" data-scroll>O Nas</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#prices" data-scroll>Cennik</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#info" data-scroll>Info</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#reviews" data-scroll>Opinia</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#contacts" data-scroll>Kontakt</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#titles" data-scroll>Sekcja nagłówków</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#services" data-scroll>Zalety</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#text-content" data-scroll>Bloki tekstowe</a></li>
                <li class="nav-item dropdown ml-auto">
                    <a class="nav-link user-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        {{ Auth::user()->name }}
                        <svg class="" width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.3538 6.85378L8.35378 11.8538C8.30735 11.9003 8.2522 11.9372 8.1915 11.9623C8.13081 11.9875 8.06574 12.0004 8.00003 12.0004C7.93433 12.0004 7.86926 11.9875 7
                            .80856 11.9623C7.74786 11.9372 7.69272 11.9003 7.64628 11.8538L2.64628 6.85378C2.55246 6.75996 2.49976 6.63272 2.49976 6.50003C2.49976 6.36735 2.55246 6.2401 2.64628 6
                            .14628C2.7401 6.05246 2.86735 5.99976 3.00003 5.99976C3.13272 5.99976 3.25996 6.05246 3.35378 6.14628L8.00003 10.7932L12.6463 6.14628C12.6927 6.09983 12.7479 6.06298 12
                            .8086 6.03784C12.8693 6.0127 12.9343 5.99976 13 5.99976C13.0657 5.99976 13.1308 6.0127 13.1915 6.03784C13.2522 6.06298 13.3073 6.09983 13.3538 6.14628C13.4002 6.19274 13.4371 6.24789 13.4622 6.30859C13.4874 6.36928 13.5003 6.43434 13.5003 6.50003C13.5003 6.56573 13.4874 6.63079 13.4622 6.69148C13.4371 6.75218 13.4002 6.80733 13.3538 6.85378Z"
                                  fill="#000"/>
                        </svg>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-menu" style="left: inherit; right: 0px;">
                        <a href="{{ route('profile.show') }}" class="dropdown-item">
                            <i class="mr-2 fas fa-file"></i>
                            {{ __('My profile') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="dropdown-item"
                               onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="mr-2 fas fa-sign-out-alt"></i>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- Right navbar links -->

    </header>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="{{ asset('images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
        {{--        <nav class="nav-collapse nav-collapse-0 closed" style="transition: max-height 284ms ease 0s;--}}
        {{--position: relative;" aria-hidden="true">--}}
        {{--            <ul>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#header-block" data-scroll>Start</a></li>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#aboutus" data-scroll>O Nas</a></li>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#prices" data-scroll>Cennik</a></li>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#gallery" data-scroll>Galeria</a></li>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#locations" data-scroll>Dojazrd</a></li>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#contacts-section" data-scroll>Kontakt</a></li>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#terms" data-scroll>Regulamin</a></li>--}}
        {{--            </ul>--}}
        {{--        </nav>--}}
        @include('layouts.navigation')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pl-2 pr-2 pl-md-5 pr-md-5">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/jsCalendar/jsCalendar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jsCalendar/jsCalendar.lang.pl.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ mix('js/ajaxscript.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>

@yield('scripts')
<!-- Passing BASE URL to AJAX -->
<input id="url" type="hidden" value="{{ \Request::url() }}">

<!-- MODAL SECTION -->
<!-- Head Block Modal-->
@include('partials.modal.head-modal')
@include('partials.modal.services-modal')

@include('partials.modal.about-us-modal')
<!-- Reviews Modal-->
@include('partials.modal.review-modal')
<!-- Contacts Modal-->
@include('partials.modal.contacts-modal')
<!-- Section title Modal-->
@include('partials.modal.section-title-modal')
@include('partials.modal.newsletter-modal')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
{{--<script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/navbar/fastclick.js') }}" async></script>--}}
{{--<script src="{{ asset('js/navbar/scroll.js') }}" async></script>--}}
{{--<script src="{{ asset('js/navbar/fixed-responsive-nav.js') }}" async></script>--}}
<script src="{{ asset('js/navbar/navbar-fixed.js') }}" async></script>
{{--<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>--}}
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
<script src="{{ asset('js/bootstrap-table-pl-PL.js') }}"></script>
<script src="{{ asset('js/paginathing.min.js') }}"></script>

{{--<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/extensions/export/bootstrap-table-export.min.js"></script>--}}
{{--<script src="https://www.google.com/recaptcha/api.js" async defer></script>--}}
<script>
    $(document).ready(function () {


        const headerTable = $('#headerTable');
        const toggleButton = $('#toggleRowsButton');

        // Initial state: Show only one row
        headerTable.find('tbody tr').not(':first').hide();

        toggleButton.on('click', function () {
            const hiddenRows = headerTable.find('tbody tr').not(':visible');

            if (hiddenRows.length > 0) {
                // Show all rows
                hiddenRows.show();
                toggleButton.text('Show Only One Row');
            } else {
                // Show only one row
                headerTable.find('tbody tr').not(':first').hide();
                toggleButton.text('Show All Rows');
            }
        });


        function dateSort(a, b) {
            var aDate = new Date(a);
            var bDate = new Date(b);
            return aDate - bDate;
        }

        $('#parkingTable').bootstrapTable({
            locale: 'pl-PL',
            toolbar: '.toolbar',
            pagination: false,      // Enable pagination
            pageSize: 25,    // Number of rows to display per page
            server: true
        });
        $('table#parkingTable tbody').paginathing({
            perPage: 20,
            limitPagination: 20,
            prevNext: true,
            firstLast: true,
            prevText: '&laquo;',
            nextText: '&raquo;',
            firstText: 'Pierwszy',
            lastText: 'Ostatni',
            activeClass: 'active',

        });
        $('.delete-btn').on('click', function () {
            var orderId = $(this).data('order-id');
            var order_id = $(this).val();

            $.ajax({
                url: '/admin/delete-order/' + order_id,
                type: 'DELETE',
                dataType: 'json',
                success: function (response) {
                    // Remove the deleted row from the table
                    $('#parkingTable').bootstrapTable('remove', {field: 'id', values: [order_id]});
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        });
        var todayDate = new Date().toISOString().slice(0, 10);
        $('#b1').click(function () {
            $('#parkingTable').bootstrapTable('filterBy', {
                arrivalh: [todayDate]
            });
        });
        $('#b2').click(function () {
            $('#parkingTable').bootstrapTable('filterBy', {
                departureh: [todayDate]
            });
        });
        $('#b3').click(function () {
            $('#parkingTable').bootstrapTable('filterBy', {
                createdh: [todayDate]
            });
        });

        function formatDate(date) {
            var year = date.getFullYear();
            var month = String(date.getMonth() + 1).padStart(2, '0');
            var day = String(date.getDate()).padStart(2, '0');
            return year + '-' + month + '-' + day;
        }

        $('#b4').click(function () {
            var todayDate = new Date(); // Current date
            var oneWeekAgo = new Date(todayDate);
            oneWeekAgo.setDate(todayDate.getDate() - 7); // Subtract 7 days

            var oneYearAgo = new Date(todayDate);
            oneYearAgo.setFullYear(todayDate.getFullYear() - 1); // Subtract 1 year

            var customStartDate = new Date(todayDate);
            customStartDate.setDate(todayDate.getDate() - 7); // Subtract 7 days
            customStartDate.setFullYear(todayDate.getFullYear() - 1); // Subtract 1 year

            var dateArray = [];
            var currentDate = new Date(customStartDate);
            // console.log(customStartDate);

            // Generate an array of dates starting from customStartDate up to oneWeekAgo
            while (currentDate <= oneWeekAgo) {
                dateArray.push(formatDate(currentDate));
                currentDate.setDate(currentDate.getDate() + 1);
            }
            // console.log(dateArray);
            $('#parkingTable').bootstrapTable('filterBy', {
                createdh: dateArray
            });
        });


        $('#sortByToday').on('click', function () {
            $('#parkingTable').bootstrapTable('filterBy', {
                arrival: [todayDate]
            });
        });
        $('#resetFilters').on('click', function () {
            $('#parkingTable').bootstrapTable('destroy');
            $('#parkingTable').bootstrapTable({
                toolbar: '#customToolbar'
            });
        });
        var $navbarToggler = $('.navbar-toggler');

        $navbarToggler.on('click', function (e) {
            $(this).toggleClass('active opened');
            $('.js .navbar-collapse, .navbar-collapse').toggleClass('open show');

        })
    });
</script>
<script>
    // Check if both checkbox and CAPTCHA are validated
    // function checkValidation() {
    //     var isCaptchaVerified = grecaptcha.getResponse().length !== 0;
    //     var isAgreeChecked = document.getElementById('agree').checked;
    //
    //     if (isCaptchaVerified && isAgreeChecked) {
    //         document.getElementById('subscribeButton').disabled = false;
    //     } else {
    //         document.getElementById('subscribeButton').disabled = true;
    //     }
    // }
    //
    // // Enable form submission on checkbox change
    // document.getElementById('agree').addEventListener('change', checkValidation);
    //
    // // Enable form submission on CAPTCHA verification
    // function captchaCallback() {
    //     checkValidation();
    // }

    // AJAX form submission
    $('#subscribeForm').submit(function (e) {
        e.preventDefault(); // Prevent default form submission

        var formData = $(this).serialize(); // Serialize form data
        var url = $(this).attr('action'); // Form action URL

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json', // Change to 'html' if the response is not JSON
            success: function (response) {
                // Handle the success response, e.g., show success message or close modal
                $('#subscribeModal').modal('hide');
                alert('You have subscribed successfully!');
            },
            error: function (error) {
                // Handle the error response, e.g., show error message
                alert('Failed to subscribe. Please try again later.');
            }
        });
    });
</script>
@if(isset($arrayData))
@endif
<script>
    jQuery(function ($) {
        var url = $('#url').val();

        var _reservationDates = <?php echo json_encode($arrayData); ?>;
        // Array(3) [ {…}, {…}, {…} ]
        // [ { new_date: "2023-08-24" }, { new_date: "2023-08-25" }, { new_date: "2023-08-26" } ]

        var reservationDates = _reservationDates
            .filter(dateStr => new Date(dateStr.new_date) >= new Date().setHours(0, 0, 0, 0) - 1)
            .sort((a, b) => new Date(a.new_date) - new Date(b.new_date));

        console.log('start: ', reservationDates)

        var mainCalendar = new CalendarIk({
            dates: reservationDates,
            calendarWrapperClass: '.calendar__main_calendar',
        });

        window.datesList = new DatesList({
            dates: reservationDates,
            mainCalendar: mainCalendar,
            dateListClass: 'calendar__date_list',
        });

        $(document).on('click', '.calendar__main_calendar .calendar_date ', function (event) {
            if (!$(event.target).hasClass('disabled')) {
                $('.calendar__add_date_btn').click();
                $('.calendar__add_date_list').children().last().find('input')//.focus()
                    .val($(event.target).attr('data-calendar-date'))
            }
        })

        $(document).on('click', '.calendar__add_date_item .calendar_date', function (event) {
            if (!$(event.target).hasClass('disabled')) {
                var $td = $(event.target);
                var date = $td.attr('data-calendar-date');
                var $parent = $td.closest('.calendar__add_date_item');
                var $input = $parent.find('input');
                $input.val(date)
                window.datesList.toggleClassList($td.closest('.calendar__add_date_select'));
            }
        })


        /*
         * SAVE DATES
         */
        $('.js_btn_submit').on('click', event => {
            event.preventDefault();

            const selectedDates = {}; // Initialize the selectedDates object

            $('.calendar__add_date_item').each((i, item) => {
                const input = $(item).find('input');
                const value = input.val();

                if (!value) return;

                const key = input.attr('name').substr(11); // Extract the key
                selectedDates[key] = value; // Add key-value pair to selectedDates object
            });

            // Perform a final AJAX request to send the entire selectedDates object
            $.ajax({
                type: 'POST',
                cache: false,
                url: url + '/store-all-dates', // Replace with the appropriate URL
                data: {dates: selectedDates, _token: $('meta[name="_token"]').attr('content')},
                success: function (response) {
                    console.log('save 2: ', response);
                    reloadDatesList();
                },
                error: function (info) {
                    console.log('Error storing all dates:', info);
                },
                beforeSend: function (a, b, c) {
                    $('.calendar__add_date_preloader').removeClass('hidden');
                },
                complete: function () {
                    $('.calendar__add_date_preloader').addClass('hidden');
                },
            });
        });


        /*
         * RELOAD DATES
         */
        function reloadDatesList() {
            $.ajax({
                type: 'GET',
                cache: false,
                url: url + '/get-updated-dates-list',
                success: function (response) {
                    if (response.success) {
                        console.log(response.message)

                        const reservationDates = response.data
                            .filter(d => new Date(d) >= new Date().setHours(0, 0, 0, 0) - 1)
                            .sort((a, b) => new Date(a) - new Date(b))
                            .map(d => ({new_date: d}))

                        console.log('reservationDates: ', reservationDates)
                        console.log('calendar: ', window.datesList)

                        window.datesList.mainCalendar.dates = reservationDates;
                        window.datesList.mainCalendar.calendar.refresh();

                        $('.calendar__date_list li').empty();
                        $('.calendar__add_date_list li').empty();

                        window.datesList.dates = reservationDates;
                        window.datesList.listDatesRender();
                    }
                },
                error: function (error) {
                    console.error(error);
                }
            });
        }


        /*
         * DELETE DATE
         */
        $(document).on('submit', '.delete-form', function (event) {
            event.preventDefault(); // Prevent default form submission behavior
            var blockedDate = $(this).find('input[name="blockedDate"]').val(); // Get the blocked date from the form

            $.ajax({
                type: 'DELETE',
                cache: false,
                url: url + '/delete-by-date',
                data: {
                    blockedDate: blockedDate,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    reloadDatesList();
                },
                error: function (error) {
                    console.error(error);
                },
                beforeSend: function (a, b, c) {
                    $('.calendar__add_date_preloader').removeClass('hidden');
                },
                complete: function () {
                    $('.calendar__add_date_preloader').addClass('hidden');
                },
            });
        });

    });
</script>


</body>
</html>

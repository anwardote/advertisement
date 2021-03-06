{{-- Layout base admin panel --}}
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

{!! HTML::style('packages/jacopo/laravel-authentication-acl/css/bootstrap.min.css') !!}
{!! HTML::style('css/fonts.css') !!}
{!! HTML::style('css/global.css') !!}
{!! HTML::style('css/modify.css') !!}
{!! HTML::style('packages/jacopo/laravel-authentication-acl/css/style.css') !!}
{!! HTML::style('packages/jacopo/laravel-authentication-acl/css/baselayout.css') !!}
{!! HTML::style('packages/jacopo/laravel-authentication-acl/css/fonts.css') !!}
{!! HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') !!}
{!! HTML::style('css/chosen.css') !!}
@yield('head_css')
{{-- End head css --}}

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->
</head>

<body>
{{-- navbar --}}
@include('laravel-authentication-acl::admin.layouts.navbar')

{{-- content --}}

<div class="container">
    @yield('container')
</div>

{{-- Start footer scripts --}}
@yield('before_footer_scripts')

{!! HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/jquery-1.10.2.min.js') !!}
{!! HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/bootstrap.min.js') !!}
{!! HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/custom-global.js') !!}
{!! HTML::script('js/script.js') !!}
{!! HTML::script('js/chosen.jquery.js') !!}

@yield('footer_scripts')
{{-- End footer scripts --}}
{{--Footer--}}
@include('laravel-authentication-acl::admin.layouts.footer')
<script>
    function sizeLeftMenuFiller() {
        var tmpOffset = jQuery("#navigation-container").offset();
        var newW = tmpOffset.left;
        jQuery("#navWrapLeftFiller").width(newW);
    }
    //            jQuery(document).ready(function () {
    //                jQuery(".gradTop").append('<div id="navWrapLeftFiller"></div>');
    //                sizeLeftMenuFiller();
    //                jQuery('#navWrap .sub-menu').hide();
    //                jQuery("#navWrap li:has(ul)").hover(function () {
    //                    jQuery(" ul", this).toggle('slow');
    //                });
    //            });

    $('ul.menu li').hover(function () {
        $(this).find('.dropdown-menunew').stop(true, true).delay(200).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menunew').stop(true, true).delay(200).fadeOut(500);
    });

    jQuery(window).resize(function (e) {
        if (window.outerWidth > 850) {
            sizeLeftMenuFiller();
        }
    });
</script>

<script>
    jQuery(document).ready(function ($) {
        $("#addtlLinks").click(function () {
            $(this).find('.user-menu').slideToggle('500');
            $("#addtlLinks > a").toggleClass("down");
        });

        $("#faqsWrap .question").click(function () {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active").next().slideUp();
            } else {
                $("#faqsWrap .question.active").removeClass("active").next().slideUp();
                $(this).addClass("active").next().slideDown();
            }
        });


        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }


        $(".searchboxForm .device-category").chosen().change(function (e, params) {
            var href = '';
            if (params.selected == 1) {
                href = ' {{ route('firmware.category') }}/android';
            } else if (params.selected == 2) {
                href = ' {{ route('firmware.category') }}/normal';
            } else if (params.selected == 3) {
                href = ' {{ route('driver.category') }}/driver';
            } else if (params.selected == 4) {
                href = '{{ route('tool.category') }}/all';
            } else if (params.selected == 5) {
                href = '{{ route('tutorial.category') }}/all';
            }
            window.location.href = href;
        });


    })
</script>
<?php
$current_route = \Request::route()->getName();
$authentication = \App::make('authenticator');
$user = trim($authentication->getLoggedUser());

if (!$user) {
?>
<script>
    $(document).ready(function () {
        var loginurl = '<a href="{!! URL::route('user.login') !!}">Login</a>'
        $("#addtlLinks").html(loginurl)
    })
</script>

<?php
}
?>
</body>
</html>


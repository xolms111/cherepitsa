<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <!-- Bootstrap -->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/xolms.css')}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="page" class="hfeed site"><!-- start page wrapper -->

    <!-- <div id="preloader"></div> -->

    @include('modules.nav')

    <!-- CAROUSEL SECTION -->
    @yield('content')

    @include('modules.footer')
    @include('elements.modal_callback')
    @if(Auth::user())
        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
            <div class="adminpanel" style="position: fixed; top: 30px; right: 300px; z-index: 10000; background-color: transparent;	">
                <a href="{{route('admin.index')}}" style="color: #f6c606">Войти в админ панель</a>
            </div>
        @endif
    @endif
</div><!-- end #page hfeed site -->
<script type="text/javascript">

    jQuery('.modal__close').click(function () {
        jQuery('.modal').fadeOut();
    });
    jQuery('.modal__click').click(function () {
        var link, title, placeholder, theme;
        link = jQuery(this).attr('data-link');
        title = jQuery(this).attr('data-title');
        placeholder = jQuery(this).attr('data-textarea');
        theme = jQuery(this).attr('data-theme');
        jQuery('.modal .form__title').text(title);
        jQuery('.modal form').attr('action', link);
        jQuery('.modal textarea').attr('placeholder', placeholder);
        jQuery('.modal .input__theme').val(theme);
        jQuery('.modal').fadeIn();

    });


</script>
@include('elements.ajax')

</body>
</html>


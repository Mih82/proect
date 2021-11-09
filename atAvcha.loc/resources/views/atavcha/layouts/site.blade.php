<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if gt IE 9]>
<html class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !IE]>
<html dir="ltr" lang="en-US">
<![endif]-->

<!-- START HEAD -->
<head>



    <meta charset="UTF-8" />
    <!-- this line will appear only if the website is visited with an iPad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

    <meta name="description" content="{{ (isset($meta_desc)) ? $meta_desc : ''   }}" />
    <meta name="keywords" content="{{ (isset($keywords)) ? $keywords : '' }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title : 'У Авчи' }}</title>

    <!-- [favicon] begin -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(env('THEME')) }}/images/favicon.ico" />
    <link rel="icon" type="image/x-icon" href="{{ asset(env('THEME')) }}/images/favicon.ico" />
    <!-- Touch icons more info: http://mathiasbynens.be/notes/touch-icons -->
    <!-- For iPad3 with retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset(env('THEME')) }}/apple-touch-icon-144x.png" />
    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset(env('THEME')) }}/apple-touch-icon-114x.png" />
    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset(env('THEME')) }}/apple-touch-icon-72x.png" />
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="{{ asset(env('THEME')) }}/apple-touch-icon-57x.png" />
    <!-- [favicon] end -->

    <!-- CSSs -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/content.css?v=1.48" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/header.css?v=1.46" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/footer.css?v=1.44" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/body.css?v=1.45" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/discussions.css" />

    <!-- FONTs -->
    <link rel='stylesheet' href="{{ asset(env('THEME')) }}/css/font-awesome.css" type='text/css' media='all' />
</head>
<!-- END HEAD -->

<!-- START BODY -->

<body class="no_js responsive stretched">
<header>
    @yield('header')
</header>

<content>
    @yield('content')
</content>

<footer>
    @yield('footer')
</footer>


    <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/contact.js"></script>
    <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/bigimage.js?v=1.31"></script>
    <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/show_product.js?v=1.47"></script>
    <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/basket.js?v=1.57"></script>
    <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/discussions.js"></script>

</body>
<!-- END BODY -->
</html>

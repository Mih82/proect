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

    <title>{{ isset($title) ? $title : 'Админка' }}</title>

    <!-- CSSs -->

    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/admin/css/admin.css?v=1.13" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/admin/css/categories.css?v=1.13" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/admin/css/products.css?v=1.13" />

    <!-- FONTs -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<!-- END HEAD -->

<!-- START BODY -->

<body class="">

<header class="header">
    @yield('header')
</header>

<content class="content">
    @yield('content')
</content>

<footer class="footer">
    @yield('footer')
</footer>

<script type="text/javascript" src="{{ asset(env('THEME')) }}/admin/js/mail.js?v=1.19"></script>
<script type="text/javascript" src="{{ asset(env('THEME')) }}/admin/js/users.js?v=1.19"></script>
<script type="text/javascript" src="{{ asset(env('THEME')) }}/admin/js/categories.js?v=1.19"></script>
<script type="text/javascript" src="{{ asset(env('THEME')) }}/admin/js/products.js?v=1.19"></script>

</body>
<!-- END BODY -->
</html>

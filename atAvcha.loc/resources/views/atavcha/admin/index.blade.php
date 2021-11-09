@extends(env('THEME').'.layouts.admin')

@section('header')

    @include(env('THEME').'.admin.header_menu')

@endsection

@section('content')

    @yield('content')

@endsection

@section('footer')

    @include(env('THEME').'.admin.mail.mail')

@endsection

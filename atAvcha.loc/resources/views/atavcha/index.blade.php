@extends(env('THEME').'.layouts.site')

@section('header')
   @include(env('THEME').'.header')
@endsection

@section('content')

    @yield('content')

@endsection

@section('footer')
    @include(env('THEME').'.footer')
@endsection

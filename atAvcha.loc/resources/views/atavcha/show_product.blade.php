@extends(env('THEME').'.index')

@section('content')

    @include(env('THEME').'.product')
{{--
    @include(env('THEME').'.news')

    @include(env('THEME').'.discussion')
--}}
@endsection

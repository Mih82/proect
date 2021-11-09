@extends(env('THEME').'.index')

@section('content')

    @include(env('THEME').'.catalog')

    {{--@include(env('THEME').'.news')--}}

    {{--@include(env('THEME').'.discussion')--}}

@endsection

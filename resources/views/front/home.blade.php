@extends('front.layouts.app')

@section('content')
    @include('front.layouts.header')
    @include('front.categories')
    @include('front.layouts.slider')
    @include('front.layouts.banner')
    @include('front.product')
    @include('front.layouts.footer')
@endsection

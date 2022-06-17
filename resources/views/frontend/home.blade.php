@extends('frontend.includes.master_template')

@section('content')
{{-- Slider --}}
@include('frontend.includes.slider')

{{-- Promotion --}}
@include('frontend.includes.promot')

{{-- Latest Product --}}
@include('frontend.includes.latest_product')

{{-- Brad Area --}}
@include('frontend.includes.brand')

{{-- Product Widget --}}
@include('frontend.includes.product_widget')

@endsection

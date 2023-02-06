@extends('layouts.app')

@section('title')
{{ $product->meta_title }}
@endsection

@section('meta_keyword')
{{ $product->meta_keyword }}
@endsection

@section('meta_description')
{{ $product->meta_description }}
@endsection

@section('content')

<div>
    <livewire:frontend.product.view :product="$product" :category="$category" />
</div>


@push('scripts')
<script>
    $(function() {

        $("#exzoom").exzoom({

            // thumbnail nav options
            "navWidth": 70,
            "navHeight": 70,
            "navItemNum": 15,
            // "navItemMargin": 2,
            "navBorder": 1,

            // autoplay
            "autoPlay": false,

            // autoplay interval in milliseconds
            "autoPlayTimeout": 2000

        });

    });
</script>
@endpush


@endsection
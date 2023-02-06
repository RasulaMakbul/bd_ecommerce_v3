@extends('layouts.app')

@section('title')
{{ $category->meta_title }}
@endsection

@section('meta_keyword')
{{ $category->meta_keyword }}
@endsection

@section('meta_description')
{{ $category->meta_description }}
@endsection

@section('content')
<div class="showPagetop" style="background-image: url({{asset('storage/category/'.$category->image)}});">
    <div class="showPageInner ">
        <h2>
            <span>{{$category->name}}</span>
        </h2>
        <p>
            {{$category->description}}
        </p>
    </div>
</div>
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <livewire:frontend.product.index :products="$products" :category="$category" />
        </div>
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
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

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div>
                <label class="stock bg-success">{{__('In Stock')}}</label>
                <div class="caaroselTest">
                    <div class="exzoom" id="exzoom">
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                @foreach($product->images as $image)
                                <li>
                                    <img src="{{ asset('/storage/' . $image) }}" alt="multiple image" class=" border border-blue-600">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn">
                                < </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>
                </div>
                <div class="product-card-body">
                    <h5 class="product-name">
                        <a href="">
                            {{$product->name}}
                        </a>
                    </h5>
                    <div>
                        <span class="selling-price">{{$product->sellingPrice}}</span>
                        <span class="original-price">{{$product->originalPrice}}</span>
                    </div>
                    <div class="mt-2">
                        <a href="" class="btn btn1">Add To Cart</a>
                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                        <a href="" class="btn btn1"> View </a>
                    </div>
                </div>
            </div>

        </div>
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
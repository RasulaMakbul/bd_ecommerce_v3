@extends('layouts.app')

@section('title','New Arrivals')
@section('content')

<div class="py-5 ">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h4>Newly Arrived Products</h4>
                <div class="underLine mb-4"></div>
            </div>
            @forelse($newArrivals as $item)
            <div class="col-3">
                <div class="product-card ">
                    <div class="product-card-img">
                        <div class="caaroselTest">
                            <img src="{{ asset('/storage/' . $item->images[0]) }}" alt="image" class=" border border-blue-600" alt='{{$item->name}}'>
                        </div>
                    </div>
                    <div class="product-card-body">
                        <h5 class="product-name">
                            <a href="{{route('public.product',[$item->category->slug,$item->slug])}}">
                                {{$item->name}}
                            </a>
                        </h5>
                        <div>
                            <span class=" selling-price">{{$item->sellingPrice}}</span>
                            <span class="original-price">{{$item->originalPrice}}</span>
                        </div>
                        <div class="mt-2">
                            <div class="row">
                                @if($item->productColor)
                                @foreach($item->productColor as $colorItem)
                                <div class="col-md-2">

                                    <label class="colorSelectionLabel" style="background-color: {{ $colorItem->color->code }};" wire:click="colorSelected({{$colorItem->id}})"></label>
                                </div>
                                @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="py-3 py-md-5 bg-light">
                <h4>{{__('No Products Available')}}</h4>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
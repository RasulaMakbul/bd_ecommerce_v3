@extends('layouts.app')

@section('title','BD Ecommerce')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="true">
    @foreach($sliders as $key=> $item)
    <div class="carousel-inner">
        <div class="carousel-item {{ $key == '0' ? 'active':'' }} ">
            <img src="{{asset('storage/slider/'.$item->image)}}" class="d-block w-100" alt="">

            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h5>{{$item->title}}</h5>
                    <p>{{$item->description}}</p>
                    <div>
                        <!-- <a href="#" class="btn btn-slider">
                            Get Now
                        </a> -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endforeach
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h4>Welcome To BD Ecommence</h4>
                <div class="underline mx-auto"></div>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui accusamus eveniet sint unde maiores nam aut. Praesentium, saepe libero sunt, ea dignissimos placeat earum, aperiam distinctio sint illo voluptas laboriosam! Asperiores numquam quis officia consequatur, dicta ad temporibus culpa iste tempora. Ut, veniam! Totam veniam fugiat similique temporibus laborum fuga, blanditiis doloribus quaerat laudantium dicta dolorum ipsam maxime eos cumque suscipit voluptatum vitae, omnis quis laboriosam sit? Adipisci incidunt pariatur asperiores rerum omnis eum architecto sint magni error velit ipsum, sunt, nulla nostrum reprehenderit quo. Magni atque id at accusamus repudiandae illo suscipit, quae et nam beatae tempore, sit nostrum.</p>
        </div>
    </div>
</div>
<div class="py-5 ">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underLine mb-4"></div>
            </div>
            @if ($trendingProduct)
            <div class="col-md-12">
                <div class="owl-carousel owl-theme trending-product">
                    @forelse($trendingProduct as $item)
                    <div class="item">
                        <div class="product-card ">
                            <div class="product-card-img">
                                <label class="stock bg-success">{{__('In Stock')}}</label>
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
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.trending-product').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>
@endsection
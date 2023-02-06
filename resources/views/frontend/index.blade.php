@extends('layouts.app')

@section('title','BD Ecommerce')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    @foreach($sliders as $key=> $item)
    <div class="carousel-inner">
        <div class="carousel-item {{ $key == '0' ? 'active':'' }} ">
            <img src="{{asset('storage/slider/'.$item->image)}}" class="d-block w-100" alt="">

            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h5>{{$item->title}}</h5>
                    <p>{{$item->description}}</p>
                    <div>
                        <a href="{{$item->link}}" class="btn btn-slider">
                            Get Now
                        </a>
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
@endsection
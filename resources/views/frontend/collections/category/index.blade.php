@extends('layouts.app')

@section('title','All Categories')
@section('content')


<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">{{__('All Categories')}}</h4>
            </div>
            @forelse($categories as $item)
            <div class="col-6 col-md-3">
                <div class="category-card">
                    <a href="{{route('public.products',$item->slug)}}">

                        <div class="category-card-img">
                            <img src="{{asset('storage/category/'.$item->image)}}" class="w-100" alt="Laptop">
                        </div>
                        <div class="category-card-body">
                            <h5>{{$item->name}}</h5>
                        </div>

                    </a>
                </div>
            </div>
            @empty
            <div class="col-6 col-md-3">
                <h4>{{__('No categories Available')}}</h4>
            </div>
            @endforelse

        </div>
    </div>
</div>


@endsection
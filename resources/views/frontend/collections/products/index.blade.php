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
<div class="showPagetop" style="background-image: url({{asset('storage/category/'.$category->image)}});opacity: 0.5;">
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
</div>


@endsection
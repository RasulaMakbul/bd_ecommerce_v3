@extends('layouts.app')

@section('title','Thank you')
@section('content')

<div class="py-3 pyt-md-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center shadow">
                <div class="p-4 shadow bg-light">
                    <h4>Thank you for shopping with us!</h4>
                    <a href="{{route('public.index')}}" class="btn btn-primary">Shop More</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
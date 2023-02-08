<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($cart as $item)
                        @if ($item->product)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{route('public.product',[$item->product->category->slug,$item->product->slug])}}">
                                        <label class="product-name">
                                            <img src="{{ asset('/storage/' . $item->product->images[0]) }}" style="max-width: 60px; max-height: 60px;" alt="image" class=" border border-blue-600" alt='{{$item->product->name}}'>
                                            <h5>
                                                {{$item->product->name}}
                                            </h5>
                                            @if ($item->productColor)
                                            <span style="color:gray; font-size:12px">-Color: {{$item->productColor->color->name}}</span>
                                            @endif
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <label class="price">&#2547</i>{{$item->product->sellingPrice}} </label>
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <button type="button" wire:loading.attr="disabled" wire:click="decrementQuantity({{$item->id}})" class="btn btn1"><i class="fa fa-minus"></i></button>
                                            <input type="number" value="{{$item->quantity}}" class="input-quantity" />
                                            <button type="button" wire:loading.attr="disabled" wire:click="incrementQuantity({{$item->id}})" class="btn btn1"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <label class="price">&#2547 {{$item->product->sellingPrice * $item->quantity}} </label>
                                    @php
                                    $totalPrice+=$item->product->sellingPrice * $item->quantity
                                    @endphp
                                </div>
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:click="removeCartItem({{$item->id}})" wire:loading.attr="disabled" class=" btn btn-danger btn-sm" title="{{__(' Remove')}}">
                                            <span wire:loading.remove wire:target="removeCartItem({{$item->id}})">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                            <span wire:loading wire:target="removeCartItem({{$item->id}})">{{__('Removing')}}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @empty
                        <div>{{__('Nothing Added to Cart')}}</div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h5>Get the best dels and offer <a href="{{route('public.categories')}}"> {{__('Shop Now')}}</a></h5>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-light p-3">
                        <h4>
                            {{__('Total : ')}}
                            <span class="float-end">&#2547 {{$totalPrice}}</span>
                        </h4>
                        <hr>
                        <a href="{{route('public.checkout')}}" class=" btn btn-warning float-end w-100">{{__('Check out')}}</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
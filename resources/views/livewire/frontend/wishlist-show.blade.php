<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>{{__('Products')}}</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>{{__('Price')}}</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>{{__('Remove')}}</h4>
                                </div>
                            </div>
                        </div>

                        @forelse($wishlist as $item)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{route('public.product',[$item->product->category->slug,$item->product->slug])}}">
                                        <label class="product-name">
                                            <div class="exzoom" id="exzoom" style="width: 50px; height: 50px">
                                                <div class="exzoom_img_box">
                                                    <ul class='exzoom_img_ul'>
                                                        @foreach($item->product->images as $image)
                                                        <li>
                                                            <img src="{{ asset('/storage/' . $image) }}" alt="multiple image" class=" border border-blue-600" alt='{{$item->product->name}}'>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            {{$item->product->name}}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price"><i class="fa-solid fa-bangladeshi-taka-sign"></i>{{$item->product->sellingPrice}}</label>
                                </div>

                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:click="removeWishlistItem({{$item->id}})" class="btn btn-danger btn-sm">
                                            <span wire:loading.remove wire:target="removeWishlistItem({{$item->id}})">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                            <span wire:loading wire:target="removeWishlistItem({{$item->id}})">{{__('Removing')}}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h4>{{__('No Wishlist Added')}}</h4>
                        @endforelse


                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div>
            </div>
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
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
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <p>{{$product->shortDefination}}</p>
                        <h4 class="product-name">
                            {{$product->name}}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">{{$product->sellingPrice}}</span>
                            <span class="original-price">{{$product->originalPrice}}</span>
                        </div>
                        <div>
                            <div class="row">
                                @if($product->productColor)
                                @foreach($product->productColor as $colorItem)
                                <div class="col-md-2">

                                    <label class="colorSelectionLabel" style="background-color: {{ $colorItem->color->code }};" wire:click="colorSelected({{$colorItem->id}})"></label>
                                </div>
                                @endforeach
                                @endif
                                <div class="">
                                    @if($this->productColorSelectedStock == 'outOfStock')
                                    <label class="btn-sm py-1 mt-2 text-white label-stock bg-danger availibility">{{__('Out Of Stock')}}</label>
                                    @elseif($this->productColorSelectedStock >0)
                                    <label class="btn-sm py-1 mt-2 text-white label-stock bg-success availibility">{{__('In Stock')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementStock"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="stockCount" value="{{$this->stockCount}}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementStock"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn btn1 rounded" title="{{__('Add To Cart')}}">
                                <i class="fa fa-shopping-cart"></i>
                            </button>


                            <button type="button" wire:click="addToWishList({{$product->id}})" class="btn btn1 rounded" title=" {{__('Add To Wishlist')}} ">
                                <span wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart"></i>
                                </span>
                                <span wire:loading wire:target="addToWishList">{{__('Adding...')}}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>{{__('Description')}}</h4>
                        </div>
                        <div class="card-body">
                            <p>{{$product->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>

</script>
@endpush
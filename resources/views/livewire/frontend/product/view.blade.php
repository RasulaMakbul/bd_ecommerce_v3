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
                                </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> </a>
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
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="test-tab" data-bs-toggle="tab" data-bs-target="#test-tab-pane" type="button" role="tab" aria-controls="test-tab-pane" aria-selected="true">{{__('Test')}}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link l" id="result-tab" data-bs-toggle="tab" data-bs-target="#result-tab-pane" type="button" role="tab" aria-controls="result-tab-pane" aria-selected="false">{{__('Result')}}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="howToUse-tab" data-bs-toggle="tab" data-bs-target="#howToUse-tab-pane" type="button" role="tab" aria-controls="howToUse-tab-pane" aria-selected="false">{{__('How To Use')}}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="pack-tab" data-bs-toggle="tab" data-bs-target="#pack-tab-pane" type="button" role="tab" aria-controls="pack-tab-pane" aria-selected="false">{{__('Pack')}}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="ingredient-tab" data-bs-toggle="tab" data-bs-target="#ingredient-tab-pane" type="button" role="tab" aria-controls="ingredient-tab-pane" aria-selected="false">{{__('Ingredient')}}</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="test-tab-pane" role="tabpanel" aria-labelledby="test-tab" tabindex="0">
                                    <p>{{$product->test}}</p>

                                </div>
                                <!-- result -->
                                <div class="tab-pane fade" id="result-tab-pane" role="tabpanel" aria-labelledby="result-tab" tabindex="0">
                                    {{$product->result}}
                                </div>
                                <!-- howToUse -->
                                <div class="tab-pane fade" id="howToUse-tab-pane" role="tabpanel" aria-labelledby="howToUse-tab" tabindex="0">
                                    {{$product->howToUse}}
                                </div>
                                <!-- pack -->
                                <div class="tab-pane fade" id="pack-tab-pane" role="tabpanel" aria-labelledby="pack-tab" tabindex="0">
                                    {{$product->pack}}
                                </div>
                                <!-- ingredient -->
                                <div class="tab-pane fade" id="ingredient-tab-pane" role="tabpanel" aria-labelledby="ingredient-tab" tabindex="0">
                                    {{$product->ingredient}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <i class="fa-solid fa-eye-dropper fs-5"></i>
                                    <h6>WEIGHT</h6>
                                    {{$product->weight}}
                                </div>
                                <div class="col-md-4 text-center">
                                    <i class="fa-solid fa-jar fs-5"></i>
                                    <h6>PAO</h6>
                                    {{$product->pao}}
                                </div>
                                <div class="col-md-4 text-center fs-5">
                                    <i class="fa-solid fa-industry"></i>
                                    <h6>Made In</h6>
                                    {{$product->origin}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <h4>Reviews</h4>
                            <div class="underline mx-auto"></div>
                        </div>
                        <div class="col-md-12">
                            @auth
                            <form action="{{route('comment.store',$product->id)}}" method="POST">
                                @csrf
                                <label for="body" class="form-label">{{__('Add Your Comment')}}</label>
                                <textarea name="body" id="body" class="form-control"></textarea>
                                <button type="submit" class="btn btn-outline-secondary rounded mt-3">Submit</button>
                            </form>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary rounded mt-3 d-flex justify-content-center">{{__('Login to Comment')}}</a>
                            @endauth
                        </div>
                        <div class="row pt-5">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-md-12 text-center">
                                        <h4>Previous Comments</h4>
                                        <div class="underline mx-auto"></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        @foreach ($product->comments as $comment)

                                        <hr>
                                        <li style="color: rgb(57, 117, 117)">
                                            <div>
                                                <h5>
                                                    {{$comment->commentedBy->name}}
                                                    <small style="font-size: 12px">
                                                        commented {{ $comment->created_at->diffForHumans()}}
                                                        ({{date('d-M-Y')}})
                                                    </small>
                                                </h5>
                                                <p>{{$comment->body}}</p>
                                            </div>
                                        </li>


                                        @endforeach
                                    </ul>
                                </div>
                            </div>
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
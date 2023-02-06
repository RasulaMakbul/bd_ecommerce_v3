<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        <div class="caaroselTest">
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
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <p>{{$product->shortDefination}}</p>
                        <h4 class="product-name">
                            {{$product->name}}
                        </h4>
                        <label class="stock bg-success">{{__('In Stock')}}</label>
                        <hr>
                        <p class="product-path">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">{{$product->sellingPrice}}</span>
                            <span class="original-price">{{$product->originalPrice}}</span>
                        </div>
                        <div>
                            @if($product->productColor)
                            @foreach($product->productColor as $colorItem)
                            <input type="radio" name="colorSelection" value="{{$colorItem->id}}">{{$colorItem->color->name}}
                            @endforeach
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" value="1" class="input-quantity" />
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
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
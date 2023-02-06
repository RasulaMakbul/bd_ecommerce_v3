<div>
    @forelse($products as $item)
    <div class="col-md-3">
        <div class="product-card">
            <div class="product-card-img">
                <label class="stock bg-success">{{__('In Stock')}}</label>
                <div class="caaroselTest">
                    <div class="exzoom" id="exzoom">
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                @foreach($item->images as $image)
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
                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>
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
                    <a href="" class="btn btn1">Add To Cart</a>
                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                    <a href="" class="btn btn1"> View </a>
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
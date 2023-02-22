<div class="container col">
    <div class="row">
        @forelse($products as $item)
        <div class="col-md-3">
            <div class="product-card">
                <div class="product-card-img">
                    <div class="caaroselTest">
                        <div>
                            <div class="exzoom_img_box">
                                <img src="{{ asset('/storage/' . $item->images[0]) }}" alt="multiple image" class=" border border-blue-600">

                            </div>

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
                </div>
            </div>
        </div>
        @empty
        <div class="py-3 py-md-5 bg-light">
            <h4>{{__('No Products Available')}}</h4>
        </div>
        @endforelse
    </div>
</div>
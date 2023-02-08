<x-admin.master>
    <x-slot:title>
        {{__('Orders')}}
    </x-slot:title>
    <div class="py-3 py-md-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-light p-3">
                        <h4>
                            <i class="fa fa-shopping-cart"></i> My order Details
                            <a href="{{route('order.index')}}" class="btn btn-danger btn-sm float-end"><i class="fa-solid fa-rotate-left"></i></a>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>
                                <h6>Order ID :{{$order->id}}</h6>
                                <h6>Tracking No : {{$order->tracking_no}}</h6>
                                <h6>Order Created Date : {{$order->created_at->format('d-m-Y')}}</h6>
                                <h6>Paymment Method : {{$order->payment_mode}}</h6>
                                <h6 class="border p-2 text-success">
                                    Order Status: <span class="text-uppercase">{{$order->status_message}}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>User Details</h5>
                                <hr>
                                <h6>Name :{{$order->fullname}}</h6>
                                <h6>Email ID : {{$order->email}}</h6>
                                <h6>Phone : {{$order->phone}}</h6>
                                <h6>Address : {{$order->address}}</h6>
                                <h6>Postal Code : {{$order->pincode}}</h6>

                            </div>
                        </div>
                        <h5>Order Items</h5>
                        <hr>
                        <div class="shadow bg-light p-3">
                            <h4 class="mb-4">My Order</h4>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>sl</th>
                                            <th>Image</th>
                                            <th>Item Id</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $totalPrice=0;
                                        @endphp
                                        @foreach ($order->orderItem as $item)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>
                                                <img src="{{ asset('/storage/' . $item->product->images[0]) }}" style="max-width: 60px; max-height: 60px; " alt="image" class=" border border-blue-600 rounded" alt='{{$item->product->name}}'>

                                            </td>
                                            <td>{{$item->product->id}}</td>
                                            <td>{{$item->product->name}} <span>{{$item->productColor->color->name}}</span></td>
                                            <td> &#2547 {{$item->product->sellingPrice}}</td>
                                            <td> {{$item->quantity}}</td>
                                            <td class="fw-bold">&#2547 {{$item->price * $item->quantity}}</td>
                                            @php
                                            $totalPrice+= $item->price * $item->quantity
                                            @endphp
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="6" class="fw-bold">Total Price</td>
                                            <td colspan="1" class="fw-bold">&#2547 {{$totalPrice}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.master>
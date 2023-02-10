<x-admin.master>
    <x-slot:title>
        {{__('Order')}}
    </x-slot:title>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">{{('Order')}}</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{route('order.invoice.generate',$order->id)}}" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-file-pdf"></i>{{__(' Download Invoice')}}</a>
                    <a href="{{route('order.invoice',$order->id)}}" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i>{{__(' Invoice')}}</a>
                </div>
                <a href="{{route('order.index')}}" class="btn btn-sm btn-outline-secondary mx-2"><i class="fa-solid fa-list"></i>{{__('Orders')}}</a>
            </div>
        </div>


    </div>
    <div class="py-3 py-md-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-light p-3">
                        <h4>
                            <i class="fa fa-shopping-cart"></i> My order Details
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
                    <div class="card">
                        <div class="card-body">
                            <h4>Order Process(Order Status Update)</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <form action="{{route('order.statusUpdate',$order->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label>Update Order Status</label>
                                        <div class="input-group">
                                            <select name="order_status" class="form-select">
                                                <option value="">Select Status</option>
                                                <option value="in progress">In Progress</option>
                                                <option value="completed">Completed</option>
                                                <option value="pending">Pending</option>
                                                <option value="cancelled">Cancelled</option>
                                                <option value="out-for-delevery">Out for Delivery</option>
                                            </select>
                                            <button type="submit" class="btn btn-secondary text-light">Update</button>
                                        </div>

                                    </form>
                                </div>
                                <div class="col-md-7">
                                    <br>
                                    <h4 class="mt-3">Current Order Status: <span class="text-uppercase text-success">{{$order->status_message}}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.master>
@extends('layouts.app')

@section('title','Checkout')
@section('content')
<div class="py-3 py-md-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-light p-3">
                    <h4 class="mb-4">My Order</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>sl</th>
                                    <th>Order Id</th>
                                    <th>Tracking No</th>
                                    <th>User Name</th>
                                    <th>Payment Method</th>
                                    <th>Ordered Date</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{$item->fullname}}</td>
                                    <td>{{$item->payment_mode}}</td>
                                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                                    <td>{{$item->status_message}}</td>
                                    <td>
                                        <a href="{{route('public.show',$item->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">No Orders Available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
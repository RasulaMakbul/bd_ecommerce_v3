<x-admin.master>
    <x-slot:title>
        {{__('Orders')}}
    </x-slot:title>
    <div>
        <div class="py-3 py-md-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shadow bg-light p-3">
                            <h4 class="mb-4">My Order</h4>
                            <hr>
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label>Filter by Date</label>
                                        <input type="date" name="date" value="{{date('Y-m-d')}}" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>Filter by Status</label>
                                        <select name="status" class="form-select">
                                            <option value="">Select Status</option>
                                            <option value="in progress">In Progress</option>
                                            <option value="completed">Completed</option>
                                            <option value="pending">Pending</option>
                                            <option value="cancelled">Cancelled</option>
                                            <option value="out-for-delevery">Out for Delivery</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </form>
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
                                                <a href="{{route('order.show',$item->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.master>
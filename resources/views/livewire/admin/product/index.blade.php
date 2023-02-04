    <div>
        <div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2 class="h2">{{('Products')}}</h2>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar" class="align-text-bottom"></span>
                        This week
                    </button>
                    <a href="{{route('product.create')}}" class="btn btn-sm btn-outline-secondary ">
                        <i class="fa-duotone fa-plus"></i> {{__('Create')}}
                    </a>
                </div>
            </div>


        </div>

        <div>
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Name')}}</th>
                        <th scope="col">{{__('Category')}}</th>
                        <th scope="col">{{__('code')}}</th>
                        <th scope="col">{{__('Slug')}}</th>
                        <th scope="col">{{__('trending')}}</th>
                        <th scope="col">{{__('status')}}</th>
                        <th scope="col">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key=>$item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <span class="bg-warning">{{$item->category?->name}}</span>

                        </td>


                        <td>{{$item->code}}</td>
                        <td>{{$item->slug}}</td>

                        <td>@if($item->trending==0)
                            <a href="{{route('product.trending',$item->id)}}" class="btn btn-sm link-success">{{__('Not Ternding')}}</a>
                            @else
                            <a href="{{route('product.notTrending',$item->id)}}" class="btn btn-sm link-danger">{{__('Trending')}}</a>
                            @endif
                        </td>
                        <td>@if($item->status==0)
                            <a href="{{route('product.active',$item->id)}}" class="btn btn-sm link-success">{{__('Hidden')}}</a>
                            @else
                            <a href="{{route('product.inactive',$item->id)}}" class="btn btn-sm link-danger">{{__('Visible')}}</a>

                            @endif
                        </td>
                        <td>
                            <a href="{{route('product.show',$item->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                            <a href="{{route('product.edit',$item->id)}}" class=" btn btn-sm link-warning" comment="Edit subcategory"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                            <form action="{{ route('product.destroy',$item->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
                            </form>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$products->links()}}

        </div>
    </div>
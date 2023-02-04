<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">{{__('Brands')}}</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>

            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                <i class="fa-solid fa-plus"></i>
                {{__(' Create')}}
            </button>
            <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="categoryModalLabel">{{__('Create Brand')}}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <x-admin.partials.brandCreateModal />
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div>
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('Brand')}}</th>
                    <th scope="col">{{__('Slug')}}</th>
                    <th scope="col">{{__('status')}}</th>
                    <th scope="col">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $key=>$item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->slug}}</td>
                    <td>@if($item->status==0)

                        <a href="{{route('brand.active',$item->id)}}" class="btn btn-sm link-success">{{__('Hidden')}}</a>
                        @else
                        <a href="{{route('brand.inactive',$item->id)}}" class="btn btn-sm link-danger">{{__('Visible')}}</a>

                        @endif
                    </td>
                    <td>
                        <a href="{{route('brand.edit',$item->id)}}" class=" btn btn-sm link-warning" comment="Edit Brand"><i class="fa-solid fa-pen-to-square fs-5"></i></a>

                        <form action="{{ route('brand.destroy',$item->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        {{$brands->links()}}

    </div>
</div>
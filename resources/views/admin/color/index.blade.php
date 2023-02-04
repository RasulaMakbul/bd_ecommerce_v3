<x-admin.master>
    <x-slot:title>
        {{__('Colors')}}
    </x-slot:title>
    <div>
        <div>
            <div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h2">{{('Colors')}}</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar" class="align-text-bottom"></span>
                            This week
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#colorModal">
                            <i class="fa-solid fa-plus"></i>
                            {{__(' Create')}}
                        </button>
                        <div class="modal fade" id="colorModal" tabindex="-1" aria-labelledby="colorModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="colorModalLabel">{{__('Create Color')}}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('color.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <x-admin.partials.colorCreateModal />
                                        </form>
                                    </div>

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
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('code')}}</th>
                            <th scope="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colors as $key=>$item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->code}}</td>
                            <td>
                                <a href="{{route('color.show',$item->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                                <button type="button" class="btn btn-sm link-warning" data-bs-toggle="modal" data-bs-target="#editColorModal">
                                    <i class="fa-solid fa-pen-to-square fs-5"></i>
                                </button>
                                <div class="modal fade" id="editColorModal" tabindex="-1" aria-labelledby="editColorModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title fs-5" id="editColorModalLabel">{{__('Edit Color')}}</h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('color.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('patch')
                                                    <x-admin.partials.colorEditModal :color="$item" />
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('color.destroy',$item->id) }}" method="post" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
                                </form>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-admin.master>
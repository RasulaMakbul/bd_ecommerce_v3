<x-admin.master>
    <x-slot:title>
        {{__('Sliders')}}
    </x-slot:title>
    <div>
        <div>
            <div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h2">{{('Sliders')}}</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar" class="align-text-bottom"></span>
                            This week
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#sliderModal">
                            <i class="fa-solid fa-plus"></i>
                            {{__(' Create')}}
                        </button>
                        <div class="modal fade" id="sliderModal" tabindex="-1" aria-labelledby="sliderModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="sliderModalLabel">{{__('Create Slider')}}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <x-admin.partials.sliderCreateModal />
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
                            <th scope="col">{{__('Title')}}</th>
                            <th scope="col">{{__('Image')}}</th>
                            <th scope="col">{{__('Link')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th scope="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $key=>$item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td class="tableImage"><img src="{{asset('storage/slider/'.$item->image)}}" alt="image"></td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->link}}</td>
                            <td>@if($item->status==0)
                                <a href="{{route('slider.active',$item->id)}}" class="btn btn-sm link-success">{{__('Hidden')}}</a>
                                @else
                                <a href="{{route('slider.inactive',$item->id)}}" class="btn btn-sm link-danger">{{__('Visible')}}</a>

                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm link-warning" data-bs-toggle="modal" data-bs-target="#editSliderModal">
                                    <i class="fa-solid fa-pen-to-square fs-5"></i>
                                </button>
                                <div class="modal fade" id="editSliderModal" tabindex="-1" aria-labelledby="editSliderModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title fs-5" id="editSliderModalLabel">{{__('Edit Slider')}}</h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('slider.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('patch')
                                                    <x-admin.partials.sliderEditModal :slider="$item" />
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('slider.destroy',$item->id) }}" method="post" style="display:inline">
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
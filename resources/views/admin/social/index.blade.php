<x-admin.master>
    <x-slot:title>
        {{__('Social')}}
    </x-slot:title>
    <div>
        <div>
            <div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h2">{{('Social')}}</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">

                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#socialModal">
                            <i class="fa-solid fa-plus"></i>
                            {{__(' Create')}}
                        </button>
                        <div class="modal fade" id="socialModal" tabindex="-1" aria-labelledby="socialModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="socialModalLabel">{{__('Create social')}}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('social.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <x-admin.partials.socialCreateModal />
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
                            <th scope="col">{{__('Link')}}</th>
                            <th scope="col">{{__('status')}}</th>
                            <th scope="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($socials as $key=>$item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->title}}</td>
                            <td>{{$item->link}}</td>
                            <td>@if($item->status==0)
                                <a href="{{route('social.active',$item->id)}}" class="btn btn-sm link-success">{{__('Hidden')}}</a>
                                @else
                                <a href="{{route('social.inactive',$item->id)}}" class="btn btn-sm link-danger">{{__('Visible')}}</a>

                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm link-warning" data-bs-toggle="modal" data-bs-target="#editsocialModal">
                                    <i class="fa-solid fa-pen-to-square fs-5"></i>
                                </button>
                                <div class="modal fade" id="editsocialModal" tabindex="-1" aria-labelledby="editsocialModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title fs-5" id="editsocialModalLabel">{{__('Edit social')}}</h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('social.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('patch')

                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">{{__('Title')}}</label>
                                                        <input type="text" class="form-control" id="title" name="title" value="{{old('title',$item->title)}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="link" class="form-label">{{__('Social Link')}}</label>
                                                        <input type="social" class="form-control" id="link" name="link" value="{{old('link',$item->link)}}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="checkbox" id="status" name="status" {{$item->status == '1' ? 'checked' : ''}}>
                                                        <label class="form-label">{{__('Active')}}</label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-sm btn-outline-primary">{{__('Save')}}</button>
                                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('social.destroy',$item->id) }}" method="post" style="display:inline">
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
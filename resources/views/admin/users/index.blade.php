<x-admin.master>
    <x-slot:title>
        {{__('Users')}}
    </x-slot:title>
    <div>
        <div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2 class="h2">{{__('Users')}}</h2>
                <div class="btn-toolbar mb-2 mb-md-0">



                </div>
            </div>



            <div>
                <table class="table table-bordered table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Email')}}</th>
                            <th scope="col">{{__('Role')}}</th>
                            <th scope="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key=>$item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>@if($item->role_as==0)
                                <label class="badge btn btn-success p-3">{{__('User')}}</label>
                                @elseif ($item->role_as==1)
                                <label class="badge btn btn-danger p-3">{{__('Admin')}}</label>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('users.show',$item->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>

                                <form action="#" method="post" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{$users->links()}}

            </div>
        </div>
    </div>
</x-admin.master>

<x-admin.master>
    <x-slot:title>
        {{__('Edit ')}} {{$category->name}}
    </x-slot:title>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">{{__('Edit ')}}{{$category->name}}</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar" class="align-text-bottom"></span>
                    This week
                </button>


            </div>
        </div>
        <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" class="form-control" id="id" name="id" value="{{$category->id}}" hidden>
            <div class="mb-3">
                <label for="name" class="form-label">{{__('Category Name')}}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name',$category->name)}}">
                @error('name') <small class="text-danger">{{$message}}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">{{__('Slug')}}</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{old('name',$category->slug)}}">
                @error('slug') <small class=" text-danger">{{$message}}</small> @enderror
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 100px">{{old('description',$category->description)}}</textarea>
                <label for="description">{{(' Descroption')}}</label>
                @error('description') <small class="text-danger">{{$message}}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">{{__('Image')}}</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{asset('storage/category/'.$category->image)}}" alt="" width="60px" height="60px">
                @error('image') <small class="text-danger">{{$message}}</small> @enderror
            </div>


            <div class="mb-3">
                <h4>{{__('SEO TAGS')}}</h4>
            </div>
            <div class="mb-3">
                <label for="meta_title" class="form-label">{{__('Meta Title')}}</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{old('meta_title',$category->meta_title)}}">
                @error('meta_title') <small class=" text-danger">{{$message}}</small> @enderror
            </div>
            <div class=" mb-3">
                <label for="meta_keyword" class="form-label">{{__('Meta Keyword')}}</label>
                <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{old('meta_keyword',$category->meta_keyword)}}">
                @error('meta_keyword') <small class=" text-danger">{{$message}}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="meta_description" class="form-label">{{__('Meta Description')}}</label>
                <input type="text" class="form-control" id="meta_description" name="meta_description" value="{{old('meta_description',$category->meta_description)}}">
                @error('meta_description') <small class=" text-danger">{{$message}}</small> @enderror
            </div>

            <div class="my-5">
                <button type="submit" class="btn btn-sm btn-outline-primary">{{__('Update')}}</button>
                <a href="{{route('category.index')}}" class="btn btn-sm btn-outline-secondary">{{__('Close')}}</a>
            </div>

        </form>
    </div>
</x-admin.master>
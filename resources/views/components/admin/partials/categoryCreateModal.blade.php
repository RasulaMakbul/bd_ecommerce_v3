<div class="mb-3">
    <label for="name" class="form-label">{{__('Category Name')}}</label>
    <input type="text" class="form-control" id="name" name="name">
    @error('name') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="mb-3">
    <label for="slug" class="form-label">{{__('Slug')}}</label>
    <input type="text" class="form-control" id="slug" name="slug">
    @error('slug') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="form-floating">
    <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 100px"></textarea>
    <label for="description">{{(' Descroption')}}</label>
    @error('description') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="mb-3">
    <label for="image" class="form-label">{{__('Image')}}</label>
    <input type="file" class="form-control" id="image" name="image">
    @error('image') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="mb-3">
    <input type="checkbox" id="status" name="status">
    <label class="form-label">{{__('Active')}}</label>
</div>

<div class="mb-3">
    <h4>{{__('SEO TAGS')}}</h4>
</div>
<div class="mb-3">
    <label for="meta_title" class="form-label">{{__('Meta Title')}}</label>
    <input type="text" class="form-control" id="meta_title" name="meta_title">
    @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="mb-3">
    <label for="meta_keyword" class="form-label">{{__('Meta Keyword')}}</label>
    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword">
    @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="mb-3">
    <label for="meta_description" class="form-label">{{__('Meta Description')}}</label>
    <input type="text" class="form-control" id="meta_description" name="meta_description">
    @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-outline-primary">{{__('Save')}}</button>
    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
</div>
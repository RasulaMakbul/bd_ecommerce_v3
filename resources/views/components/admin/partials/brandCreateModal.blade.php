<div class="mb-3">
    <label for="name" class="form-label">{{__('Brand Name')}}</label>
    <input type="text" class="form-control" id="name" name="name">
    @error('name') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="mb-3">
    <label for="slug" class="form-label">{{__('Slug')}}</label>
    <input type="text" class="form-control" id="slug" name="slug">
    @error('slug') <small class="text-danger">{{$message}}</small> @enderror
</div>

<div class="mb-3">
    <input type="checkbox" id="status" name="status">
    <label class="form-label">{{__('Active')}}</label>
</div>


<div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-outline-primary">{{__('Save')}}</button>
    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
</div>
<div class="mb-3">
    <label for="title" class="form-label">{{__('Title')}}</label>
    <input type="text" class="form-control" id="title" name="title">
    @error('title') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="form-floating">
    <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 100px"></textarea>
    <label for="description">{{(' Descroption')}}</label>
    @error('description') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="mb-3">
    <label for="link" class="form-label">{{__('Link')}}</label>
    <input type="text" class="form-control" id="link" name="link">
</div>
<div class="mb-3">
    <label for="image" class="form-label">{{__('Image')}}</label>
    <input type="file" class="form-control" id="image" name="image">
</div>
<div class="mb-3">
    <input type="checkbox" id="status" name="status">
    <label class="form-label">{{__('Active')}}</label>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-outline-primary">{{__('Save')}}</button>
    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
</div>
<div class="mb-3">
    <label for="title" class="form-label">{{__('Title')}}</label>
    <input type="text" class="form-control" id="title" name="title" value="{{old('title',$slider->title)}}">
    @error('title') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="form-floating">
    <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 100px">{{$slider->description}}</textarea>
    <label for="description">{{(' Descroption')}}</label>
    @error('description') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="mb-3">
    <label for="link" class="form-label">{{__('Link')}}</label>
    <input type="text" class="form-control" id="link" name="link" value="{{old('link',$slider->link)}}">
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-outline-primary">{{__('Save')}}</button>
    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
</div>
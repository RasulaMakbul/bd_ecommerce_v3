<div class="mb-3">
    <label for="name" class="form-label">{{__('Color Name')}}</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$color->name)}}">
    @error('name') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="mb-3">
    <label for="code" class="form-label">{{__('Color Code')}}</label>
    <input type="color" class="form-control" id="code" name="code" value="{{old('code',$color->code)}}">
    @error('code') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-outline-primary">{{__('Save')}}</button>
    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
</div>
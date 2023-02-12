<div class="mb-3">
    <label for="title" class="form-label">{{__('Title')}}</label>
    <input type="text" class="form-control" id="title" name="title">
</div>
<div class="mb-3">
    <label for="link" class="form-label">{{__('Social Link')}}</label>
    <input type="text" class="form-control" id="link" name="link">
</div>
<div class="mb-3">
    <input type="checkbox" id="status" name="status">
    <label class="form-label">{{__('Active')}}</label>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-outline-primary">{{__('Save')}}</button>
    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
</div>
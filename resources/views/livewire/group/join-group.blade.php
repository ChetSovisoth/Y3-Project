<form wire:submit.prevent="joinGroup">
    <div class="mb-3">
        <label for="groupCode" class="form-label">Group Code<span class="text-danger">&#42;</span></label>
        <input type="text" class="form-control" id="groupCode" wire:model="code">
        @error('code') 
            <span class="text-danger">{{ $message }}</span> 
        @enderror
    </div>
    <button type="submit" class="btn btn-primary ml-auto" data-bs-dismiss="modal">Done</button>
</form>

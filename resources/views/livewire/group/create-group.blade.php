<form wire:submit.prevent="storeGroup">
    <div class="mb-3">
        <label for="groupName" class="form-label">Group Name <span class="text-danger">&#42;</span></label>
        <input type="text" class="form-control" id="groupName" wire:model="name">
        @error('name') 
            <span class="text-danger">{{ $message }}</span> 
        @enderror
    </div>
    <div class="mb-3">
        <label for="groupPhoto" class="form-label">Group Photo</label>
        <input type="file" class="form-control" id="groupPhoto" wire:model="photo">
        @error('photo') 
            <span class="text-danger">{{ $message }}</span> 
        @enderror
    </div>
    <div class="mb-3">
        <label for="groupDescription" class="form-label">Group Description</label>
        <textarea class="form-control" id="groupDescription" wire:model="description" rows="3" style="resize: none;"></textarea>
        @error('description') 
            <span class="text-danger">{{ $message }}</span> 
        @enderror
    </div>
    <button type="submit" class="btn btn-primary ml-auto" data-bs-dismiss="modal">Save changes</button>
</form>

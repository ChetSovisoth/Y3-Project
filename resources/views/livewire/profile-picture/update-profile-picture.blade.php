<form wire:submit.prevent="updateProfilePicture" class="align-self-center me-2">

    <button type="button" class="btn btn-sm btn-primary mb-2 py-2" data-bs-toggle="modal" data-bs-target="#updateProfileModal">Upload</button>

    <div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateProfileModalLabel">Update Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to update your profile picture?

                        <label for="profile-picture-input" class=" mt-3 mb-1">Upload here:</label>
                        <input type="file" id="profile-picture-input" wire:model="avatar" class="form-control form-control-sm">
                        @error('avatar') 
                        <span class="error">{{ $message }}</span> 
                        @enderror
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="align-self-center">
    <!-- Button trigger modal -->
    <button type="submit" class="btn btn-sm btn-danger mb-2 py-2" data-bs-toggle="modal" data-bs-target="#removeProfileModal">Remove Photo</button>
    <!-- Modal -->
    <div class="modal fade" id="removeProfileModal" tabindex="-1" aria-labelledby="removeProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="removeProfileModalLabel">Remove Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove your profile picture?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" wire:click="removeProfilePicture">Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>

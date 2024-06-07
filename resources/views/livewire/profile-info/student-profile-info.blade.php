<div class="my-3">
    <form wire:submit.prevent="saveStudentInfo">
        <div class="d-flex my-1">
            <label for="institute" class="flex-grow-1">Institute: </label>
            <input type="text" class="w-25 rounded-2 border border-0 p-1" placeholder="Institute" wire:model="institute" value="{{ $institute }}">
        </div>
        @error('institute')
            <div class="d-flex justify-content-end text-danger mt-1 mb-2">{{ $message }}</div>
        @enderror


        <div class="d-flex my-2">
            <label for="field_of_study" class="flex-grow-1">Field of Study: </label>
            <input type="text" class="w-25 rounded-2 border border-0 p-1" placeholder="Field of Study" wire:model="field_of_study" value="{{ $field_of_study }}">
        </div>
        @error('field_of_study')
            <div class="d-flex justify-content-end text-danger mt-1 mb-2">{{ $message }}</div>
        @enderror


        <div class="d-flex my-1">
            <label for="academic_level" class="flex-grow-1">Academic Level: </label>
            <input type="text" class="w-25 rounded-2 border border-0 p-1" placeholder="Academic Level" wire:model="academic_level" value="{{ $academic_level }}">
        </div>
        @error('academic_level')
            <div class="d-flex justify-content-end text-danger mt-1 mb-2">{{ $message }}</div>
        @enderror
        
        <div class="mb-3">
            <label for="bio" class="form-label text-light">Bio</label>
            <textarea class="form-control bg-dark-subtle" id="bio" wire:model="bio" rows="3" placeholder="Bio" style="resize: none;">{{ $bio }}</textarea>
            @error('bio')
                <div class="text-danger mt-2">{{ $message }}</div>    
            @enderror
            <p class="text-white mt-2" style="font-size: 14px">Max: 255</p>
        </div>
    
        <div class="d-flex justify-content-end">
            <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#saveStudentInfoModal">Save Changes</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="saveStudentInfoModal" tabindex="-1" aria-labelledby="saveStudentInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-black" id="saveStudentInfoModalLabel">Save Info</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-black">
                        Are you sure you want to save this?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" wire:click="removeProfilePicture">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

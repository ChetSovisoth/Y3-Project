<div class="my-3">
    <form wire:submit.prevent="saveMentorInfo">
        <div class="d-flex my-1">
            <label for="area_of_expertise" class="flex-grow-1">Area of Expertise: </label>
            <input type="text" class="w-25 rounded-2 border border-0 p-1" placeholder="Area of Expertise"
                wire:model="area_of_expertise" value="{{ $area_of_expertise }}">
        </div>
        @error('area_of_expertise')
            <div class="d-flex justify-content-end text-danger mt-1 mb-2">{{ $message }}</div>
        @enderror

        <div class="d-flex my-2">
            <label for="education_level" class="flex-grow-1">Education Level: </label>
            <select wire:model="education_level" id="education_level" class="w-25 rounded-2 p-1">
                @if (!isset($user->mentor) || !$education_level)
                    <option selected disabled>Education Level</option>
                @endif
                @if (isset($user->mentor) && $education_level)
                    <option value="{{ $education_level }}">{{ ucfirst($education_level) }}</option>
                @endif
                <option disabled>──────────</option>
                <option value="bachelor">Bachelor</option>
                <option value="master">Master</option>
                <option value="phd">PhD</option>
            </select>

        </div>
        @error('education_level')
            <div class="d-flex justify-content-end text-danger mt-1 mb-2">{{ $message }}</div>
        @enderror

        <div class="d-flex my-1">
            <label for="experience" class="flex-grow-1">Experience: </label>
            <input type="text" class="w-25 rounded-2 border border-0 p-1" placeholder="Experience"
                wire:model="experience" value="{{ $experience }}">
        </div>
        @error('experience')
            <div class="d-flex justify-content-end text-danger mt-1 mb-2">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="bio" class="form-label text-light">Bio</label>
            <textarea class="form-control bg-dark-subtle" id="bio" wire:model="bio" rows="3" placeholder="Bio"
                style="resize: none;">{{ $bio }}</textarea>
            @error('bio')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
            <p class="text-white mt-2" style="font-size: 14px">Max: 255</p>
        </div>

        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#saveMentorInfoModal">Save Changes</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="saveMentorInfoModal" tabindex="-1" aria-labelledby="saveMentorInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-black" id="saveMentorInfoModalLabel">Save Info</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-black">
                        Are you sure you want to save this?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<form method="post" action="{{ route('updowns.store') }}" class="mb-5">
    @csrf
    <div class="input-group mb-4 mt-4">
        <input type="text" class="form-control w-75" name="updown_message" aria-label="Text input with dropdown button" placeholder="Write here your short text..." maxlength="155" required>
        <select class="form-select" aria-label="Default select example" name="updown" required>
            <option value="Up">Up</option>
            <option value="Down">Down</option>
        </select>
        <button type="submit" class="btn btn-secondary">{{ __('Create') }}</button>
    </div>
</form>

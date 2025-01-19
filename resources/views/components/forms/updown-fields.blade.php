<form method="post" action="{{ route('updowns.store') }}" class="mb-5">
    @csrf
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-primary" role="alert">
                <strong>Warning:</strong> {{ $error }}
            </div>
        @endforeach
    @endif
    <div class="input-group mb-4 mt-4">
        <input type="text" class="form-control w-75" name="updown_message" aria-label="Text input with dropdown button" placeholder="How are you feeling today?" maxlength="155" required>
        <select class="form-select" aria-label="Default select example" name="updown" required>
            <option value="Up">Up</option>
            <option value="Down">Down</option>
        </select>
        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
    </div>
</form>

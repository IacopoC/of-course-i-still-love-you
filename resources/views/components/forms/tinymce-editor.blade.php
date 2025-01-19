<form method="post" action="{{ route('messages.store') }}">
    @csrf
    <label for="myeditorinstance" class="text-white text-uppercase pt-md-2 pb-4 fw-bold">create message:</label>
    <p><a href="https://maps.google.com/pluscodes/">What is a Plus Code?</a> - Message editor has 255 characters limit</p>
    <div class="alert alert-dark" role="alert">
    <strong>Warning:</strong> Messages older than a month will be deleted
    </div>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-primary" role="alert">
                <strong>Warning:</strong> {{ $error }}
            </div>
        @endforeach
    @endif
    <div class="alert alert-light" role="alert" id="location-data-string">
        <span class="text-white location-data"></span>
    </div>
    <textarea name="message" id="myeditorinstance" maxlength="255">{{ old('message') }}</textarea>
    <input type="hidden" id="location" name="location" value="" />
    <button type="submit" class="btn btn-primary mt-2 mb-4">{{ __('Create') }}</button>
</form>

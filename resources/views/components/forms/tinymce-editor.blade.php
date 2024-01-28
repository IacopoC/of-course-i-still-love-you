<form method="post" action="{{ route('messages.store') }}">
    @csrf
    <textarea name="message" id="myeditorinstance" maxlength="255">{{ old('message') }}</textarea>
    <input type="hidden" id="location" name="location" value="" />
    <button type="submit" class="btn btn-light mt-2">{{ __('Create') }}</button>
    <div id="location-data-string" class="pt-4">
    <p class="d-inline">Where you are:</p><p class="text-white location-data d-inline"></p>
    </div>
</form>

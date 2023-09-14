<form method="post" action="{{ route('messages.store') }}">
    @csrf
    <textarea name="message" id="myeditorinstance" maxlength="255" placeholder="{{ __('What\'s on your mind?') }}">{{ old('message') }}</textarea>
    <button type="submit" class="btn btn-light mt-2">{{ __('Create') }}</button>
    <p class="pt-4 text-uppercase"><strong>Where you are:</strong></p><p class="text-white location-data"></p>
</form>

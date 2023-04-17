<form method="post" action="{{ route('messages.store') }}">
    @csrf
    <textarea name="message" id="myeditorinstance" maxlength="255" placeholder="{{ __('What\'s on your mind?') }}">{{ old('message') }}</textarea>
    <button type="submit" class="btn btn-light mt-2">{{ __('Create') }}</button>
</form>

@extends('layouts.app')

@section('title')
    Messages - Of Course I still love you
@endsection

@section('description')
    Write your message, read all your messages in the list.
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
            <div>
                <x-forms.tinymce-editor/>
            </div>
            @if(count($messages) > 1)
                <div class="row">
                    <div class="col-md-9">
                        <p class="text-white text-uppercase pt-5"><strong>your messages:</strong></p>
                    </div>
                </div>
            @endif
            @foreach ($messages as $message)
                <div class="row">
                <div class="col-2 col-md-1">
                    <div class="pt-4">
                    <img src="data:image/svg+xml;base64,{{ base64_encode($svgCode) }}" alt="avatar" class="img-fluid">
                    </div>
                </div>
            <div class="col-10 col-md-11">
                <div class="pt-4 pb-4">
                            <p class="text-white"><strong>{{ $message->user->name }}</strong> | {{ $message->created_at->format('j M Y, H:i') }}</p>
                            {!! $message->message !!}
                        @unless ($message->created_at->eq($message->updated_at))
                            <p class="text-white">- edited</p>
                        @endunless
                            <hr>
                            @if(!empty($message->location))<p class="text-white"> Where you are: {{ $message->location }} </p>@endif
                        @if ($message->user->is(auth()->user()))
                            <div class="d-inline">
                            <a href="{{ route('messages.edit', $message) }}"><button type="button" class="btn btn-secondary">Edit</button></a>
                            </div>
                                <form method="POST" class="d-inline" action="{{ route('messages.destroy', $message) }}">
                                @csrf
                                @method('delete')
                                    <button type="button" class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $message->id }}">Delete</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal-{{ $message->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Message</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to delete this Message?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="{{ route('messages.destroy', $message) }}">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                </form>
                        @endif
                </div>
            </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex pt-4">
            {!! $messages->links() !!}
        </div>
    </div>
@endsection

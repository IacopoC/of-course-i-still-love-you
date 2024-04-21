@extends('layouts.app')

@section('title')
    Updowns - Of Course I still love you
@endsection

@section('description')
    Write your short updown messages, read all your messages in the list.
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-white text-uppercase pt-md-5 fw-bold">create updown message:</p>
                <x-forms.updown-fields/>
                @isset($updowns)
                @foreach($updowns as $updown)
                    <div class="my-4">
                    <form method="post" action="{{ route('updowns.destroy', $updown) }}">
                        @csrf
                        @method('delete')
                        <div class="row">
                        <div class="col-2 col-md-1">
                            <div class="pt-2">
                                <img src="data:image/svg+xml;base64,{{ base64_encode($svgCode) }}" alt="avatar" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-10 col-md-11">
                            <p><strong>{{ $updown->user->name }}</strong> | {{ $updown->created_at->format('j M Y, H:i') }}</p>
                        <p>{{ $updown->updown_message }}</p>
                            @unless ($updown->created_at->eq($updown->updated_at))
                                <p class="text-white">- edited</p>
                            @endunless
                         <hr>
                        <div class="alert @if($updown->updown == 'Up') {{'alert-success'}} @else {{'alert-warning'}} @endif" role="alert">
                            This is a <strong>{{ $updown->updown }}</strong> message!
                        </div>
                            <div class="d-inline">
                                <a href="{{ route('updowns.edit', $updown) }}"><button type="button" class="btn btn-secondary">Edit</button></a>
                            </div>
                            <div class="d-inline">
                            <button type="button" class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $updown->id }}">Delete</button>
                            </div>
                        </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $updown->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Updown</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete this Updown message?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </form>
                    </div>
                @endforeach
                    <div class="d-flex pt-4">
                        {!! $updowns->links() !!}
                    </div>
                    @endisset
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (Auth::id() != $ticket->locked_by && $ticket->locked_till > time())
                    <div class="alert alert-warning">
                        Эта заявка редактируется пользователем
                        @foreach ($users as $user)
                            @if ($user->id == $ticket->locked_by)
                                {{ $user->name }}
                            @endif
                        @endforeach
                    </div>
                @else
                    <edit-ticket :ticket="{{ $ticket }}" :user-id={{Auth::id()}}></edit-ticket>
                @endif
            </div>
        </div>
    </div>
@endsection

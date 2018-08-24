@extends('layouts.app')

@section('content')

<div class="row">
    <div class="card col s12 m8 offset-m2">
        <h4>Edit Note</h4>
        <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="col s9" method="post" action="{{ route('edit_note', ['id'=> $id])}}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="edits" value="{{ $edits }}">
            <div class="input-field col s12">
                <i class="material-icons prefix">&#xe264</i>
                <input id="title" type="text" name="title" value="{{ $title }}" data-length="100" required>
                <label for="title">Edited Title</label>
                <span class="helper">{{ $errors->first('title') }}</span>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">&#xe865</i>
                <textarea id="note" name="note" class="materialize-textarea" data-length="255">{{ $note }}</textarea>
                <label for="note">Edited Note</label>
                <span class="helper">{{ $errors->first('note') }}</span>
            </div>
            <input type="submit" class="btn" value="Edit Note">
            <br><br>
        </form>
        </div>
    </div>
</div>
@endsection

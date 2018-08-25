@extends('layouts.app')

@section('content')

@if(Session::has('msgE'))
    <span class="helper">
        {{ Session::get('msgE') }}
    </span>
@endif

@if(Session::has('msgS'))
    <span class="helper_success">
        {{ Session::get('msgS') }}
    </span>
@endif

<div class="row">
    <div class="card col s12 m8 offset-m2">
        <h4>Add New Note</h4>
        <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="col s9" method="post" action="{{ route('new_note') }}">
            {{ csrf_field() }}
            <div class="input-field col s12">
                <i class="material-icons prefix">&#xe264</i>
                <input id="title" type="text" name="title" value="{{ old('title') }}" data-length="100" required>
                <label for="title">Title</label>
                <span class="helper">{{ $errors->first('title') }}</span>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">&#xe865</i>
                <textarea id="note" name="note" class="materialize-textarea" data-length="255">{{ old('note') }}</textarea>
                <label for="note">Note</label>
                <span class="helper">{{ $errors->first('note') }}</span>
            </div>
            <input type="submit" class="btn" value="Add Note">
            <br><br>
        </form>
        </div>
    </div>
</div>
    
<div class="row">
    <!--Note: My NOTES-->
    <h6 style="text-align:center;">Logged In As : {{ Auth::user()->name }}</h6>
    <table class="highlight striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date Created</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    @foreach($data as $d)
    <tbody>
        <tr>
        <td>---</td>
        <td>--</td>
        <td>-</td>
        <td>
            <a href="edit/{{ $d['id'] }}" class="btn success waves-effect" onclick="return confirm('Are You Sure You Want to Edit ?\n\n{{ $d['title'] }}');">Edit</a>
        </td>
        <td>
            <form method="post" action="delete/{{ $d['id'] }}">
                {{csrf_field()}}
                <input type="submit" class="btn success red" value="Delete" onclick="return confirm('Are You Sure You Want to Delete ?\n\n{{ $d['title'] }}');">
            </form>
        </td>
        </tr>
    </tbody>
    @endforeach
    </table>
</div>
@endsection

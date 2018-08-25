@extends('layouts.app')

@section('content')

<div class="row">
    <!--Note: My Deleted NOTES-->
    <h4 style="text-align:center;">Trash</h4>
    <h6 style="text-align:center;">Logged In As : {{ Auth::user()->name }}</h6>
    <table class="highlight striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date Created</th>
            <th>Restore</th>
        </tr>
    </thead>

    <?php $result = json_decode($data, true); ?>
    @foreach($data as $d)
    <tbody>
        <tr>
        <td>{{ $d['title'] }}</td>
        <td>{!! nl2br(e($d['note'])) !!}</td>
        <td>{{ $d['created_at'] }}</td>
        <td>
            <form method="post" action="restore/{{ $d['id'] }}">
                {{csrf_field()}}
                <input type="submit" class="btn success red" value="Restore">
            </form>
        </td>
        </tr>
    </tbody>
    @endforeach
    </table>
</div>
@endsection

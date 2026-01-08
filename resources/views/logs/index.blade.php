@extends('layouts.app')

@section('content')
<h4>Activity Logs</h4>

<table class="table table-bordered">
    <tr>
        <th>Action</th>
        <th>Description</th>
        <th>Time</th>
    </tr>
    @foreach($logs as $log)
    <tr>
        <td>{{ $log->action }}</td>
        <td>{{ $log->description }}</td>
        <td>{{ $log->created_at->diffForHumans() }}</td>
    </tr>
    @endforeach
</table>
@endsection

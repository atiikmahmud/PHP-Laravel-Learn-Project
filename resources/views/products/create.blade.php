@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <input class="form-control mb-2" name="name" placeholder="Name">
        <input class="form-control mb-2" name="price" placeholder="Price">
        <textarea class="form-control mb-2" name="description"></textarea>
        <button class="btn btn-success">Save</button>
    </form>
@endsection

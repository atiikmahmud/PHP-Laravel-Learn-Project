@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf @method('PUT')
        <input class="form-control mb-2" name="name" value="{{ $product->name }}">
        <input class="form-control mb-2" name="price" value="{{ $product->price }}">
        <textarea class="form-control mb-2" name="description">{{ $product->description }}</textarea>
        <button class="btn btn-success">Update</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf @method('PUT')
        <input class="form-control mb-2 @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}"
            placeholder="Name">

        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <input class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" placeholder="Price">

        @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <textarea class="form-control mb-2" name="description" placeholder="Description">{{ $product->description }}</textarea>

        <button class="btn btn-success">Update</button>
    </form>
@endsection

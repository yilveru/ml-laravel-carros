@extends('layouts.app')

@section('title', 'Edit car')

@section('content')
    <h1>Edit car: {{ $carro->brand }} {{ $carro->model }}</h1>

    <a href="{{ route('cars.index') }}" class="btn btn-secondary mb-3">Return</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cars.update', $carro->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control" id="brand" 
                   value="{{ old('brand', $carro->brand) }}" required>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" class="form-control" id="model" 
                   value="{{ old('model', $carro->model) }}" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" class="form-control" id="year" 
                   value="{{ old('year', $carro->year) }}" required>
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" name="color" class="form-control" id="color" 
                   value="{{ old('color', $carro->color) }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" id="price" 
                   value="{{ old('price', $carro->price) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection

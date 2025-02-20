@extends('layouts.app')

@section('title', 'Car detail')

@section('content')
    <h1>Car detail</h1>

    <a href="{{ route('cars.index') }}" class="btn btn-secondary mb-3">Return</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $carro->brand }} {{ $carro->model }}</h5>
            <p class="card-text"><strong>Year:</strong> {{ $carro->year }}</p>
            <p class="card-text"><strong>Color:</strong> {{ $carro->color }}</p>
            <p class="card-text"><strong>Price:</strong> ${{ number_format($carro->price, 2) }}</p>

            <a href="{{ route('cars.edit', $carro->id) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('cars.destroy', $carro->id) }}" method="POST" class="d-inline" 
                  onsubmit="return confirm('¿Are you sure delete this car?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection

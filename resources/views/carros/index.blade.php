@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Car list</h1>
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Create car</a>
    <table class="table">
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Color</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carros as $carro)
            <tr>
                <td>{{ $carro->brand }}</td>
                <td>{{ $carro->model }}</td>
                <td>{{ $carro->year }}</td>
                <td>{{ $carro->color }}</td>
                <td>{{ $carro->price }}</td>
                <td>
                    <a href="{{ route('cars.show', $carro->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('cars.edit', $carro) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('cars.destroy', $carro) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $carros->links() }}
</div>
@endsection

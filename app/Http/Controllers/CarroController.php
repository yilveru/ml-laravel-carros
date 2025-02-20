<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;


/**
 * @OA\Info(title="API to manage cars", version="1.0")
 */
class CarroController extends Controller
{
    /**
     * Display all cars
     *
     * @OA\Get(
     *     path="/api/cars",
     *     tags={"Cars"},
     *     summary="Display all cars",
     *     @OA\Response(response="200", description="Cars list")
     * )
     */
    public function index(Request $request)
    {
        $carros = Carro::paginate(10);

        if ($request->wantsJson()) {
            return response()->json($carros, 200);
        }

        return view('carros.index', compact('carros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carros.create');
    }

     /**
     * Store a newly created car in storage
     *
     * @OA\Post(
     *     path="/api/cars",
     *     tags={"Cars"},
     *     summary="Store new car",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"brand","model","year","color","price"},
     *             @OA\Property(property="brand", type="string", example="Toyota"),
     *             @OA\Property(property="model", type="string", example="Corolla"),
     *             @OA\Property(property="year", type="integer", example=2022),
     *             @OA\Property(property="color", type="string", example="Black"),
     *             @OA\Property(property="price", type="number", example=15000.00)
     *         )
     *     ),
     *     @OA\Response(response="201", description="Car created successfully"),
     *     @OA\Response(response="400", description="No valid data")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
    
        Carro::create($request->all());
        
        if ($request->wantsJson()) {
            return response()->json($carro, 201);
        }
        
        return redirect()->route('cars.index')->with('success', 'Created successfully.');
    }

    /**
     * Display specified car
     *
     * @OA\Get(
     *     path="/api/cars/{id}",
     *     tags={"Cars"},
     *     summary="Display one car",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del carro",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show car",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="brand", type="string", example="Toyota"),
     *             @OA\Property(property="model", type="string", example="Corolla"),
     *             @OA\Property(property="year", type="integer", example=2022),
     *             @OA\Property(property="color", type="string", example="black"),
     *             @OA\Property(property="price", type="number", format="float", example=15000.00)
     *         )
     *     ),
     *     @OA\Response(response=404, description="Car not found")
     * )
     */
    public function show(Request $request, string $id)
    {
        $carro = Carro::findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json($carro, 200);
        }

        return view('carros.show', compact('carro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $carro = Carro::findOrFail($id);
        return view('carros.edit', compact('carro'));
    }

    /**
     * Update specific car in storage
     *
     * @OA\Put(
     *     path="/api/cars/{id}",
     *     tags={"Cars"},
     *     summary="Update an existing car",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the car to update",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"brand","model","year","color","price"},
     *             @OA\Property(property="brand", type="string", example="Toyota"),
     *             @OA\Property(property="model", type="string", example="Corolla"),
     *             @OA\Property(property="year", type="integer", example=2022),
     *             @OA\Property(property="color", type="string", example="black"),
     *             @OA\Property(property="price", type="number", format="float", example=15000.00)
     *         )
     *     ),
     *     @OA\Response(response="200", description="Updated successfully"),
     *     @OA\Response(response="400", description="Invalid data"),
     *     @OA\Response(response="404", description="Car not found")
     * )
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
    
        $carro = Carro::findOrFail($id);
        $carro->update($request->all());

        if ($request->wantsJson()) {
            return response()->json($carro, 200);
        }

        return redirect()->route('cars.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified car from storage.
     *
     * @OA\Delete(
     *     path="/api/cars/{id}",
     *     tags={"Cars"},
     *     summary="Delete specific car",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the car to delete",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="Deleted successfully"),
     *     @OA\Response(response="404", description="Car not found")
     * )
     */
    public function destroy(Request $request, string $id)
    {
        $carro = Carro::findOrFail($id);
        $carro->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Deleted successfully'], 204);
        }

        return redirect()->route('cars.index')->with('success', 'Deleted successfully.');
    }
}

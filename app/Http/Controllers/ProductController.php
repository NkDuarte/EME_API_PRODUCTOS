<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * * |-> Ver todos los productos registrados
     */
    public function index()
    {
        $products = Products::all();
        
        return response()->json([ 
            'success' => true, 
            'message' => 'Busqueda exitosa!', 
            'data' => $products,
            'token' => csrf_token()
        ], 200);
    }

    /**
     * * |-> Creacion de un producto nuevo
     */
    public function store(Request $request)
    {
        //* |-> Validamos que existan los campos requeridos y en el formato que se esperan
        $validate_data = $request->validate(([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]));

        //* |-> Instanciamos el modelo para la creacion
        $product = Products::create($validate_data);
        //* |-> Retornamos la respuesta al cliente que hace la peticion
        return response()->json([
            'success' => true,
            'message' => 'Producto creado exitosamente!',
            'data' => $product
        ], 201);
    }

    /**
     * * |-> Ver un producto unico por su id
     */
    public function show(string $id)
    {
        //* |-> Instanciamos el modelo para la consulta
        $product = Products::find($id);
        //* |-> Si no encuentra ningun resultado retornamos un error 404
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Producto no encontrado'
            ], 404);
        }

        //* |-> Si encuentra un resultado respndemos 200 + data
        return response()->json([
            'success' => true,
            'message' => 'Busqueda exitosa!',
            'data' => $product
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //* |-> Instanciamos el modelo de Products
        $product = Products::find($id);
        //* |-> Si no encuentra un resultado retornamos un error 404 y no continuamos con la actualizacion
        if (!$product) {
            return response()->json([
                'success' => true,
                'message' => 'Producto no encontrado'
            ], 404);
        }
        //* |-> Si existe validamos los campos que son requeridos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        //* |-> Instanciamos el modelo actual y actualizamos
        $product->update($validatedData);
        //* |-> Retornamos un mensaje de exito 200
        return response()->json([
            'success' => true,
            'message' => 'Se actualizo correctamente el producto ' . $product->name,
            'data' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //* |-> Instanciamos el modelo de Products
        $product = Products::find($id);
        //* |-> Si no encuentra un resultado retornamos un error 404 y no continuamos con la actualizacion
        if (!$product) {
            return response()->json([
                'success' => true,
                'message' => 'Producto no encontrado'
            ], 404);
        }
        //* |-> Instanciamos el modelo existente y eliminamos
        $product->delete();
        //* |-> Retornamos un mensaje de exito 200
        return response()->json([
            'success' => true,
            'message' => 'Se elimino correctamente el producto ' . $product->name,
            'data' => $product
        ], 200);
    }
}

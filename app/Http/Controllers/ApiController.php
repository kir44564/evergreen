<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
class ApiController extends Controller
{
    public function index()
    {
        $utenti = User::all();
        return response()->json($utenti);
    }

    public function show($id)
    {
        $utenti = User::find($id);
        if(!$utenti){
        return response()->json(['error' => 'Utenti non trovati'], 404);
        } return response()->json($utenti);
    }

    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
            ]);
            $validated['password'] = bcrypt($validated['password']);
            $utenti = User::create($validated);
            return response()->json($utenti, 201);
        } catch (ValidationException $e) {
                return response()->json(['error' => $e->errors()], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $utenti = User::find($id);
        if (!$utenti) {
            return response()->json(['error' => 'User not found'], 404);
        }
        try {
            $validated = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|email|unique:users,email,' . $id,
                'password' => 'sometimes|required|string|min:6',
            ]);
            if (isset($validated['password'])) {
                $validated['password'] = bcrypt($validated['password']);
            }
            $utenti->update($validated);
            return response()->json($utenti, 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function destroy($id)
    {
        $utenti = User::find($id);
        if (!$utenti) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $utenti->delete();
        return response()->json(null, 204);
    }
}
//
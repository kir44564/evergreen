<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

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
        if (!$utenti) {
            Log::warning('Utenti non trovati', ['id' => $id]);
            return response()->json(['error' => 'Utenti non trovati'], 404);
        }
        return response()->json($utenti);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
            ]);
            $validated['password'] = bcrypt($validated['password']);
            $utenti = User::create($validated);
            return response()->json($utenti, 201);
        } catch (ValidationException $e) {
            Log::info('Validation failed', ['errors' => $e->errors()]);
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Errore nella creazione utente', ['exception' => $e]);
            return response()->json(['error' => 'Errore interno del server'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $utenti = User::find($id);
        if (!$utenti) {
            Log::warning('Utenti non trovati per update', ['id' => $id]);
            return response()->json(['error' => 'Utenti non trovati'], 404);
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
            Log::info('Validation failed on update', ['errors' => $e->errors()]);
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Errore nell\'aggiornamento utente', ['exception' => $e]);
            return response()->json(['error' => 'Errore interno del server'], 500);
        }
    }

    public function destroy($id)
    {
        $utenti = User::find($id);
        if (!$utenti) {
            Log::warning('Utenti non trovati per delete', ['id' => $id]);
            return response()->json(['error' => 'Utenti non trovati'], 404);
        }
        try {
            $utenti->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            Log::error('Errore nella cancellazione utente', ['exception' => $e]);
            return response()->json(['error' => 'Errore interno del server'], 500);
        }
    }
}
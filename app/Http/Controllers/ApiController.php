<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        return response()->json($utenti);
    }

    public function store(Request $request)
    {
        $utenti = User::create($request->all());
        return response()->json($utenti, 201);
    }

    public function update(Request $request, $id)
    {
        $utenti = User::find($id);
        $utenti->update($request->all());
        return response()->json($utenti, 200);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(null, 204);
    }
}

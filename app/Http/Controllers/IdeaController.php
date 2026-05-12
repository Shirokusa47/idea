<?php

namespace App\Http\Controllers;

use App\IdeaStatus;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtenemos el usuario autenticado
        $user = auth()->user();

        // Obtenemos el status del query string (?status=pending)
        $status = request('status');

        // Si el status no es válido lo ignoramos
        if (! in_array($status, IdeaStatus::values())) {
            $status = null;
        }

        // Consulta con filtro opcional
        $ideas = $user->ideas()
            ->when($status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->get();

        // Contamos cuántas ideas hay por cada status
        // Ejemplo: ['pending' => 3, 'in_progress' => 1, 'completed' => 0]
        $statusCounts = Idea::statusCounts($user);

        return view('ideas.index', [
            'ideas' => $ideas,
            'statusCounts' => $statusCounts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

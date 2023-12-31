<?php

namespace App\Http\Controllers\Crater\General;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\NotesRequest;
use App\Models\Crm\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?? 10;

        $notes = Note::latest()
            ->applyFilters($request->only(['type', 'search']))
            ->paginate($limit);

        return response()->json([
            'notes' => $notes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotesRequest $request)
    {
        $note = Note::create($request->validated());

        return response()->json([
            'note' => $note,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Crm\Note $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return response()->json([
            'note' => $note,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Crm\Note $note
     * @return \Illuminate\Http\Response
     */
    public function update(NotesRequest $request, Note $note)
    {
        $note->update($request->validated());

        return response()->json([
            'note' => $note,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Crm\Note $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}

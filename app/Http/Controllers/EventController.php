<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Event::paginate(5);
        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul_event' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'penyelenggara' => 'required',
            'deskripsi' => 'nullable',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Event::create($request->all());
        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
        $request->validate([
            'judul_event' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'penyelenggara' => 'required',
            'deskripsi' => 'nullable',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $event->update($request->all());
        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus.');
    }

    public function deleted()
    {
        $events = Event::onlyTrashed()->paginate(5);
        return view('event.deleted', compact('events'));
    }

    public function restore($id)
    {
        $event = Event::withTrashed()->findOrFail($id);
        $event->restore();
        return redirect()->route('events.deleted')->with('success', 'Event berhasil dipulihkan.');
    }
}

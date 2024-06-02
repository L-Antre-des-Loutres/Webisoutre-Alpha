<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.tickets-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.index')
                        ->with('success', 'Ticket created successfully.');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.tickets-show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.tickets-edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')
                        ->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')
                        ->with('success', 'Ticket deleted successfully.');
    }
}

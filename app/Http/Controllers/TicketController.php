<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{
    public function edit(int $id)
    {
        $ticket = Ticket::where('id', $id)->first();
        $ticket->spent_time = gmdate("H:i:s", $ticket->spent_time);

        return view('tickets/edit', array(
            'ticket' => $ticket,
            'users' => User::all(),
        ));
    }

    public function create(Request $request)
    {
        $ticket = Ticket::create($request->all());
        return response()->json($ticket);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        Ticket::where('id', $data['id'])->update($request->all());
    }

    public function lock(Request $request)
    {
        $ticket = Ticket::where('id', $request->get('ticketId'))->first();
        $ticket->update([
            'locked_till' => time() + 3,
            'locked_by' => $request->get('userId'),
            'spent_time' => $ticket->spent_time + 1,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Public area tickets page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('public/index', array(
            'tickets' => Ticket::paginate(20),
        ));
    }
}

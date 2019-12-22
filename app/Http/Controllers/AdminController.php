<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('admin/index', array(
            'tickets' => Ticket::when(!empty($request->get('type')), function($query) use ($request) {
                return $query->where('type', $request->get('type'));
            })->when(!empty($request->get('priority')), function($query) use ($request) {
                return $query->where('priority', $request->get('priority'));
            })->orderBy('id', 'DESC')->paginate(20),
        ));
    }
}

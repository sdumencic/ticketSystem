<?php

namespace TicketSystem\Http\Controllers;

use Illuminate\Http\Request;
use TicketSystem\Post;

class PagesController extends Controller
{
    public function index() {
        $title = 'Welcome to our ticket system';
        $lastTicket = Post::latest()->first();
        $openTickets = Post::where('status', 'open')->count();
        $closedTickets = Post::where('status', 'closed')->count();
        $reviewTickets = Post::where('status', 'in review')->count();
        $progressTickets = Post::where('status', 'in progress')->count();
        return view('pages.index', ['title'=>$title, 'lastTicket'=>$lastTicket, 'openTickets'=>$openTickets, 'closedTickets'=>$closedTickets, 'progressTickets'=>$progressTickets, 'reviewTickets'=>$reviewTickets]);
    }

    public function about() {
        $title = 'About us';
        return view('pages.about')->with('title', $title);
    }

    public function services() {
        $data = array(
            'title' => 'Services',
            'services' => ['1', '2', '3']
        );
        return view('pages.services')->with($data);
    }
}
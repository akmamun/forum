<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth')->only(['create', 'store']);
    }


    public function index(Channel $channel)
    {

       if ($channel->exists)
       {
           $threads = $channel->threads()->latest()->get();
           dd($channel);

       }
       else
       {
           $threads = Thread::latest()
               ->filter(request()->only(['month', 'year']))
               ->get();

           $archives = Thread::selectRaw('year (created_at) year, monthname(created_at) month , count(*) published')
               ->groupBy('year', 'month')
               ->orderByRaw('min(created_at)desc')
               ->get()
               ->toArray();
       }

        return view('threads.index', compact('threads','archives'));

    }


    public function create()
    {
        return view('threads.create');
    }


    public function store(Request $request)
    {

        $this->validate($request, [

            'title' => 'required',
            'body' => 'required',
            'channel_id' => 'required|exists:channels,id'  //channel id goes to channel table

        ]);

        $thread = Thread::create([

            'user_id' => auth()->id(),
            'channel_id' => request('channel_id'),
            'title' => request('title'),
            'body' => request('body'),

        ]);

        return redirect($thread->path());


    }


    public function show($channelId, Thread $thread)
    {
        return view('threads.show', compact('thread'));
    }

//    public function show(Thread $thread)
//    {
//        return view('threads.show', compact('thread'));
//    }

    public function edit(Thread $thread)
    {
        //
    }


    public function update(Request $request, Thread $thread)
    {
        //
    }


    public function destroy(Thread $thread)
    {
        //
    }
}

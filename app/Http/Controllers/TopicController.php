<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::all();

        return view('topics.index') -> with('topics',$topics);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'title' => ['required','string','max:255'],
            'subject_id' => ['required','exists:subjects,id']
        ]);

        Topic::create(['title' => $request->title,'subject_id' => $request->subject_id]);

        return redirect('/subjects/'. $request->subject_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $topic = Topic::find($id);
          return view('topics.show')
              ->with('topic', $topic);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::find($id);

        return view ('topics.edit') -> with('topic',$topic);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $request->validate([
            'title' => ['required','string','max:255'],
        ]);
        
            // store
            $topic = Topic::find($id);
            $topic->title = $request->title;
            $topic->save();

            // redirect
            session()->flash('message', 'Successfully updated topic!');
            return redirect('topics');
        }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

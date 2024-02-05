<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('subjects.index') -> with('subjects',$subjects);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'title' => ['required','string','max:255']
        ]);

        Subject::create(['title' => $request->title]);

        return redirect('/subjects');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $subject = Subject::find($id);
          return view('subjects.show')
              ->with('subject', $subject);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = Subject::find($id);

        return view ('subjects.edit') -> with('subject',$subject);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $request->validate([
            'title' => ['required','string','max:255']
        ]);
        
            // store
            $subject = Subject::find($id);
            $subject->title = $request->title;
            $subject->save();

            // redirect
            session()->flash('message', 'Successfully updated subject!');
            return redirect('subjects');
        }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

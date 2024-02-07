<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $problems = Problem::all();

        return view('problems.index') -> with('problems',$problems);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('problems.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'title' => ['required','string','max:255'],
            'language' => ['required','string'],
            'topic_id' => ['required','exists:topics,id'],
            'difficulty' => ['required','in:easy,medium,hard'],
            'description' => ['required'],
            'solution' => ['required'],
            'inputs' => ['required']
        ]);

        
         $output = Http::post('http://127.0.0.1:3000/echo',[
             'lang' => $request->language,
             'code' => base64_encode($request->solution),
             'inputs' => $request->inputs,
             '_token' => csrf_token()
         ])['output'];

        //$output = json_encode([3,5]);

        Problem::create([
            'title' => $request->title,
            'language' => $request -> language,
            'topic_id' => $request->topic_id,
            'difficulty' => $request->difficulty,
            'description' => $request->description,
            'solution' => $request->solution,
            'inputs' => $request->inputs,
            'outputs' => json_encode($output)
        ]);

        return redirect('/topics/'.$request->topic_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $problem = Problem::find($id);

        return view('problems.show') -> with('problem',$problem);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $problem = Problem::find($id);

        return view('problems.edit') -> with('problem',$problem);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required','string','max:255'],
            'language' => ['required','string'],
            'topic_id' => ['required','exists:topics,id'],
            'difficulty' => ['required','in:easy,medium,hard'],
            'description' => ['required','text'],
            'solution' => ['required','text'],
            'inputs' => ['required','json'],
            'outputs' => ['required','json']
        ]);

        $problem = Problem::find($id);
        $problem->title = $request->title;
        $problem->language = $request->language;
        $problem->topic_id = $request->topic_id;
        $problem->difficulty = $request->difficulty;
        $problem->description = $request->description;
        $problem->solution = $request->solution;
        $problem->inputs = $request->inputs;
        $problem->outputs = $request->outputs;
        $problem->save();

        // redirect
        session()->flash('message', 'Successfully updated problem!');
        return redirect('/topics/'.$request->topic_id);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

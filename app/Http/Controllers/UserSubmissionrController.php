<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\UserSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class UserSubmissionrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submissions = UserSubmission::all();

        return view('user_submissions.index') -> with('submissions',$submissions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'problem_id' => ['required',
            Rule::exists('problem_user','problem_id')->where('user_id',Auth::id())],
            'solution' => 'required'        
        ]);

        $problem = Problem::find($request->problem_id);

        $user_output = Http::post('http://127.0.0.1:3000/echo',[
            'lang' => $problem->language,
            'code' => base64_encode($request->solution),
            'inputs' => $problem->inputs,
            '_token' => csrf_token()
        ])['output'];

        $correct_output = json_decode($problem->outputs);
        $output_length = count($correct_output);
        $correct_outputs = 0;

        $details = [];

        for ($i = 0; $i < $output_length; $i++) {
            if ($user_output[$i] == $correct_output[$i]){
                $correct_outputs++;
                $details[] = "Test $i passed.";
            }
            else {
                $details[] = "Test $i failed";
            }
        }

        $score = round($correct_outputs/$output_length * 100);

        UserSubmission::create([
           'user_id' => Auth::id(),
           'problem_id' => $request->problem_id,
           'solution' => $request->solution,
           'score' => $score,
           'details' => json_encode($details) 
        ]);

        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

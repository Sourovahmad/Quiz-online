<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\option;
use App\Models\question;
use App\Models\questionAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $date = now()->format('Y-m-d');
        if(! is_null($request->date)){
            $date = $request->date;
        }
        $questions= question::where('date',$date)->get();
        return view('admin.question.index',compact('questions','date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('admin.question.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'level' => 'required',
            'date' => 'required',
            'answer_no' => 'required',
        ]);
        if( !(!is_null($request->question) || !is_null($request->question_image) || !is_null($request->question_video)) ){
            $request->validate([
                'question / question image / question video' => 'required',
            ]);
        }
        if( !(!is_null($request->option_a) || !is_null($request->option_a_image) || !is_null($request->option_a_video)) ){
            $request->validate([
                'option a / option a image / option a video' => 'required',
            ]);
        }
        if( !(!is_null($request->option_b) || !is_null($request->option_b_image) || !is_null($request->option_b_video)) ){
            $request->validate([
                'option b / option b image / option b video' => 'required',
            ]);
        }
        if( !(!is_null($request->option_c) || !is_null($request->option_c_image) || !is_null($request->option_c_video)) ){
            $request->validate([
                'option c / option c image / option c video' => 'required',
            ]);
        }
        if( !(!is_null($request->option_d) || !is_null($request->option_d_image) || !is_null($request->option_d_video)) ){
            $request->validate([
                'option d / option d image / option d video' => 'required',
            ]);
        }
        if( !(!is_null($request->answer) || !is_null($request->answer_image) || !is_null($request->answer_video)) ){
            $request->validate([
                'answer / answer image / answer video' => 'required',
            ]);
        }

        $question = new question;
        $option_a = new option;
        $option_b = new option;
        $option_c = new option;
        $option_d = new option;
        $answer = new questionAnswer;

        ////////////////////////// Question ////////////////////////////////
        $question->category_id = $request->category;
        $question->level = $request->level;
        $question->date = $request->date;
        $question->question = $request->question;
        if(! is_null($request->question_image)){
            $imageName = time().$request->question_image->getClientOriginalName();  
            $request->question_image->move(public_path('images/admin'), $imageName);
            $question->image = 'images/admin/'.$imageName;
            
        }
        if(! is_null($request->question_video)){
            
            $videoName = time().$request->question_video->getClientOriginalName();  
            $request->question_video->move(public_path('videos/admin'), $videoName);
            $question->video = 'videos/admin/'.$videoName;
        }
        $question->save();

        ////////////////////////// option a ////////////////////////////////
        $option_a->question_id = $question->id;
        $option_a->option = $request->option_a;
        $option_a->option_no = 'A';
        if(! is_null($request->option_a_image)){

            $imageName = time().$request->option_a_image->getClientOriginalName();  
            $request->option_a_image->move(public_path('images/admin'), $imageName);
            $option_a->image = 'images/admin/'.$imageName;
            
        }
        if(! is_null($request->option_a_video)){
            
            $videoName = time().$request->option_a_video->getClientOriginalName();  
            $request->option_a_video->move(public_path('videos/admin'), $videoName);
            $option_a->video = 'videos/admin/'.$videoName;
        }
        $option_a->save();

        ////////////////////////// option b ////////////////////////////////
        $option_b->question_id = $question->id;
        $option_b->option = $request->option_b;
        $option_b->option_no = 'B';
        if(! is_null($request->option_b_image)){

            $imageName = time().$request->option_b_image->getClientOriginalName();  
            $request->option_b_image->move(public_path('images/admin'), $imageName);
            $option_b->image = 'images/admin/'.$imageName;
            
        }
        if(! is_null($request->option_b_video)){
            
            $videoName = time().$request->option_b_video->getClientOriginalName();  
            $request->option_b_video->move(public_path('videos/admin'), $videoName);
            $option_b->video = 'videos/admin/'.$videoName;
        }
        $option_b->save();

        ////////////////////////// option c ////////////////////////////////
        $option_c->question_id = $question->id;
        $option_c->option = $request->option_c;
        $option_c->option_no = 'C';
        if(! is_null($request->option_c_image)){

            $imageName = time().$request->option_c_image->getClientOriginalName();  
            $request->option_c_image->move(public_path('images/admin'), $imageName);
            $option_c->image = 'images/admin/'.$imageName;
            
        }
        if(! is_null($request->option_c_video)){
            
            $videoName = time().$request->option_c_video->getClientOriginalName();  
            $request->option_c_video->move(public_path('videos/admin'), $videoName);
            $option_c->video = 'videos/admin/'.$videoName;
        }
        $option_c->save();

        ////////////////////////// option d ////////////////////////////////
        $option_d->question_id = $question->id;
        $option_d->option = $request->option_d;
        $option_d->option_no = 'D';
        if(! is_null($request->option_d_image)){

            $imageName = time().$request->option_d_image->getClientOriginalName();  
            $request->option_d_image->move(public_path('images/admin'), $imageName);
            $option_d->image = 'images/admin/'.$imageName;
            
        }
        if(! is_null($request->option_d_video)){
            
            $videoName = time().$request->option_d_video->getClientOriginalName();  
            $request->option_d_video->move(public_path('videos/admin'), $videoName);
            $option_d->video = 'videos/admin/'.$videoName;
        }
        $option_d->save();


        ////////////////////////// answer ////////////////////////////////
        $answer->question_id = $question->id;
        $answer->answer = $request->answer;
        $answer->option_no = $request->answer_no;
        if(! is_null($request->answer_image)){

            $imageName = time().$request->answer_image->getClientOriginalName();  
            $request->answer_image->move(public_path('images/admin'), $imageName);
            $answer->image = 'images/admin/'.$imageName;
            
        }
        if(! is_null($request->answer_video)){
            
            $videoName = time().$request->answer_video->getClientOriginalName();  
            $request->answer_video->move(public_path('videos/admin'), $videoName);
            $answer->video = 'videos/admin/'.$videoName;
        }
        $answer->save();


        return redirect()->back()->withSuccess('Question Created');






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        foreach($question->options as $option){
            $option->delete();
        }
        $question->answer->delete();
        $question->delete();
        return redirect()->back()->withErrors('Question Deleted');

    }
}

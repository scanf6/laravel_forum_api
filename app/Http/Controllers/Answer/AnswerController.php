<?php

namespace App\Http\Controllers\Answer;

use App\Models\Answer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'body' => 'required',
            'post_id' => 'required'
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $answer = Answer::create($data);

        return response()->json([
            'data' => $answer
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * Show the answers for a Post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postAnswers($post_id)
    {
        $elems_per_page = 3;
        $answers = Answer::with('user')->orderBy('id', 'DESC')->where('post_id', $post_id)->paginate($elems_per_page);
        return response()->json(['data' => $answers], 200);
    }
}

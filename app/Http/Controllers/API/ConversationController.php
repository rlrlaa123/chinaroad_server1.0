<?php

namespace App\Http\Controllers\API;

use App\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversations = Conversation::all();
        return response($conversations);
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
        $conversation = new Conversation($request->all());
        $conversation->save();
        return response($conversation, 200);
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

    public function step1($category_id, $conversation_id)
    {
        $conversation = Conversation::find($conversation_id);

        $conversation->image1 = URL::to('/') . '/' . $conversation->image1;
        $conversation->image2 = URL::to('/') . '/' . $conversation->image2;
        $conversation->video1 = URL::to('/') . '/' . $conversation->video1;
        $conversation->video2 = URL::to('/') . '/' . $conversation->video2;

        for($i = 1; $i <= 10; $i++) {
            $conv = 'audio' . $i;
            $conversation->$conv = URL::to('/') . '/' . $conversation->$conv;
        }

        return response($conversation);
    }

    public function step3($category_id, $conversation_id)
    {
        $conversation = DB::table('conversations')->select(
            'video2',
            'video3',
            'video4',
            'video5',
            'video6',
            'video7',
            'video8',
            'video9',
            'video10',
            'video11',
            'video12',
            'video13',
            'video14',
            'video15',
            'video16',
            'video17',
            'video18',
            'video19',
            'video20',
            'video21'
        )->where('id', $conversation_id)->first();

        for ($i = 2; $i < 21; $i++) {
            $video = 'video' . $i;
            if ($conversation->$video) {
                $conversation->$video = URL::to('/') . '/' . $conversation->$video;
            }
        }

        return response(json_encode($conversation));
    }
}

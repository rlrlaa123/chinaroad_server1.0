<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;

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

        return view('Conversation.index', compact('conversations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Conversation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'level' => 'required',
            'image' => 'required',
        ]);

        $validator->after(function () {
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('image')) {
            if (!file_exists('images')) {
                File::makeDirectory('images');
                if(!file_exists('images/conversations')) {
                    File::makeDirectory('images/conversations');
                }
            }

            $conversation = $request->file('image');
            $conversation_name = 'conversation' . time() . '.' . $conversation->getClientOriginalExtension();
            $destinationPath_conversation = public_path('images/conversations/');
            $conversation->move($destinationPath_conversation, $conversation_name);
        }

        $conversation = new Conversation;

        $conversation->title = $request->title;
        $conversation->level = $request->level;
        if($request->has('description')) {
            $conversation->description = $request->description;
        }
        if($request->has('image')) {
            $conversation->image = 'images/conversations/' . $conversation_name;
        }
        $conversation->save();

        return redirect('admin/conversation');
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
        $conversation = Conversation::find($id);

        return view('Conversation.edit', compact('conversation'));
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
        if ($request->hasFile('image')) {
            if (!file_exists('images')) {
                File::makeDirectory('images');
                if(!file_exists('images/conversations')) {
                    File::makeDirectory('images/conversations');
                }
            }
            $conversation = Conversation::find($id);

            if($conversation->image != null) {
                File::delete($conversation->image);
            }

            $conversation = $request->file('image');
            $conversation_name = 'conversation' . time() . '.' . $conversation->getClientOriginalExtension();
            $destinationPath_conversation = public_path('images/conversations/');
            $conversation->move($destinationPath_conversation, $conversation_name);
        }

        Conversation::where('id', $id)->update([
            'title' => $request->title,
            'level' => $request->level,
        ]);

        if($request->has('description')) {
            Conversation::where('id', $id)->update([
                'description' => $request->description,
            ]);
        }
        if($request->has('image')) {
            Conversation::where('id', $id)->update([
                'image' => 'images/conversations/' . $conversation_name,
            ]);
        }

        return redirect('admin/conversation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conversation = Conversation::find($id);

        File::delete($conversation->image);

        $conversation->delete();

        return response('success', 200);
    }
}
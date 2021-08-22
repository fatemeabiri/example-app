<?php

namespace App\Http\Controllers\admin\emoji;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmojiRequest;
use App\Models\Emoji;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class EmojiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Admin do crud for emoji
    //only admin do
    public function __construct()
    {
//        $this->middleware(['auth','admin']);
    }


    public function index()
    {

        $emojies= Emoji::all();
        return view('admin.emoji.index',['emojies'=>$emojies]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.emoji.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmojiRequest $request)
    {
        //
        $reqvalid= $request->validated();

        Emoji::create([
            'emoji_name'=>$reqvalid['emoji_name'],
            'emoji_shape'=>$reqvalid['emoji_shape'],
            'emoji_weight'=>$reqvalid['emoji_weight'],
        ]);
        return redirect('/admin/emojis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emoji  $emoji
     * @return \Illuminate\Http\Response
     */
//    public function show(Emoji $emoji)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emoji  $emoji
     * @return \Illuminate\Http\Response
     */
    public function edit(Emoji $emoji)
    {
        //
        return view('admin.emoji.edit',['emoji'=>$emoji]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emoji  $emoji
     * @return \Illuminate\Http\Response
     */
    public function update(EmojiRequest $request, Emoji $emoji)
    {
        //
        $validated_data=$request->validated();
        $emoji->update($validated_data);
        return redirect('/admin/emojis');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emoji  $emoji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emoji $emoji)
    {
        //
        $emoji->delete();
        return redirect()->back();
    }

}

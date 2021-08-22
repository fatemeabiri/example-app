<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmotionRequest;
use App\Models\Emoji;
use App\Models\Emotion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EmotionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth')->only(['create']);
        //I use POLICY
    }
    public function index(){
        $emojies= Emoji::all();//send for header
        $emotions=Emotion::all()->sortByDesc('emotion_date');
        return view('site.emotion.index',['emotions'=>$emotions,'emojies'=>$emojies]);
    }
    public function showByEmojiKey($emoji_key)
    {
        $emoji = Emoji::find($emoji_key);
//        dd($emoji->emotions());
        if(!empty($emoji->emotions()))
           $emotions=$emoji->emotions()->get()->sortByDesc('emotion_date');;
        $emojies= Emoji::all();//send for header
        return view('site.emotion.showbyemoji', ['emotions' => $emotions,'emojies'=>$emojies]);
    }

    public function edit(Emotion $emotion){
        if (! Gate::allows('update-emotion', $emotion))
            abort(403);

        return view('site.emotion.edit',['emotion'=>$emotion]);
    }
    public function update(EmotionRequest $request,Emotion $emotion){

        if (! Gate::allows('restore-emotion', $emotion))
            abort(403);

            $validated_data=$request->validated();
        $emotion->update([
            'emotion_title'=>$validated_data['emotion_title'],
            'emotion_text'=>$validated_data['emotion_text'],
            'emotion_date'=>now(),
            ]);

        return redirect('/emotions/' .$emotion->emoji->emoji_key);
    }
    public function create($emojikey)
    {
        if (! Gate::allows('create-emotion'))
            abort(403);
        $emoji=Emoji::findorfail($emojikey);
        return view('site.emotion.create',['emoji'=>$emoji]);

    }
    public function store(EmotionRequest $request){
        if (! Gate::allows('create-emotion'))
            abort(403);

        $validated_data=$request->validated();
        $id=Auth::id();
        Emotion::create([
            'emoji_key'=> $request->input('emoji_key'),
            'user_id'=>$id,
            'emotion_title'=>$validated_data['emotion_title'],
            'emotion_text'=>$validated_data['emotion_text'],
            'emotion_date'=>now(),

        ]);
       return redirect('/emotions/'.$request->input('emoji_key'));
    }
    public function destroy(Emotion $emotion)
    {
        //
//        dd($emotion);
        $emojikey=$emotion->emoji_key;
        if (! Gate::allows('destroy-emotion',$emotion))
            abort(403);
        $emotion->delete();
        return redirect('/emotions/'.$emojikey);

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function create(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name_comment' => 'required|string',
            'body' => 'required|string'
        ]);

        if ($validate->fails()){
            return \response()->json($validate->errors());
        }


        $com = Comment::create([
            'user_id' => $request->user()->id,
            'post_id' => $id,
            'name_comment' => $request->name_comment,
            'body' => $request->body
        ]);
        return response()->json($com);
    }
    public function show($id)
    {
        return Comment::where('post_id','=',$id)->get();
    }
    public function govno(){
        return Comment::all();
    }
    public function update(Request $request, $id)
    {
        $com = Comment::find($id);

        if ($com->user_id !== $request->user()->id) {
            return response()->json(['message'=>'access denide'],403);
        }
        $com->update($request->all());
        return $com;
    }
    public function destroy($id)
    {
        return Comment::destroy($id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use App\Reply;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>'store']);
        $this->middleware('owned', ['only'=>'destroy']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\ReplyRequest $request)
    {
        Auth::user()->replies()->save(new Reply($request->all()));

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $reply = Reply::findOrFail($id);

        $reply->delete();

        return Redirect::back();
    }
}

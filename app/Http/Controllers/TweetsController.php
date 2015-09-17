<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Tweet;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TweetsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
        $this->middleware('owned', ['only'=>['update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $tweets = Tweet::latest()->get();

        return view('tweets.index', compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\TweetRequest $request)
    {
        Auth::user()->tweets()->save(new Tweet($request->all()));

        return redirect('tweets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  Article $article
     * @return Response
     */
    public function show(Tweet $tweet)
    {
        return view('tweets.show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Tweet $tweet)
    {
        return view('tweets.edit', compact('tweet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\TweetRequest $request, Tweet $tweet)
    {
        $tweet->update($request->all());

        return redirect('tweets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return redirect('tweets');
    }
}

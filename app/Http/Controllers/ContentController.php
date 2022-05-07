<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;

class ContentController extends Controller
{
    /**
     * contents overview
     *
     * @return Content[]\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Content::orderByDesc('uuid')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContentRequest $request)
    {
        $content = Content::create($request->all());

        return $content ? response()->json($content, 201) : response()->json([], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContentRequest  $request
     * @param  \App\Models\Model\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContentRequest $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}

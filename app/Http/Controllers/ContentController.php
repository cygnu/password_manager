<?php

namespace App\Http\Controllers;

use App\Http\Request\TaskRequest;
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
        return Content::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
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
    public function update(ContentRequest $request, Content $content)
    {
        $content->content_name = $request->content_name;
        $content->content_image = $request->content_image;
        $content->content_url = $request->content_url;
        $content->is_one_account = $request->is_one_account;
        $content->is_paid_subscription = $request->is_paid_subscription;

        return $content->update() ? response()->json($content) : response()->json([], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        return $content->delete() ? response()->json($content, 201) : response()->json([], 500);
    }
}

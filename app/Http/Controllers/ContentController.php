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
     */
    public function getAllContents()
    {
        $contents = Content::orderByDesc('updated_at')->paginate(20);

        return response($contents, 200);
    }

    public function createContent(Request $request)
    {
        $content = new Content;
        $content->content_name = $request->content_name;
        $content->content_image = $request->content_image;
        $content->content_url = $request->content_url;
        $content->is_one_account = $request->is_one_account;
        $content->is_paid_subscription = $request->is_paid_subscription;
        $content->save();

        return response()->json([
            "message" => "Content record created"
        ], 201);
    }

    public function getContent($content_id)
    {
        if (Content::where('content_id', $content_id)->exists()) {
            $content = Content::where('content_id', $content_id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($content, 200);
        } else {
            return response()->json([
              "message" => "Content not found"
            ], 404);
        }
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

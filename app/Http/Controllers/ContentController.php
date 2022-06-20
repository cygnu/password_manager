<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentRequest;
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

    public function createContent(ContentRequest $request)
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

    public function updateContent(ContentRequest $request, $content_id)
    {
        if (Content::where('content_id', $content_id)->exists()) {
            $content = Content::find($content_id);
            $content->content_name = is_null($request->content_name) ? $content->content_name : $request->content_name;
            $content->content_image = $request->content_image;
            $content->content_url = is_null($request->content_url) ? $content->content_url : $request->content_url;
            $content->is_one_account = $request->is_one_account;
            $content->is_paid_subscription = $request->is_paid_subscription;
            $content->save();

            return response()->json([
                "message" => "Records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Content not found"
            ], 404);
        }
    }

    public function deleteContent($content_id)
    {
        if(Content::where('content_id', $content_id)->exists()) {
          $content = Content::find($content_id);
          $content->delete();

          return response()->json([
            "message" => "Records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Content not found"
          ], 404);
        }
    }
}

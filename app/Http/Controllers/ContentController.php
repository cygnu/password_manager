<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentRequest;
use App\Models\Content;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:checkUser,content')->only([
            'updateContent',
            'deleteContent'
        ]);
    }

    /**
     * contents overview
     */
    public function getAllContents()
    {
        $contents = Content::where('user_id', \Auth::id())
            ->orderByDesc('updated_at')
            ->paginate(20);

        return response()->json($contents, 200);
    }

    public function createContent(ContentRequest $request)
    {
        $request->merge([
            'user_id' => \Auth::id()
        ]);

        $content = new Content;
        $content->content_name = $request->content_name;
        $content->content_image = $request->content_image;
        $content->content_url = $request->content_url;
        $content->is_one_account = $request->is_one_account;
        $content->is_paid_subscription = $request->is_paid_subscription;
        $content->save();

        return $content
            ? response()->json($content, 201)
            : response()->json([], 500);
    }

    public function getContent($content_id)
    {
        if (Content::where('content_id', $content_id)->exists()) {
            $content = Content::where('content_id', $content_id)->get()->toJson(JSON_PRETTY_PRINT);
            return response()->json($content, 200);
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

            return $content->update()
                ? response()->json($content, 200)
                : response()->json([], 500);
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

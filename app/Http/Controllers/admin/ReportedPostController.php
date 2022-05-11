<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class ReportedPostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return PostResource::collection(Post::with('user.image', 'simple_post.image', 'bestComments.user.image', 'myReaction', 'reports.user', 'reports.report_type')->withCount('reactions', 'comments')->has('reports', '>', 0)->orderBy('id', 'DESC')->cursorPaginate());
    }
}

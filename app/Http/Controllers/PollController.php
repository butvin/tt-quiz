<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Middleware\CorsMiddleware;
use App\Models\{
    Poll, PollOption, PollVote
};


class PollController extends Controller
{
    /**
     * PollController constructor.
     *
     * @param  Request  $request
     */
    public function __construct(Request $request)
    {
        $this->middleware(CorsMiddleware::class);
    }

    /**
     * Get all polls
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $polls = Poll::all();

        return ($polls->count() > 0) ?
            response()->json($polls) :
            response()->json('There are no polls', 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CorsMiddleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\PollOption;


class PollOptionController extends Controller
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
     * Get options by poll id
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPollOptions(Request $request): JsonResponse
    {
        $poll_id = $request->route(('id'));
        $options = Poll::findOrFail($poll_id)->pollOptions;

        return response()->json($options);
    }

    /**
     * Get sub-options
     *
     * @param  int  $option_id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPollSubOptions(int $option_id): JsonResponse
    {
        $subOptions = PollOption::where('parent_id', $option_id)->get();

        if(empty($subOptions)) {
            return response()->json('no sub options', 204);
        }

        return response()->json($subOptions);
    }
}

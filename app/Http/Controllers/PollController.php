<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CorsMiddleware;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Poll;


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
     * Index
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json('index action scope');
    }

    /**
     * Get all polls
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllPolls(): JsonResponse
    {
        $polls = Poll::all();

        return ($polls->count() > 0) ?
            response()->json($polls) :
            response()->json(['message' => 'no questions'], 204);
    }

    /**
     * Get pall by id
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPoll(int $id): JsonResponse
    {
        return response()->json(Poll::findOrFail($id));
    }

    /**
     * Create a poll
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storePoll(Request $request): JsonResponse
    {
        $validator = $this->validate($request, ['subject' => 'required|string|min:3']);

        if (!$validator) {
            return response()->json(['message' => 'failed'], 400);
        }

        try {
            $poll = Poll::create($request->only('subject'));

            return response()->json($poll, 201);
        } catch (\Exception $e ) {
            return response()->json(['message' => 'failed'], 204);
        }
    }

    /**
     * Update specific pall by id
     *
     * @param  int  $id
     * @param  Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePoll(int $id, Request $request): JsonResponse
    {
        $poll = Poll::findOrFail($id);

        try {
            $poll->update($request->all());

            return response()->json('Updated Successfully');
        } catch (\Exception $e) {
            return response()->json(['message' => 'failed', 204]);
        }
    }

    /**
     * Delete specific pall by id
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyPoll(int $id): JsonResponse
    {
        $poll = Poll::findOrFail($id);
        $poll->delete();

        return response()->json('Deleted Successfully');
    }
}

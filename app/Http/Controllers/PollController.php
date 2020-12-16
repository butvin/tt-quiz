<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
//use App\Http\Middleware\CorsMiddleware;
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
//        $this->middleware(CorsMiddleware::class);
    }

    /**
     * @param  int  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json('$data');
    }

    /**
     * Get all polls
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $polls = Poll::all();

        return ($polls->count() > 0) ?
            response()->json($polls) :
            response()->json('There are no polls', 404);
    }

    /**
     * Get specific pall by id
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
     * Create a poll record
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'subject' => 'required|string|min:6'
        ]);

        $poll = Poll::create($request->only('subject'));

        return $poll ?
            response()->json(['message' => 'Created Successfully', 201]) :
            response()->json(['message' => 'failed', 422]);
    }

    /**
     * Update specific pall by id
     *
     * @param  int  $id
     * @param  Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        $poll = Poll::findOrFail($id);

        $poll->update($request->all());

        return response()->json('Deleted Successfully');
    }

    /**
     * Delete specific pall by id
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $poll = Poll::findOrFail($id);
        $poll->status = 0;
        $poll->delete();

        return response()->json('Deleted Successfully');
    }
}

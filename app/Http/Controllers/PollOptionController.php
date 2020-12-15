<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Poll, PollOption, PollVote
};

class PollOptionController extends Controller
{
    /**
     * PollController constructor.
     *
     * @param  Request  $request
     */
    public function __construct(Request $request)
    {
        //
    }


    public function getPollOptions(int $poll_id)
    {
        $options = Poll::findOrFail($poll_id)->pollOptions;

        if ($options->count() < 1) {
            return [];
        }

        return $options;
    }
}

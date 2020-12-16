<?php

namespace Database\Seeders;

use App\Models\Poll;
use Illuminate\Database\Seeder;


class PollsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Poll::factory()
            ->times(7)
            ->create();
    }
}

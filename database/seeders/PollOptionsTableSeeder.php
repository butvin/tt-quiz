<?php

namespace Database\Seeders;

use App\Models\PollOption;
use Illuminate\Database\Seeder;


class PollOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run(): void
    {
        PollOption::factory()
            ->times(50)
            ->create();
    }
}

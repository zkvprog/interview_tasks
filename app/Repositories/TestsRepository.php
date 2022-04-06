<?php

namespace App\Repositories;

use App\Models\Test;

class TestsRepository
{
    public function __construct()
    {
        try {
            $faker = \Faker\Factory::create();

            for ($i = 0; $i < 10; $i++) {
                $this->fill($faker);
            }
        } catch (\Throwable $e) {
            report($e);

            return false;
        }
    }

    /**
     * @param Generator $faker
     */
    private function fill(\Faker\Generator $faker)
    {
        $test = Test::create([
            'script_name' => $faker->name,
            'start_time' => $faker->numberBetween(9, 22),
            'end_time' => $faker->numberBetween(1, 24),
            'result' => $faker->randomElement(['normal', 'illegal', 'failed', 'success']),
        ]);
    }

    /**
     * @return Test[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        return Test::whereIn('result', ['normal', 'success'])->get();
    }
}

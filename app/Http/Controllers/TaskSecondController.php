<?php

namespace App\Http\Controllers;

class TaskSecondController
{
    public function solution()
    {
        $rangeNumbers = range(0, 10000);
        $sum = array_reduce($rangeNumbers, function ($carry, $item) {
            $arrayNumbers = str_split($item);
            $count = count($arrayNumbers);
            $amountIncreased = 1;

            for($i = 0; $i < $count - 1; $i++) {
                if ($arrayNumbers[$i] == ($arrayNumbers[$i + 1] - 1)) {
                    $amountIncreased += 1;
                } else {
                    $amountIncreased = 1;
                }
            }

            if ($amountIncreased < 3) {
                $carry += $item;
            }

            return $carry;
        });

        return view('tasks.task2', ['solution' => $sum]);
    }
}

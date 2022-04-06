<?php

namespace App\Http\Controllers;

use App\Repositories\TestsRepository;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    private $testsRepository;

    public function __construct(TestsRepository $testsRepository)
    {
        $this->testsRepository = $testsRepository;
    }

    public function index()
    {
        $tests = $this->testsRepository->get();

        return view('tasks.task3', ['tests' => $tests]);
    }
}

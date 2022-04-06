<?php

namespace App\Http\Controllers;

use App\Repositories\TestsRepository;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    private $testsRepository;

    /**
     * TestsController constructor.
     * @param TestsRepository $testsRepository
     */
    public function __construct(TestsRepository $testsRepository)
    {
        $this->testsRepository = $testsRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tests = $this->testsRepository->get();

        return view('tasks.task3', ['tests' => $tests]);
    }
}

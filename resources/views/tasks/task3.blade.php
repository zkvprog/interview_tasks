@extends('layouts.master')

@section('main')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Задание 3</h1>
        </div>

        @foreach($tests as $test)
            <div>
                {{ $test->script_name }} - {{ $test->result }}
            </div>
        @endforeach
    </main>
@endsection
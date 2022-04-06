@extends('layouts.master')

@section('main')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Задание 4</h1>
        </div>

        <div class="d-flex">
            <div class="px-md-4">
                <a href="/task4">Все товары</a>
                <ul>
                    @foreach($groups as $group)
                        <li>
                            <a href="/task4/{{ $group->id }}">{{ $group->name }}</a> {{$group->products_count}}
                        </li>

                        @isset($group->children)
                            @include('tasks.childsgroup', ['children' => $group->children])
                        @endisset
                    @endforeach
                </ul>
            </div>
            <div class="px-md-4">
                <ul>
                    @foreach($products as $product)
                        <li>
                            {{ $product->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </main>
@endsection

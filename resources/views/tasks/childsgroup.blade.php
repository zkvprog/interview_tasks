
<ul>
    @foreach($children as $child)
        <li class="">
            <a href="/task4/{{ $child->id }}">{{ $child->name }}</a> {{ $child->products_count }}
        </li>

        @isset($child->children)
            @include('tasks.childsgroup', ['children' => $child->children])
        @endisset
    @endforeach
</ul>

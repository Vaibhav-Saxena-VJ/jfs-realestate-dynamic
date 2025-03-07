
<li>
    {{ $category->name }}

    @if ($category->children->isNotEmpty())
        <ul>
            @foreach ($category->children as $child)
                @include('admin.partialCategory', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>

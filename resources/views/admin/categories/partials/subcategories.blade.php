@foreach($categories as $subcategory)
    <li>
        <p>{{ $subcategory->name }}</p>
        @if($subcategory->children->count() > 0)
            <ul>
                @include('admin.categories.partials.subcategories', ['categories' => $subcategory->children])
            </ul>
        @endif
    </li>
@endforeach
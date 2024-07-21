@php $dash.='-- '; @endphp
@foreach($subcategories as $subcategory)
<tr>
    <td>{{$dash}}{{$subcategory->title_km}}</td>
    <td>{{$subcategory->slug}}</td>
    <td>{{$subcategory->parent->title_km}}</td>
    <td>{{ $academic->subjects->count() }}</td>
    <td>
        @include('menu.academic.includes.actions')
    </td>
</tr>

    @if(count($subcategory->children))
        @include('menu.academic.subcategory-list',['subcategories' => $subcategory->children])
    @endif
@endforeach

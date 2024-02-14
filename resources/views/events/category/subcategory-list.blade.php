@php $dash.='-- '; @endphp
@foreach($subcategories as $subcategory)
<tr>
    <td>{{$dash}}{{$subcategory->name}}</td>
    <td>{{$subcategory->slug}}</td>
    <td>{{$subcategory->parent->name}}</td>
    <td>{{$category->events->count() }}</td>
    <td>
        @include('events.category.includes.actions')
    </td>
</tr>
    
    @if(count($subcategory->subcategory))
        @include('events.category.subcategory-list',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach
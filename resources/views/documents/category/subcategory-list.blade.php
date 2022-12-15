@php $dash.='-- '; @endphp
@foreach($subcategories as $subcategory)
<tr>
    <td>{{$dash}}{{$subcategory->title_km}}</td>
    <td>{{$subcategory->slug}}</td>
    <td>{{$subcategory->parent->title_km}}</td>
    <td>
        @include('documents.category.includes.actions')
    </td>
</tr>
    

    @if(count($subcategory->subcategory))
        @include('documents.category.subcategory-list',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach
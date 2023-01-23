@php $dash.='-- '; @endphp
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}" {{ old('parent_id') == $subcategory->id }}>{{$dash}}{{$subcategory->title_km}}</option>
    @if(count($subcategory->subcategory))
        @include('documents.category.subcategory-opt',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach
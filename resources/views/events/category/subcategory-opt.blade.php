@php $dash.='-- '; @endphp
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}" {{ old('parent_id') == $subcategory->id }}>{{$dash}}{{$subcategory->name}}</option>
    @if(count($subcategory->subcategory))
        @include('events.category.subcategory-opt',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach
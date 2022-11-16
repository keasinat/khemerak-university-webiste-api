@php $dash.='-- '; @endphp
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}">{{$dash}}{{$subcategory->title_km}}</option>
    @if(count($subcategory->subcategory))
        @include('subcategory-opt',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach
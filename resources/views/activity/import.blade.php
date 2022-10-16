@extends('layouts.app')

@section('content')

<form action="{{ route('admin.activity.import') }}" method="post" enctype="multipart/form-data">
    @csrf

    <input type="file" name="file" id="">
    <button type="submit">import</button>
</form>
@endsection
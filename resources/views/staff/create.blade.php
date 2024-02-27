@extends('layouts.app')

@section('content')

<x-forms.post :action="route('admin.staff.store')">
    <x-card>
        <x-slot name="header">
          Create New
        </x-slot>
        <x-slot name="headerAction">
            <a href="{{ route('admin.staff.index') }}" class="btn btn-primary">{{ __('dashboard.cancel') }}</a>
        </x-slot>
        <x-slot name="body">
            @include('staff.forms.form')
            <button type="submit" class="btn btn-success">Save</button>
        </x-slot>
    </x-card>
</x-forms>
@endsection
@push('after-scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    @include('layouts.partials.ckeditor')
    <script>
        var route_prefix = "/file-manager";
        $('#content_km').ckeditor({
            height: 500,
            filebrowserImageBrowseUrl: route_prefix + '/ckeditor',
            allowedContent : true
        });

    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('lfm').addEventListener('click', (event) => {
        event.preventDefault();
        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
      });
    });
    // set file link
    function fmSetLink($url) {
      document.getElementById('thumbnail').value = $url;
    }


  </script>
@endpush
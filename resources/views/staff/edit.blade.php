@extends('layouts.app')

@section('content')
<x-forms.patch :action="route('admin.staff.update', $staff)">
    <x-card>
        <x-slot name="header">
            Edit Staff
        </x-slot>
        <x-slot name="headerAction">
            <a href="{{ route('admin.staff.index') }}" class="btn btn-primary">{{ __('dashboard.cancel') }}</a>
        </x-slot>
        <x-slot name="body">
            @include('staff.forms.form-edit')
            <button type="submit" class="btn btn-success">Update</button>
        </x-slot>
    </x-card>
</x-forms>
@endsection

@push('after-scripts')
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
            window.open('/file-manager/fm-button', 'fm', 'width=1000,height=800');
        });
        });
        // set file link
        function fmSetLink($url) {
        document.getElementById('thumbnail').value = $url;
        }
  </script>
@endpush
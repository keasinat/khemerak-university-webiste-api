@extends('layouts.app')

@section('content')
    <x-card>
        <x-slot name="header">

        </x-slot>
        <x-slot name="headerAction">

        </x-slot>
        <x-slot name="body">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-striped" id="pages">
                    <thead>
                        <tr>
                            <th>{{ __('dashboard.page_name') }}</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if(count($pages) > 0) --}}
                        @foreach($pages as $page)
                        <tr>
                            <td>{{ $page->title_km }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                        {{-- @else
                        No Data
                        @endif --}}
                    </tbody>
                </table>
            </div>
        </x-slot>
    </x-card>
@endsection
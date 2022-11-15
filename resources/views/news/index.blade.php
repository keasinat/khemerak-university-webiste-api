@extends('layouts.app')
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
<x-card>
    <x-slot name="header">
        ព័ត៍មាន
    </x-slot>
    <x-slot name="headerAction">
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">{{ __('dashboard.create_new') }}</a>
    </x-slot>
    <x-slot name="body">
            @if(Session::has('success'))       
                <div class="alert alert-success">         
                    {{Session::get('success')}}      
                </div> 
            @elseif(Session::has('danger'))  
                <div class="alert alert-danger">         
                    {{Session::get('danger')}}      
                </div> 
            @elseif(Session::has('updated'))  
                <div class="alert alert-warning">         
                    {{Session::get('updated')}}      
                </div>  
            @endif
            <table class="table table-bordered text-center" id="news">
                <thead>
                    <tr>
                        <th>{{ __('dashboard.thumbnail') }}</th>
                        <th>{{ __('dashboard.title') }}</th>
                        <th>{{ __('dashboard.post_date') }}</th>
                        <th>{{ __('dashboard.status') }}</th>
                        <th colspan=2>{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                @if (count($list) > 0)
                        @foreach ($list as $item)
                        <tr>
                            <td>{{ $item->thumbnail }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ date('Y-m-d', strtotime($item->created_at)) }}</td>
                            <td>
                                @if($item->is_published == 1)
                                    <span class="badge badge-primary">Published</span>
                                @else
                                    <span class="badge badge-danger">Save to Draft</span>
                                @endif
                            </td>
                            <td style="justify-content: center" class="row">
                                <a class="btn btn-outline-primary mr-3" href="{{ route('admin.news.edit', $item->id) }}">Edit</a>
                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger" onclick="archiveFunction()">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>No Data</tr>
                    @endif
                </tbody>
            </table>
            
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    {!! $list->links('pagination::bootstrap-4') !!}
                </ul>
            </nav>
        </div>
    </x-slot>
</x-card>

@endsection

@push('after-scripts')
    @include('layouts.partials.script-data-table')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <script>
        $(function () {

          $('#news').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
        $('div.alert').delay(1000).slideUp(300);
        function archiveFunction() {
            event.preventDefault(); // prevent form submit
            var form = event.target.form; // storing the form
                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to retrieve this data",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel please!",
                        closeOnConfirm: false,
                        closeOnCancel: true
            },
            function(isConfirm){
            if (isConfirm) {
                form.submit();          // submitting the form when user press yes
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
            });
        }
    </script>
      
@endpush
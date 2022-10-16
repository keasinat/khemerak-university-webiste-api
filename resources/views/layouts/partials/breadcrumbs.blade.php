<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		<div class="col-sm-6">
		<h1>@yield('page-title')</h1>
		</div>
		<div class="col-sm-6">
			{{-- @if(Breadcrumbs::has())
			<ol class="breadcrumb float-sm-right">
				@foreach(Breadcrumbs::current() as $crumb)
					@if ($crumb->url() && !$loop->last)
					<li class="breadcrumb-item"><a href="{{ $crumb->url() }}">{{ $crumb->title() }}</a></li>
					@else
					<li class="breadcrumb-item active">{{ $crumb->title() }}</li>
					@endif
				@endforeach
				
			</ol>
			@endif --}}
		</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		<div class="col-sm-12">
            <ul>
			@if(Breadcrumbs::has())
                @foreach (Breadcrumbs::current() as $crumbs)
                    @if ($crumbs->url() && !$loop->last)
                        <li class="breadcrumb-item">
                            <a href="{{ $crumbs->url() }}">
                                {{ $crumbs->title() }}
                            </a>
                        </li>
                    @else
                        <li class="breadcrumb-item active">
                            {{ $crumbs->title() }}
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>
		</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
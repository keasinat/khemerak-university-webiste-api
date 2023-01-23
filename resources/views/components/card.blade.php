<div class="card">
    @if (isset($header))
    <div class="card-header">
       <h2 class="card-title">{{ $header }}</h2> 

        @if (isset($headerAction))
        <div class="card-tool text-right">
            {{ $headerAction }}
        </div>
        @endif
    </div>
    @endif
    @if (isset($body))
    <div class="card-body">
        {{ $body }}
    </div>
    @endif

    @if (isset($footer))
    <div class="card-footer">
        {{ $footer }}
    </div>
    @endif
</div>
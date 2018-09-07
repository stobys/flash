@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="callout callout-{{ $message['level'] }} callout-dismissible
            {{ $message['important'] ? 'callout-important' : '' }}
        ">
            <button type="button" class="close" data-dismiss="callout" aria-hidden="true">
                <i class="fa fa-times"></i>
            </button>
            @if ($message['title'])
            <h4>
                @if ($message['icon'])
                    <i class="icon fa fa-{{ $message['icon'] }}"></i>
                @endif
                {{ $message['title'] }}
            </h4>
            @endif

            <p>
                {!! $message['message'] !!}
            </p>
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}

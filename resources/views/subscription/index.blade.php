@if ($user->subscribed())
    <p>You are subscrfibed</p>
    @else
    <p>You are not subscribed</p>
    @endif
{{--@if ($user->expired())
    <p>You are expired</p>
    @else
    <p>You are not expired</p>
    @endif--}}

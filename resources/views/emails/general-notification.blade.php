@component('mail::message')
# {{ $data['title'] }}

{{ $data['message'] }}

@if(isset($data['action_url']) && isset($data['action_text']))
@component('mail::button', ['url' => $data['action_url']])
{{ $data['action_text'] }}
@endcomponent
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@extends('emails.layouts.master')

@section('content')
{{-- <div style="text-align: center; margin-bottom: 20px;">
    <h1 style="font-size: 24px; color: #333; margin-bottom: 10px;">{{ __('Thank You!') }}</h1>
</div> --}}

<div style="font-size: 16px; line-height: 1.6; color: #333; text-align: left;">
    <p style="margin: 0 0 10px;">{{ __('We appreciate your support and thank you for being a valued part of our community.') }}</p>
    <p style="margin: 0 0 20px;">{{ __('If you have any questions or need assistance, feel free to reach out to us.') }}</p>
</div>

<div style="text-align: center;">
    <a href="{{ $data['action_url'] }}" style="display: inline-block; padding: 12px 20px; background-color: #2d3748; color: #ffffff; text-decoration: none; 
                  font-size: 16px; border-radius: 5px; font-weight: bold; text-align: center;">
        {{ $data['action_text'] }}
    </a>
</div>
@endsection

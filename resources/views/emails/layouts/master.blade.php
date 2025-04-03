<!doctype html>
<html lang="en">
@include('emails.includes.header')
<body>
    <div class="email-wrapper">
        <div class="email-logo">
            <img src="{{ asset('assets/img/laravel-logo.png') }}" alt="App Logo">
        </div>

        <!-- Email Content Card -->
        <div class="email-container">
            <div class="email-header">
                @include('emails.components.greeting',['data'=>$data])
            </div>

            <div class="email-body">
                <div class="email-content">
                    @yield('content')
                </div>
                @include('emails.components.signature')
            </div>
        </div>
    </div>
</body>

</html>

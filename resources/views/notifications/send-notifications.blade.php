<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Notifications</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <div class="container">
        <!-- Flash Messages -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
            <!-- SMS Notification Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Send SMS Notification</h5>
                    </div>
                    <div class="card-body">
                        <form id="sms-form" action="{{ route('send.sms') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
                                    <select class="form-select" id="country-code" name="country_code">
                                        <option value="+1">+1 (USA)</option>
                                        <option value="+91">+91 (India)</option>
                                        <option value="+44">+44 (UK)</option>
                                        <option value="+61">+61 (Australia)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="sms-message" class="form-label">Message</label>
                                <textarea class="form-control" id="sms-message" name="message" rows="3" placeholder="Enter your message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-custom w-100">Send SMS</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Email Notification Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5>Send Email Notification</h5>
                    </div>
                    <div class="card-body">
                        <form id="email-form" action="{{ route('send.email') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                            </div>
                            <div class="mb-3">
                                <label for="email-message" class="form-label">Message</label>
                                <textarea class="form-control" id="email-message" name="message" rows="3" placeholder="Enter your message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-custom w-100" style="background-color: #28a745;">Send Email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

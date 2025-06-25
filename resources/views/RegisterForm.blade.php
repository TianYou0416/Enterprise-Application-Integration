<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <title>Register Form</title>
    <style>
      .navbar-grey {
            background-color: #6c757d; 
        }

        .navbar-grey .nav-link,
        .navbar-grey .navbar-brand,
        .navbar-grey .btn-success {
            color:rgb(0, 0, 0); 
        }

        .navbar-grey .btn-success:hover {
            background-color: #5a6268; 
        }

        .custom-header {
            text-align: center;
            margin: 20px 0;
            color: #6f42c1; 
            font-family: 'Arial', sans-serif;
            font-size: 2.5rem;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .custom-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background-color: #6f42c1;
            margin: 10px auto;
            border-radius: 2px;
        }

        .card {
            height: 100%; 
            display: flex;
            flex-direction: column;
        }

        .card-body {
            flex-grow: 1; 
        }

        .footer-grey {
            background-color: #6c757d; 
            color:rgb(0, 0, 0); 
        }

        .footer-grey a {
            color: #ffffff; 
            text-decoration: none;
        }

        .footer-grey a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
  <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-grey">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">HypeHub</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Event List
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('events.category', 'Sport') }}">Sport</a></li>
                            <li><a class="dropdown-item" href="{{ route('events.category', 'Entertainment') }}">Entertainment</a></li>
                            <li><a class="dropdown-item" href="{{ route('events.category', 'Seminar') }}">Seminar</a></li>
                        </ul>
                    </li>
                </ul>
                <button class="btn btn-success" type="button">Login / Sign Up</button>
            </div>
        </div>
    </nav>
    <!-- End of Navigation Bar -->

    <h1 class="mb-4 text-center">Register for: {{ $event->title }}</h1>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">

      <div class="card shadow-lg border-0">
        <div class="card-header bg-success text-white">
          <h4 class="mb-0">Register for: {{ $event->title }}</h4>
        </div>

        <div class="card-body">
          <div class="mb-4">
            <p><strong>Date:</strong> {{ $event->date }}</p>
            <p><strong>Location:</strong> {{ $event->location }}</p>
            <p><strong>Ticket:</strong> {{ $event->ticket_type }} (RM{{ $event->ticket_price }})</p>
          </div>

          @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
                </ul>
            </div>
        @endif

          <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <div class="mb-3">
              <label for="name" class="form-label">
                Full Name
                <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">
                Email Address
                <span class="text-danger">*</span>
              </label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">
                Phone Number
                <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="mb-3">
              <label for="payment_method" class="form-label">
                Payment Method
                <span class="text-danger">*</span>
              </label>
              <select class="form-select" name="payment_method" id="payment_method" required>
                <option value="">Choose...</option>
                <option value="FPX">FPX</option>
                <option value="TNG">TNG</option>
              </select>
            </div>

            <button type="submit" class="btn btn-success w-100">Register</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

    <!-- Footer -->
     <footer class="footer-grey py-4">
    <div class="container">
        <div class="row">
            <!-- Left Side -->
            <div class="col-md-4">
                <h5>HypeHub</h5>
                <p class="small">
                    A tech company focused on making event planning easier with modern online tools. We want to help both event organizers and attendees by simplifying how tickets are sold and registrations are handled.
                </p>
            </div>

            <!-- Center -->
            <div class="col-md-4 text-center">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-dark text-decoration-none">Home</a></li>
                    <li><a href="{{ route('events.category', 'Sport') }}" class="text-dark text-decoration-none">Sport</a></li>
                    <li><a href="{{ route('events.category', 'Entertainment') }}" class="text-dark text-decoration-none">Entertainment</a></li>
                    <li><a href="{{ route('events.category', 'Seminar') }}" class="text-dark text-decoration-none">Seminar</a></li>
                </ul>
            </div>

            <!-- Right Side -->
            <div class="col-md-4 text-end">
                <h5>Follow Us</h5>
                <div>
                    <a href="https://instagram.com" class="text-dark me-3">
                        <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                    </a>
                    <a href="https://facebook.com" class="text-dark me-3">
                        <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                    </a>
                    <a href="https://twitter.com" class="text-dark">
                        <i class="bi bi-twitter" style="font-size: 1.5rem;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
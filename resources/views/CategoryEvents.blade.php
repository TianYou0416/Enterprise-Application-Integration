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

    <title>Event Category</title>
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

    <h1 class="mb-4 text-center">{{ $category }} Events</h1>

<div class="row">
@foreach ($events as $event)
  <div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm">
      <img src="{{ asset('image/' . $event->image) }}" class="card-img-top" alt="Event Image">
      <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $event->title }}</h5>
        <p>{{ $event->description }}</p>
        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary mt-auto">Learn More</a>
      </div>
    </div>
  </div>
@endforeach
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
<!doctype html>
    <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

            <!-- Fontawesome -->
            <script src="https://kit.fontawesome.com/3115ea88ec.js" crossorigin="anonymous"></script>

            <!-- CSS & JS Setup -->
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
            <title>Student Attendance</title>
        </head>
    <body>

        <!-- Navigation Page -->
        <main>
            <header class="p-3 mb-3 border-bottom">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <!-- Home Page Navigation -->
                        <a href="{{ url('/') }}" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        <!-- Image src MODIFY -->
                        <img src="{{ asset('images/main-icon.png') }}" class="main-icon" alt="main-icon">
                        </a>
                
                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="{{ url('/') }}" class="nav-link px-2 link-success">Home</a></li>
                        <li><a href="{{ url('/collection') }}" class="nav-link px-2 link-dark">Class</a></li>
                        <li><a href="{{ url('/store') }}" class="nav-link px-2 link-dark">Store</a></li>
                        </ul>
                    </div>
                </div>
            </header>
        </main>

        @yield('main-content');
    
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
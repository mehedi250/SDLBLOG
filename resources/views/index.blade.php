<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('assets/images/company_logo/company_logo.png')}}">
    <title>SDL BLOG</title>
    
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap5/css/bootstrap.min.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <img class="rounded-circle" src="{{($webinfo->logo!==null)?asset($webinfo->logo):asset('assets/images/company_logo/company_logo.png')}}" alt="" style="height: 40px;">
            </a>
            
            <a href="#" class="navbar-brand">{{ $webinfo->site_name }}</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="#" class="nav-item mx-md-1 nav-link active">Home</a>
                    <a href="#" class="nav-item mx-md-1 nav-link">Profile</a>
                </div>
              
                <div class="navbar-nav">
                @auth
                    
                    <a href="#" class="btn btn-outline-light">Admin Panel</a>
                   
                @endauth

                @guest
                    <a href="/login" class=" btn btn-outline-light my-1">Login</a>
                    <a href="/register" class=" btn btn-outline-light ms-md-2 my-1">Register</a>
                @endguest
                </div>
            </div>
        </div>
    </nav>
    

    <div class="content" style="background-image: url({{asset('assets/images/banner/banner.webp')}})">
        <header class="text-center text-white py-4">
            <h1>Company Name</h1>
            <h4>BLOG</h4>
        </header>
    </div>



    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-2">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1 " href="#!" role="button">
                    <i class="fab fa-facebook-f"></i></a>
        
                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1 " href="#!" role="button">
                    <i class="fab fa-twitter"></i>
                </a>
        
                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1 " href="#!" role="button">
                    <i class="fab fa-google"></i>
                </a>
        
                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1 " href="#!" role="button">
                    <i class="fab fa-instagram"></i>
                </a>
        
                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1 " href="#!" role="button">
                    <i class="fab fa-linkedin-in"></i>
                </a>
        
                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1 " href="#!" role="button">
                    <i class="fab fa-github"></i>
                </a>
            </section>
            <!-- Section: Social media -->
    
       

        </div>
        <!-- Grid container -->
    
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
        <a class="text-white" href="https://sites.google.com/view/mehedi-hasan-shawon">Md. Mehedi Hasan Shawon</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    

   <script src="{{asset('assets/vendor/bootstrap5/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
 <div class="container-fluid">
        
 <!-- Logo -->
       
<a class="navbar-brand" href="{{ route('home') }}">
<img src="path-to-your-logo.jpg" alt="Your Company" class="d-inline-block align-top" height="36">
</a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
 <span class="navbar-toggler-icon"></span>
        
        </button>

<!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
</li>
                
<!-- Repite para otros enlaces, reemplaza href y texto según sea necesario -->
     
</ul>
       
<!-- Authentication Links -->
            @if (Route::has('login'))
                
            @if (Route::has('login'))
                <

            @if (Route::has('log

         
<div class="d-flex">
                    @auth
                        
                    @auth
                   

  
<a class="nav-link" href="{{ url('/home') }}">Home</a>
                    @else
                        
                    @else
       
<a class="nav-link" href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            
                        @if (Route::has('register'))
             

                        @if (Route::has('re

                   
<a class="nav-link" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                
                        @endif
                    @endauth
           

                        @endi
</div>
            @endif
        
            @endif
        </d
</div>
    </div>
</nav>

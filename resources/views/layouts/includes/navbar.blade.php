<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: rgba(0, 61, 180, 0.52);">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars" style="color: #FFFFFF;"></i></a>
                </li>
                
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt" style="color: #FFFFFF;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                        href="{{route('logout')}}" role="button" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-th-large" style="color: #FFFFFF;">Logout</i> 
                        
                    </a>
                    <form action="{{route('logout')}}" id="logout-form" method="post">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
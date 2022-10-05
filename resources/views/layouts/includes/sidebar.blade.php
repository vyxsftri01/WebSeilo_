<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgba(252, 252, 253, 0.934);">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('assets/dist/img/sei.png') }}" alt="Seilo"
             class="brand-image img-circle" >
         <span class="font-weight-light" style="color: #1f57f3;"><strong> Seilo</strong></span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('assets/dist/img/index.png') }}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block" style="color: #000000;">{{ Auth::user()->name }}</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="#" class="nav-link ">
                         <i class="nav-icon fas fa-tachometer-alt" style="color: #000000;"></i>
                         <p style="color: #000000;">
                             Dashboard
                             {{-- <i class="right fas fa-angle-left"></i> --}}
                         </p>
                     </a>

                 </li>
                 <li class="nav-item">
                     <a href="{{ route('media.index') }}"
                         class="nav-link ">
                         <i class="nav-icon fas fa-th" style="color: #000000;"></i>
                         <p style="color: #000000;">
                             Media
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('activitymedia.index') }}"
                     class="nav-link ">
                         <i class="nav-icon fas fa-th" style="color: #000000;"></i>
                         <p style="color: #000000;">
                             Media Activity
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('profile.index') }}"
                         class="nav-link ">
                         <i class="nav-icon fas fa-copy" style="color: #000000;"></i>
                         <p style="color: #000000;">
                             Profile
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('artikel.index') }}"
                         class="nav-link ">
                         <i class="nav-icon fas fa-copy" style="color: #000000;"></i>
                         <p style="color: #000000;">
                             Artikel
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('kelas.index') }}"
                         class="nav-link ">
                         <i class="nav-icon fas fa-copy" style="color: #000000;"></i>
                         <p style="color: #000000;">
                             Kelas Industri
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('activity.index') }}" class="nav-link ">
                         <i class="nav-icon fas fa-copy" style="color: #000000;"></i>
                         <p style="color: #000000;">
                             Activity
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>

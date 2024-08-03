<aside class="main-sidebar sidebar-dark-primary elevation-4"  style="background-color: rgb(24, 80, 109)">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link" style="background-color: rgb(8, 96, 144)">
      <img src="{{ asset('template/dist/img/GEREMLOGO.png') }}" alt="GEREME Logo" class="brand-image img-circle elevation-4" style="opacity: .8">
      <span class="brand-text font-weight-light" style="color: white;">SECURALIM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('home') }}" style="color: white;" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-users" style="color: white;"></i>
                  <p style="color: white;">
                    Gestion des utilisateurs
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/' . ($page = 'all-user')) }}" class="nav-link">
                        <p>Les Utilisateurs</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/' . ($page = 'add-user')) }}" class="nav-link">
                        <p>Ajouter Utilisateur</p>
                    </a>
                  </li>
               </ul>
              </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
    <li class="nav-item">
    @if(Session::get('userDetails.roles') ==1)  
      <a href="{{ route('admin') }}" class="nav-link">
        <i class="nav-icon far fa-envelope-open"></i>
        <p>
          Admin
        </p>
      </a>
    @endif
    </li>
    <li class="nav-item">
    @if(Session::get('userDetails.roles') ==2)  
      <a href="{{ route('manager') }}" class="nav-link">
        <i class="nav-icon far fa-envelope-open"></i>
        <p>
          Manager
        </p>
      </a>
    </li>
    @endif
    <li class="nav-item">
    @if(Session::get('userDetails.roles') ==3)      
      <a href="{{ route('user') }}" class="nav-link">
        <i class="nav-icon far fa-envelope-open"></i>
        <p>
          User
        </p>
      </a>
    @endif  
    </li>
    <li class="nav-item">
      <a href="{{ route('logout') }}" class="nav-link">
        <i class="nav-icon far fa-share-square"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
  </ul>
</nav>
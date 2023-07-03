  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#form-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>form</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="form-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.create-form')}}">
              <i class="bi bi-circle-fill"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.modify-form')}}">
              <i class="bi bi-circle-fill"></i><span>Modify</span>
            </a>
          </li>
         
        </ul>
      </li>

  

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bootstrap"></i><span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="blog-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle-fill"></i><span>Posts</span>
            </a>
          </li>
         
          <li>
            <a href="#">
              <i class="bi bi-circle-fill"></i><span>Category</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear-wide-connected"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="settings-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          {{-- @canany('User access','User add','User edit','User delete')
          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.users.index')}}">
              <i class="bi bi-circle-fill"></i>
              <span>Users</span>
            </a>
          </li>
          @endcanany --}}
       
          {{-- @canany('User access','User add','User edit','User delete') --}}
          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-circle-fill"></i>
              <span>Roles</span>
            </a>
          </li>
          {{-- @endcanany --}}
          {{-- @canany('User access','User add','User edit','User delete') --}}
          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-circle-fill"></i>
              <span>Permissions</span>
            </a>
          </li>
          {{-- @endcanany --}}
          <li>
            <a href="#">
              <i class="bi bi-circle-fill"></i><span>Accordion</span>
            </a>
          </li>
         
        </ul>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      
    </ul>

  </aside><!-- End Sidebar-->


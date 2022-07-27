<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Dashboard</span>
        </h6>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/dashboard">
            <i class="bi bi-house-door" style="font-size: 24px;"></i>
            Dashboard
          </a>
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Manage Data</span>
        </h6>
        @if ( auth()->user()->role == 'Admin')
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/users">
            <i class="bi bi-people" style="font-size: 24px;"></i>
            User
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/perusahaans">
            <i class="bi bi-building" style="font-size: 24px;"></i>
            Perusahaan
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/posts">
            <i class="bi bi-file-earmark-post" style="font-size: 24px;"></i>
            Post
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/pelamar">
            <i class="bi bi-clipboard" style="font-size: 24px;"></i>
            Pelamar
          </a>
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Setting</span>
        </h6>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('myprofile.edit') }}">
            <i class="bi bi-gear" style="font-size: 24px;"></i>
            Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('password.edit') }}">
            <i class="bi bi-gear" style="font-size: 24px;"></i>
            Ubah Password
          </a>
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Other</span>
        </h6>
        <li class="nav-item">
          <a class="nav-link" href="/">
            <i class="bi bi-globe" style="font-size: 24px;"></i>
            Back To Website
          </a>
        </li>
      </ul>
    </div>
  </nav>
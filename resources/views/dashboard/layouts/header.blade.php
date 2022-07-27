<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard"><img src="/img/spatium2.png"  width="30px"> Spatium</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form method="POST" action="/dashboard/logout">
          @csrf
          <button type="submit" onclick="return confirm('You want logout ?')" class="nav-link px-3 bg-dark border-0">Sign out <i class="bi bi-box-arrow-right"></i></button>
        </form>
      </div>
    </div>
  </header>
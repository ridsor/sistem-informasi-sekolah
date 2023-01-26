<header class="py-2 border-bottom bg-secondary-subtle">
  @if(!Request::is('dashboard'))
  <div class="container-search container-fluid align-items-center">
    <button type="button" class="d-md-none btn border-0 p-0">
      <label for="checkbox-search" class="btn btn-danger btn-sm">
        <i class="bi bi-x-lg"></i>
      </label>
    </button>
    <form class="w-100 mx-2" role="search">
      <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
    </form>
    <button type="button" class="d-md-none btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalFilter">
      <i class="bi bi-three-dots-vertical"></i>
    </button>
  </div>
  @endif  
  <nav class="container-fluid gap-3 align-items-center d-grid" style="grid-template-columns: 1fr 2fr;">
    <div>
      <img src="/img/profile.png" alt="" width="35" height="35" class="d-inline-block align-text-top rounded-circle"/>
      <span class="account-name fw-semibold fs-6 d-none d-md-inline-block">Administator</span>
    </div>       
    <div class="d-flex align-items-center justify-content-end">
      @if(!Request::is('dashboard')) 
      <form class="w-100 me-3 d-none d-md-block" role="search">
        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
      </form>
      <button type="button" class="d-none d-md-block btn btn-outline-secondary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#modalFilter">
        <i class="bi bi-three-dots-vertical"></i>
      </button>
      <button type="button" class="d-md-none btn p-0 border-0 me-2">
        <label for="checkbox-search" class="btn btn-outline-secondary btn-sm">
          <i class="bi bi-search"></i>
        </label>
      </button>
      @endif
      <img src="/img/logo-rpl.png" alt="mdo" width="35" height="35" class="rounded-circle d-none d-md-block">
      <button type="button" class="d-md-none btn p-0 border-0">
        <label for="checkbox-collapse" class="btn btn-outline-secondary btn-sm">
          <i class="bi bi-arrows-collapse"></i>
        </label>
      </button>
    </div>
  </nav>
</header>
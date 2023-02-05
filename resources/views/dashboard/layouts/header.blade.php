<header class="py-2 border-bottom bg-secondary-subtle">
  @if(!Request::is('dashboard') && !Request::is('dashboard/siswa/*') && !Request::is('dashboard/kelas/*') && !Request::is('dashboard/jurusan/*'))
  <div class="container-search container-fluid align-items-center">
    <button type="button" class="d-md-none btn border-0 p-0">
      <label for="checkbox-search" class="btn btn-danger btn-sm">
        <i class="bi bi-x-lg"></i>
      </label>
    </button>
    <form class="w-100 mx-2" role="search" id="searchForm">
      <div class="input-group">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="s">
          <button class="btn btn-outline-secondary" type="submit" id="btn-search"><i class="bi bi-search"></i></button>
        </div>
      </form>
      @if(!Request::is('dashboard/jurusan') && !Request::is('dashboard/laporan'))
    <button type="button" class="d-md-none btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalFilter">
      <i class="bi bi-three-dots-vertical"></i>
    </button>
    @endif
  </div>
  @endif  
  <nav class="container-fluid gap-3 align-items-center d-grid" style="grid-template-columns: 1fr 2fr;">
    <div class="section-left">
      <img src="/img/profile.png" alt="" width="35" height="35" class="d-inline-block rounded-circle"/>
      <span class="account-name fw-semibold fs-6 d-inline-block ms-2">{{ auth()->user()->name }}</span>
      <button type="button" class="d-md-block d-none btn p-0 border-0 menu">
        <label for="checkbox-collapse" class="btn btn-outline-secondary btn-sm">
          <i class="bi bi-list"></i>
        </label>
      </button>
    </div>       
    <div class="d-flex align-items-center justify-content-end">
      @if(!Request::is('dashboard') && !Request::is('dashboard/siswa/*') && !Request::is('dashboard/kelas/*') && !Request::is('dashboard/jurusan/*')) 
      <form class="w-100 me-3 d-none d-md-block" role="search" id="searchForm">
        <div class="input-group">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="s">
          <button class="btn btn-outline-secondary" type="submit" id="btn-search"><i class="bi bi-search"></i></button>
        </div>
      </form>
      @if(!Request::is('dashboard/jurusan') && !Request::is('dashboard/laporan'))
      <button type="button" class="d-none d-md-block btn btn-outline-secondary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#modalFilter">
        <i class="bi bi-three-dots-vertical"></i>
      </button>
      @endif
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
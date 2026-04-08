<!-- Mobile Offcanvas Sidebar -->
<div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="sidebarOffcanvas">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">SIDEBAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('product.index') }}">Products</a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="/docs">API Docs</a>
            </li>
            <li class="nav-item mt-4">
                <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</div>

<!-- Desktop Sidebar -->
<div class="col-md-3 col-lg-2 sidebar d-none d-md-block">
    <div class="p-3">
        <h5 class="mb-3">SIDEBAR</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('product.index') }}">Products</a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="/docs">API Docs</a>
            </li>
            <li class="nav-item mt-4">
                <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</div>

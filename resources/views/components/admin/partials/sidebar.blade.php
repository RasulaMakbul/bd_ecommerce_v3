<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">

                    {{__('Dashboard')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('category.index')}}">
                    <i class="fa-solid fa-home"></i>
                    {{__(' Categories')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('brand.index')}}">
                    <i class="fa-regular fa-copyright"></i>
                    {{__('Brand')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('product.index')}}">
                    <i class="fa-solid fa-list"></i>
                    {{__(' Product')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('color.index')}}">
                    <i class="fa-solid fa-brush"></i>
                    {{__(' color')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('slider.index')}}">
                    <i class="fa-solid fa-images"></i>
                    {{__(' Sliders')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('order.index')}}">
                    <i class="fa-regular fa-folder"></i>
                    {{__(' Orders')}}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Integrations
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
    </div>
</nav>
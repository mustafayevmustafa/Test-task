<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @can('viewAny', \App\Models\Product::class)
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('products.index')}}">
                        <i class="bi bi-circle"></i><span>Product List</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('products.create')}}">
                        <i class="bi bi-circle"></i><span>Product Create</span>
                    </a>
                </li>
            </ul>

        </li>
        @endcan

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('permissions.index')}}">
                <i class="bi bi-question-circle"></i>
                <span>Permission</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('roles.index')}}">
                <i class="bi bi-person"></i>
                <span>Roles</span>
            </a>
        </li>
{{--    <x-menu/>--}}



        </ul>

</aside><!-- End Sidebar-->

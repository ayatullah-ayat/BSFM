<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Master Info</div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sales" aria-expanded="true"
            aria-controls="sales">
            <i class="fas fa-fw fa-cog"></i>
            <span>Sales</span>
        </a>
        <div id="sales" class="collapse" aria-labelledby="sales" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">New Sale</a>
                <a class="collapse-item" href="buttons.html">Manage Sale</a>
                <a class="collapse-item" href="cards.html">Pos Sale</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orders" aria-expanded="true"
            aria-controls="orders">
            <i class="fas fa-fw fa-cog"></i>
            <span>Orders</span>
        </a>
        <div id="orders" class="collapse" aria-labelledby="orders" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">New Order</a>
                <a class="collapse-item" href="buttons.html">Manage Order</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products" aria-expanded="true"
            aria-controls="products">
            <i class="fas fa-fw fa-cog"></i>
            <span>Product</span>
        </a>
        <div id="products" class="collapse" aria-labelledby="products" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">New Product</a>
                <a class="collapse-item" href="buttons.html">Manage Product</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customers" aria-expanded="true"
            aria-controls="customers">
            <i class="fas fa-fw fa-cog"></i>
            <span>Customer</span>
        </a>
        <div id="customers" class="collapse" aria-labelledby="customers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">New Customer</a>
                <a class="collapse-item" href="buttons.html">Manage Customer</a>
                <a class="collapse-item" href="buttons.html">Customer Ledger</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#suppliers" aria-expanded="true"
            aria-controls="suppliers">
            <i class="fas fa-fw fa-cog"></i>
            <span>Supplier</span>
        </a>
        <div id="suppliers" class="collapse" aria-labelledby="suppliers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">New Supplier</a>
                <a class="collapse-item" href="buttons.html">Manage Supplier</a>
                <a class="collapse-item" href="buttons.html">Supplier Ledger</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#purchase" aria-expanded="true"
            aria-controls="purchase">
            <i class="fas fa-fw fa-cog"></i>
            <span>Purchase</span>
        </a>
        <div id="purchase" class="collapse" aria-labelledby="purchase" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">New Purchase</a>
                <a class="collapse-item" href="buttons.html">Manage Purchase</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category" aria-expanded="true"
            aria-controls="category">
            <i class="fas fa-fw fa-cog"></i>
            <span>Category</span>
        </a>
        <div id="category" class="collapse" aria-labelledby="category" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">New Category</a>
                <a class="collapse-item" href="{{ route('admin.category')}}">Manage Category</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brand" aria-expanded="true"
            aria-controls="brand">
            <i class="fas fa-fw fa-cog"></i>
            <span>Brand</span>
        </a>
        <div id="brand" class="collapse" aria-labelledby="brand" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">New Brand</a>
                <a class="collapse-item" href="{{ route('admin.brand')}}">Manage Brand</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#variant" aria-expanded="true"
            aria-controls="variant">
            <i class="fas fa-fw fa-cog"></i>
            <span>Variant</span>
        </a>
        <div id="variant" class="collapse" aria-labelledby="variant" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">New Variant</a>
                <a class="collapse-item" href="{{ route('admin.variant')}}">Manage Variant</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#unit" aria-expanded="true"
            aria-controls="unit">
            <i class="fas fa-fw fa-cog"></i>
            <span>Unit</span>
        </a>
        <div id="unit" class="collapse" aria-labelledby="unit" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">New Unit</a>
                <a class="collapse-item" href="{{ route('admin.unit')}}">Manage Unit</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gallery" aria-expanded="true"
            aria-controls="gallery">
            <i class="fas fa-fw fa-cog"></i>
            <span>Product Image Gallery</span>
        </a>
        <div id="gallery" class="collapse" aria-labelledby="gallery" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">New Product Image</a>
                <a class="collapse-item" href="buttons.html">Manage Product Image</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tax" aria-expanded="true"
            aria-controls="tax">
            <i class="fas fa-fw fa-cog"></i>
            <span>Tax</span>
        </a>
        <div id="tax" class="collapse" aria-labelledby="tax" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">New Tax</a>
                <a class="collapse-item" href="{{route('admin.tax')}}">Manage Tax</a>
                <a class="collapse-item" href="#">Tax Setting</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#currency" aria-expanded="true"
            aria-controls="currency">
            <i class="fas fa-fw fa-cog"></i>
            <span>Currency</span>
        </a>
        <div id="currency" class="collapse" aria-labelledby="currency" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">New Currency</a>
                <a class="collapse-item" href="{{route('admin.currency')}}">Manage Currency</a>
            </div>
        </div>
    </li>
{{-- =========================================================================== --}}
    <div class="sidebar-heading">Custom Order & Account</div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#custom_orders" aria-expanded="true"
            aria-controls="custom_orders">
            <i class="fas fa-fw fa-cog"></i>
            <span>Custom Orders</span>
        </a>
        <div id="custom_orders" class="collapse" aria-labelledby="custom_orders" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">New Order</a>
                <a class="collapse-item" href="buttons.html">Manage Order</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#account" aria-expanded="true"
            aria-controls="account">
            <i class="fas fa-fw fa-cog"></i>
            <span>Account</span>
        </a>
        <div id="account" class="collapse" aria-labelledby="account" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">New Entry</a>
                <a class="collapse-item" href="buttons.html">Report</a>
            </div>
        </div>
    </li>

    {{-- =========================================================================== --}}


    <div class="sidebar-heading">Report</div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Stock" aria-expanded="true"
            aria-controls="Stock">
            <i class="fas fa-fw fa-cog"></i>
            <span>Stock</span>
        </a>
        <div id="Stock" class="collapse" aria-labelledby="Stock" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">Stock Report</a>
                <a class="collapse-item" href="buttons.html">Stock Report (Supplier Wise)</a>
                <a class="collapse-item" href="buttons.html">Stock Report (Product Wise)</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Report" aria-expanded="true"
            aria-controls="Report">
            <i class="fas fa-fw fa-cog"></i>
            <span>Report</span>
        </a>
        <div id="Report" class="collapse" aria-labelledby="Report" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">Sales Report</a>
                <a class="collapse-item" href="buttons.html">Purchase Report</a>
                <a class="collapse-item" href="buttons.html">Tax Report (Product Wise)</a>
                <a class="collapse-item" href="buttons.html">Tax Report (Invoice Wise)</a>
            </div>
        </div>
    </li>

    <div class="sidebar-heading">Settings</div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sms" aria-expanded="true"
            aria-controls="sms">
            <i class="fas fa-fw fa-cog"></i>
            <span>SMS Settings</span>
        </a>
        <div id="sms" class="collapse" aria-labelledby="sms" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">SMS Configuration</a>
                <a class="collapse-item" href="buttons.html">SMS Template</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#web" aria-expanded="true"
            aria-controls="web">
            <i class="fas fa-fw fa-cog"></i>
            <span>Web Settings</span>
        </a>
        <div id="web" class="collapse" aria-labelledby="web" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">Sales Report</a>
                <a class="collapse-item" href="buttons.html">Purchase Report</a>
                <a class="collapse-item" href="buttons.html">Tax Report (Product Wise)</a>
                <a class="collapse-item" href="buttons.html">Tax Report (Invoice Wise)</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Software" aria-expanded="true"
            aria-controls="Software">
            <i class="fas fa-fw fa-cog"></i>
            <span>Software Settings</span>
        </a>
        <div id="Software" class="collapse" aria-labelledby="Software" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">Manage Company</a>
                <a class="collapse-item" href="buttons.html">Manage User</a>
                <a class="collapse-item" href="buttons.html">Language</a>
                <a class="collapse-item" href="buttons.html">Gateway</a>
                <a class="collapse-item" href="buttons.html">Others</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/charts') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/tables') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
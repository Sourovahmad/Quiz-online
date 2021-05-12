<!-- Sidebar -->
<ul class="navbar-nav    sidebar sidebar-dark accordion bg-techbot-dark " id="accordionSidebar">

    <!-- Divider -->




    <!-- Nav Item - Dashboard -->
    <li class="nav-item active ">
        <a class="nav-link p-3 " href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{__('Home')}}</span></a>
    </li>
    {{-- *********************************Super Admin**********************************  --}}
    @if (auth()->user()->role_id == 1)

    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link p-3 " href="{{ route('admin.groups.index') }}">
            <i class="fas fa-university"></i>
            <span>{{__('Groups')}}</span></a>
    </li>

    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link p-3 " href="{{ route('admin.super-admins') }}">
            <i class="fas fa-user"></i>
            <span>{{__('Super Admins')}}</span></a>
    </li>


    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link p-3 " href="{{ route('admin.questions.index') }}">
            <i class="fas fa-question"></i>
            <span>{{__('Questions')}}</span></a>
    </li>


    


    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link p-3 " href="{{ route('admin.categories.index') }}">
            <i class="fas fa-university"></i>
            <span>{{__('Category')}}</span></a>
    </li>
    @endif


    {{-- ********************************* Admin**********************************  --}}
    @if (auth()->user()->role_id == 2)


    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link p-3 " href="{{ route('admin.group-admins',auth()->user()->group_id) }}">
            <i class="fas fa-university"></i>
            <span>{{__('Admins')}}</span></a>
    </li>


    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link p-3 " href="{{ route('admin.group-sub-admins',auth()->user()->group_id) }}">
            <i class="fas fa-university"></i>
            <span>{{__('Sub Admins')}}</span></a>
    </li>
    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link p-3 " href="{{ route('admin.group-students',auth()->user()->group_id) }}">
            <i class="fas fa-university"></i>
            <span>{{__('Students')}}</span></a>
    </li>


    @endif
    
    {{-- *********************************Sub Admin**********************************  --}}

    @if (auth()->user()->role_id == 3)


    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link p-3 " href="{{ route('admin.group-students',auth()->user()->group_id) }}">
            <i class="fas fa-university"></i>
            <span>{{__('Students')}}</span></a>
    </li>


    @endif

    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Product Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed  p-3 " href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-clipboard-check "></i>
            <span>{{__('Product')}}</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">


                <a class="collapse-item" href="#">{{__('All Products')}}</a>

                <a class="collapse-item" href="$">{{__('Add New')}}</a>

            </div>
        </div>
    </li>




    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center  d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->
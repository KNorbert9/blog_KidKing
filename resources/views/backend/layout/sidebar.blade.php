<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ url('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->



        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard/users') }}">
                <i class="bi bi-person"></i>
                <span>Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard/categories') }}">
                <i class="bi bi-person"></i>
                <span>Categories</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard/blogs') }}">
                <i class="bi bi-person"></i>
                <span>Blogs</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard/pages') }}">
                <i class="bi bi-person"></i>
                <span>Pages</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard/tags') }}">
                <i class="bi bi-person"></i>
                <span>Tags</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard/faq') }}">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard/inbox') }}">
                <i class="bi bi-envelope"></i>
                <span>Inbox</span>
            </a>
        </li><!-- End Contact Page Nav -->


    </ul>

</aside><!-- End Sidebar-->

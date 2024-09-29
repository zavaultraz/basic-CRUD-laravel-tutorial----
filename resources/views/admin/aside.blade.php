<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('home')}}">
                <i class="bi bi-house"></i>
                <spann>Home</spann>
            </a>

        </li><!-- End Dashboard Nav -->


       
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-people"></i>
                <span>User</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link mt-2" href="{{route('category.index')}}">
                <i class="bi bi-basket"></i>
                <span>category</span>
            </a>

        </li>
       
        <!-- news -->
        <li class="nav-item">
            <a class="nav-link " href="{{route('news.index')}}">
                <i class="bi bi-envelope-paper"></i>
                <span>News</span>
            </a>

        </li><!-- End Dashboard Nav -->

    </ul>

</aside>
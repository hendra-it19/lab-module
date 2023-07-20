<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <a href="{{ url('/') }}" class="logo m-0 float-start">LAB TI</a>

                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li class="{{ ($title == 'home') ? 'active' :'' }}"><a href="{{ url('/') }}">Home</a></li>
                    <li class="{{ ($title == 'properties') ? 'active' :'' }}"><a href="{{ url('/properties') }}">Properties</a></li>
                    <li class="{{ ($title == 'services') ? 'active' :'' }}"><a href="{{ url('/services') }}">Services</a></li>
                    <li class="{{ ($title == 'contact') ? 'active' :'' }}"><a href="{{ url('/contact') }}">Contact Us</a></li>
                    <li ><a href="{{ url('/login') }}" class="btn btn-sm btn-dark">Login</a></li>
                    {{-- <li class="has-children">
                        <a class="btn btn-sm btn-dark" href="properties.html">User</a>
                        <ul class="dropdown">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li> --}}
                </ul>

                <a href="#"
                    class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid bg-light position-relative shadow">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
        <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
            <i class="flaticon-043-teddy-bear"></i>
            <span class="text-primary">Blog KidKing</span>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        @php
            $getCategories = App\Models\Categorie::getCategoryMenu();
        @endphp
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav font-weight-bold mx-auto py-0">
                <a href="{{ url('') }}" class="nav-item nav-link @if (Request::segment(1) == '') active @endif">Home</a>
                @foreach ($getCategories as $category)
                    <a href="{{ url($category->slug) }}"
                        class="nav-item nav-link @if (Request::segment(1) == $category->slug) active @endif">{{ $category->name }}</a>
                @endforeach
                {{-- <a href="{{ url('about') }}" class="nav-item nav-link">About</a>
                <a href="{{ url('teams') }}" class="nav-item nav-link">Teams</a>
                <a href="{{ url('gallery') }}" class="nav-item nav-link">Gallery</a> --}}
                <a href="{{ url('blog') }}" class="nav-item nav-link @if (Request::segment(1) == 'blog') active @endif">Blog</a>
                <a href="{{ url('contact') }}" class="nav-item nav-link @if (Request::segment(1) == 'contact') active @endif">Contact</a>
            </div>
            <a href="{{ url('login') }}" class="btn btn-primary px-4">Login</a>
            <a href="{{ url('register') }}" class="btn btn-primary px-4" style="margin-left: 8px;">Register</a>
        </div>
    </nav>
</div>

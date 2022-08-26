<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">home</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">
            @foreach ($kategori as $row_kategori)
                <li class="dropdown active">
                    <a href="/{{ $row_kategori->slug }}" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fa-chart-bar"></i> <span>{{ $row_kategori->name }}</span></a>
                    <ul class="dropdown-menu">
                        @foreach ($row_kategori->posts as $post_kategori)
                            <li class=""><a class="nav-link"
                                    href="/{{ $post_kategori->slug }}">{{ $post_kategori->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </aside>
</div>

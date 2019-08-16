<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li style="float:right">
        @if (Route::has('login'))
                    @auth
                        <a href="{{ route('admin.home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Admin</a>

                        
                    @endauth
            @endif
  </li>
</ul>

<li class="nav-item nav-profile dropdown mr-4">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset('images/faces/face5.jpg') }}" alt="profile"/>
              <span class="nav-profile-name">Louis Barnett</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              
              

              <form method="POST" action="{{route('logout')}}">
            @csrf
            <a class="dropdown-item" href="http://minomina.test/logout" onclick="event.preventDefault();
                         this.closest('form').submit();">
                         <i class="mdi mdi-logout text-primary"></i>
                         Salir</a>
        </form>
            </div>
          </li>

          
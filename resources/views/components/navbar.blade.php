<nav class="navbar navbar-expand-lg bg-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><i class="fa-solid fa-house"></i></a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @auth
            {{__('ui.ciao')}}, {{ Auth::user()->name}}
            @else
            {{__('ui.ciao-accedi')}}
            @endauth
          </a>
          <ul class="dropdown-menu">
            @guest
            <li><a class="dropdown-item" href="{{route('register')}}">{{__('ui.registrati')}}
            </a></li>
            <li><a class="dropdown-item" href="{{route('login')}}">{{__('ui.Accedi')}}</a></li>
            @else
            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();" >{{__('ui.log')}}</a></li>
              <form action="{{route('logout')}}" method="POST" id="form-logout">@csrf</form>
            @endguest
          </ul>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="{{route('announcement_index')}}">{{__('ui.annunci')}}</a>
        </li>

        {{-- AUTENTICAZIONE --}}

        @auth   
    
        @if(Auth::user()->is_revisor)
        <li class="nav-item">
          <a class="nav-link   position-relative"
          aria-current="page" href="{{route ('revisor_index')}}">
          {{__('ui.revisore')}}
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{App\Models\Announcement::toBeRevisionedCount()}}
            <span class="visually-hidden">unread messages</span>
            </span>
          </a>
        </li>
      @endif
  @endauth
  {{-- FINE AUTENTICAZIONE --}}
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('ui.categoria')}}
          </a>
          <ul class="dropdown-menu">
            @foreach($categories as $category)
            <li><a class="dropdown-item" href="{{route('category_show', compact ('category'))}}">{{__("ui.$category->name")}}</a></li>
            @endforeach
          </ul>
        </li>

        
        <li class="nav-item">
          <a class="nav-link" href="{{route('announcement_create')}}">{{__('ui.inserisci-annunci')}}</a>
        </li>
        
        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @auth
            {{__('ui.ciao')}}, {{ Auth::user()->name}}
            @else
            {{__('ui.ciao-accedi')}}
            @endauth
          </a>
          <ul class="dropdown-menu">
            @guest
            <li><a class="dropdown-item" href="{{route('register')}}">{{__('ui.registrati')}}
            </a></li>
            <li><a class="dropdown-item" href="{{route('login')}}">{{__('ui.accedi')}}</a></li>
            @else
            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();" >{{__('ui.log')}}</a></li>
              <form action="{{route('logout')}}" method="POST" id="form-logout">@csrf</form>
            @endguest
          </ul>
        </li> --}}
        
      </ul>
      <div class="dropdown mx-3">
        <button class="btn dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-earth-americas" style="color: #ffffff;"></i>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"> <x-_locale lang="it" /> </a></li>
          <li><a class="dropdown-item" href="#">  <x-_locale lang="en" /> </a></li>
          <li><a class="dropdown-item" href="#">  <x-_locale lang="es" /> </a></li>
        </ul>
      </div>
      
      <form action="{{route('search_announcements')}}" method="GET" class="d-flex">
          <input name="searched" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline" type="submit"><i class="fa-solid fa-magnifying-glass" type="submit"></i></button>
      </form>
      </div>
    </div>
   
  </nav>
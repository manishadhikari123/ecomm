
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">SportsHub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">order</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
        </ul>
   
        <form action="/search" class="d-flex" role="search">
          <input type="text" name="query" class="form-control search-box"  placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" float="left" type="submit">Search</button>
        </form>

      
  @if(Session::has('user'))
    <ul class="navbar-nav mr-auto ">
      <li class="header-cart">
        <a  href="/cartlist">cart</a>
      </li>
      @endif



    @if(Session::has('user'))
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{Session::get('user')['name']}}</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/logout">Logout</a></li>
        </ul>
      </li>
    @else
    <ul class="navbar-nav mr-auto ">
      <li><a class="header-login" href="/login">Login</a></li>
      </ul>

    @endif
</ul>
        
          
        
        
      

        
      
    </div>
  </div>
</nav>

<nav class="navbar navbar-expand-lg bg-light" style="padding: 20px;">
  <div class="container-fluid">
    <a class="navbar-brand" href="/contactus">SportsHub</a>
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
          <a href="aboutus" class="nav-link">About Us</a>
        </li>

        <li>
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            category
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">football</a>
            <a class="dropdown-item" href="#">cricket</a>
            <a class="dropdown-item" href="#">badminton</a>
            <a class="dropdown-item" href="#">table Tennis</a>
            <a class="dropdown-item" href="#">volleyball</a>

          </div>
        </div>

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
      <li><a class="header-login" href="/register">Register</a></li>
      </ul>

    @endif
</ul>
        
          
        
        
      

        
      
    </div>
  </div>
</nav>
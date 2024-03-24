<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    
    <link rel="stylesheet" href="{{url('/frontend/css/style.css')}}">
  </head>
  <body>
    <div class="grid-container">

     
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <span class="material-icons-outlined">search</span>
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span>
          <span class="material-icons-outlined">account_circle</span>
        </div>
      </header>
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">mood</span> LOGO
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="#">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#">
              <span class="material-icons-outlined">leaderboard</span> Leaderboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#">
              <span class="material-icons-outlined">forum</span> Forum
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#">
              <span class="material-icons-outlined">phone</span> Support
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#">
              <span class="material-icons-outlined">email</span> Messages
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#">
              <span class="material-icons-outlined">settings</span> Settings
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="{{url('/logout')}}">
              <span class="material-icons-outlined">logout</span> Logout
            </a>
          </li>
        </ul>
      </aside>
      
       
      <main class="main-container">
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>
        @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                    @endif
                    <div>
                      Hello, {{$data->name}}
                    </div>
        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <h2>LIKES</h2>
              <span class="material-icons-outlined">thumb_up</span>
            </div>
            <h1>4,021</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h2>SUBSCRIBERS</h2>
              <span class="material-icons-outlined">subscriptions</span>
            </div>
            <h1>8,731</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h2>FOLLOWERS</h2>
              <span class="material-icons-outlined">groups</span>
            </div>
            <h1>3,841</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h2>MESSAGES</h2>
              <span class="material-icons-outlined">forum</span>
            </div>
            <h1>1,962</h1>
          </div>

        </div>

        <div class="products">

          <div class="product-card">
            <h2 class="product-description">Latest Updates</h2>
            <p class="text-secondary">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce laoreet facilisis nulla, consectetur pulvinar diam. Aliquam tempus vel quam.
            </p>
            <button type="button" class="product-button">
              <span class="material-icons-outlined">add</span>
            </button>
          </div>

          <div class="social-media">
            <div class="product">

              <div>
                <div class="product-icon background-red">
                  <i class="bi bi-twitter"></i>
                </div>
                <h1 class="text-red">+274</h1>
                <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
  
              <div>
                <div class="product-icon background-green">
                  <i class="bi bi-instagram"></i>
                </div>
                <h1 class="text-green">+352</h1>
                <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
  
              <div>
                <div class="product-icon background-orange">
                  <i class="bi bi-facebook"></i>
                </div>
                <h1 class="text-orange">-126</h1>
                <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
  
              <div>
                <div class="product-icon background-blue">
                  <i class="bi bi-linkedin"></i>
                </div>
                <h1 class="text-blue">+102</h1>
                <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
              
            </div>
          </div>

        </div>
      </main>
      

    </div>

    <script src="{{url('/frontend/index.js')}}"></script>
  </body>
</html>
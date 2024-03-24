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
            <a href="">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="{{url('/admin/details')}}">
              <span class="material-icons-outlined">forum</span> Details
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="">
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
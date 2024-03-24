@extends('layouts.main')
@section('main-container')
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
@endsection    
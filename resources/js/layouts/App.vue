<template>
<!--    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <router-link :to="{ name: 'home' }" class="navbar-brand">Laravel-Vue SPA</router-link>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link class="nav-link" data-toggle="collapse" :to="{ name: 'home' }">Home</router-link>
                    </li>

                    <li class="nav-item">
                        <router-link class="nav-link" data-toggle="collapse" :to="{ name: 'about' }">About</router-link>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>-->

<main>
  <h1 class="visually-hidden">Sidebars examples</h1>

  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <router-link :to="{ name: 'home' }" class="nav-link text-white" aria-current="page">
          
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
<!--          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>-->
          Home
        </router-link>
      </li>
      <li>
        <router-link :to="{ name: 'testpage' }" class="nav-link text-white" aria-current="page">
          
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
<!--          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>-->
          Test Page
        </router-link>
      </li>
      <li>
        <router-link :to="{ name: 'about' }" class="nav-link text-white" aria-current="page">
          
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
<!--          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>-->
          About
        </router-link>
      </li>
<!--      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Customers
        </a>
      </li>-->
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>

  <div class="b-example-divider"></div>

    <div class="container">
        <router-view></router-view>
    </div>  
</main>


</template>

<script>
    export default {
//        watch: {
//            $route() {
//                $("#navbarCollapse").collapse("hide");
//            },
//        },
    };
</script>

<template>

    <main>
        <h1 class="visually-hidden">Sidebars examples</h1>

        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4">Барахолка</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                <router-link :to="{ name: 'home' }" class="nav-link text-white" aria-current="page">

                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                    <!--          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>-->
                    Домой
                </router-link>
                </li>
                <li>
                <router-link :to="{ name: 'testpage' }" class="nav-link text-white" aria-current="page">

                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                    <!--          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>-->
                    Тестовая страница
                </router-link>
                </li>
                <li>
                <router-link :to="{ name: 'about' }" class="nav-link text-white" aria-current="page">

                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                    <!--          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>-->
                    О нас
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
        </div>

        <!--            <div class="b-example-divider"></div>-->

        <div class="container-fluid">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <!--                <li class="nav-item dropdown">
                                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Dropdown
                                              </a>
                                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                              </ul>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link disabled">Disabled</a>
                                            </li>-->
                        </ul>
                        <form class="d-flex">
                            <input class="form-control" type="search" placeholder="Поиск" aria-label="Search">
                            <button class="btn btn-outline-success me-3" type="submit">Search</button>
                            <button type="button" class="btn btn-outline-light md-2 me-3">Войти</button>
                            <button type="button" class="btn btn-warning md-2 me-3">Регистрация</button>
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                                    <strong>user</strong>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                    <li><a class="dropdown-item" href="#">New project...</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                                </ul>
                            </div>                            
                        </form>
                    </div>            

                </div>
            </nav>
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

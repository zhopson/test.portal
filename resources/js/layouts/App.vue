<template>
    <div class="root">
<header class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Купи-Продай</a>
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Домой</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/testpage">Объявления</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">О нас</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
    <form class="d-flex mb-2 mt-2">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success me-5" type="submit">Search</button>

        <button type="button" class="btn btn-outline-light md-2 me-2">Войти</button>
        <button type="button" class="btn btn-warning md-2 me-4">Регистрация</button>

        <div class="dropdown mt-2 me-4">
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
</header>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column" v-if="cats">
                            <li class="nav-item" v-for="{ id, name } in cats">
                                <a class="nav-link" aria-current="page" href="#" @click.prevent="onLoadCats(id,name)">
                                    <span data-feather="home"></span>
                                    {{ name }}
                                </a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="/testpage">
                                    <span data-feather="file"></span>
                                    Тестовая страница
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about">
                                    <span data-feather="users"></span>
                                    О нас
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="shopping-cart"></span>
                                    Customers
                                </a>
                            </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="#">
                                          <span data-feather="bar-chart-2"></span>
                                          Reports
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="#">
                                          <span data-feather="layers"></span>
                                          Integrations
                                        </a>
                                      </li>-->
                        </ul>

                        <!--        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                  <span>Saved reports</span>
                                  <a class="link-secondary" href="#" aria-label="Add a new report">
                                    <span data-feather="plus-circle"></span>
                                  </a>
                                </h6>
                                <ul class="nav flex-column mb-2">
                                  <li class="nav-item">
                                    <a class="nav-link" href="#">
                                      <span data-feather="file-text"></span>
                                      Current month
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#">
                                      <span data-feather="file-text"></span>
                                      Last quarter
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#">
                                      <span data-feather="file-text"></span>
                                      Social engagement
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#">
                                      <span data-feather="file-text"></span>
                                      Year-end sale
                                    </a>
                                  </li>
                                </ul>-->
                    </div>
                </nav>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <router-view></router-view>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
     data() {
         return {
             cats: null,
       };
     },
        created() {
            this.getCats(1);
        },
        methods: {
            getCats: function (id) {
              //this.error = this.cats = null;
              //this.loading = true;

            this.$http({
              url: '/get_cats/'+id,
              method: "GET"
            })
            .then(response => {
                this.cats = response.data.data;
                //this.loading = false;
              })
            .catch(error => {
                console.log(error);
                //this.loading = false;
                //this.error = error.response.data.message || error.message;
              });
            },
            onLoadCats(id,name) {
                //console.log('Component executed.')
                //this.$emit('call-get-cats',id, name);
                //alert(id);
            },
        }
//        watch: {
//            $route() {
//                $("#navbarCollapse").collapse("hide");
//            },
//        },
    };
</script>

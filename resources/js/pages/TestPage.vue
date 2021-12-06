<template>

    <!--.card {
    overflow-y: scroll;
    white-space: nowrap;
    max-height: 350px;
    padding: 1rem;
    }-->

    <div class="container-fluid mt-3 mb-4">
<!--        <example-component></example-component>-->
        <div class="row mt-4">

            <div class="col-md-11">

                <div v-if="error" class="alert alert-danger" role="alert">
                    <p>A simple danger alert—check it out!</p>
                    <p>{{ error }}</p>
                </div>

                <div class="loading" v-if="loading">Loading...</div>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">{{ cat_title }}</h1>
                </div>

                <cbc-component v-bind:catsTree="catsTree" @call-get-cats-tree="handleGetCats"></cbc-component>

                <!--                <div class="card">
                                    <div class="card-header">Выберите категорию</div>

                                    <div class="card-body">
                                    </div>
                                </div>-->

                <div v-show="visibleNewCatBlock" class="input-group mb-3">
                    <input type="text" v-model="category.name" class="form-control" placeholder="Наименование новой категории" aria-label="Наименование категории" aria-describedby="button-addon2">
                    <button v-on:click="SaveNewCat()" class="btn btn-outline-secondary" type="button" id="button-addon2">Добавить</button>
                </div>
                <div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center pt-3 pb-1 mb-3">
                    <button v-on:click="visibleNewCatBlock=!visibleNewCatBlock" type="button" class="btn btn-info mb-4 ">{{visibleNewCatBlock?'Отмена':'Новая категория'}}</button>
                </div>

                <cats-component v-bind:cats="cats" @call-get-cats="handleGetCats"></cats-component>

<!--                <div class="row row-cols-1 row-cols-md-6 g-4" v-if="cats">
                    <div class="col-sm d-flex" v-for="{id, name } in cats">
                        <div class="card card-body flex-fill">
                            <button type="button" class="btn btn-link" @click.prevent="onLoadCats(id)">{{ name }}</button>
                        </div>
                    </div>     -->




<!--                    <div class="col-sm d-flex">
                        <div class="card card-body flex-fill">
                            <button type="button" class="btn btn-link">Категория1</button>
                        </div>
                        <div class="col-sm d-flex">
                        <div class="card card-body flex-fill">
                            <button type="button" class="btn btn-link">Категория21</button>
                        </div>
                    </div>
                </div>-->

            </div>
        </div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
            <h1 class="h2">Последние объявления</h1>
        </div>
        <!--        <div class="row mt-4 mb-7">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="card-header">Тестовая страница</div>

                            <div class="card-body">-->

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a short card.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--                    </div>

                        </div>
                    </div>
                </div>-->

    </div>


</template>

<script>
    export default {
        data() {
            return {
                cat_id: 1,
                loading: false,
                cats: null,
                catsTree: null,
                error: null,
                cat_title: 'Выберите категорию',
                visibleNewCatBlock: false,
                category: {
                    name: '',
                    parent_id: 0,
                }
            };
        },
        created() {
            //alert('cat_id from router = ' + this.$route.params.cat_id);
            //this.cat_id = this.$route.params.cat_id;
            //this.cat_title = this.$route.params.cat_title;

            //alert('this.cat_id = ' + this.cat_id);
            if (this.$route.params.cat_id != undefined) { this.cat_id = this.$route.params.cat_id; }

            //this.$parent.cat_title = this.cat_title;
            this.getCats(this.cat_id);
            this.getCatsTree(this.cat_id);

        },
        computed: {
            catsTreeLastItem() {
                return this.catsTree[this.catsTree.length -1].name;
            }
        },
        methods: {
            getCats: function (id) {
              this.error = this.cats = null;
              this.loading = true;

            this.$http({
              url: '/get_cats/'+id,
              method: "GET"
            })
            .then(response => {
                this.cats = response.data.data;
                this.loading = false;
              })
            .catch(error => {
                console.log(error);
                this.loading = false;
                this.error = error.response.data.message || error.message;
              });
            },
            getCatsTree: function (id) {
              this.error = this.catsTree = null;
              this.loading = true;

            this.$http({
              url: '/get_cats_tree/'+id,
              method: "GET"
            })
            .then(response => {
                this.catsTree = response.data.data;
                // this.cat_title = this.catsTree[this.catsTree.length -1].name;
                this.cat_title = this.catsTreeLastItem;
                this.loading = false;
              })
            .catch(error => {
                console.log(error);
                this.loading = false;
                this.error = error.response.data.message || error.message;
              });
            },
            handleGetCats(id, cat_name) {
                this.getCats(id);
                this.getCatsTree(id);
                this.cat_title = cat_name;
                this.category.parent_id = id;
            },
            SaveNewCat() {
//                alert("name = "+this.category.name+", parent id = "+this.category.parent_id);
//                this.saving = true
                this.message = false
                    this.$http({
                        url: '/save_cat',
                        method: 'POST',
                        params: this.category
                    })
                    .then((response) => {
                        //window.location.reload();
                        this.getCats(this.category.parent_id);
                        this.getCatsTree(this.category.parent_id);

                        this.category.name = "";
                        this.visibleNewCatBlock = false;
                        //this.$forceUpdate();
                        //this.$router.push({ name: 'users.edit', params: { id: response.data.data.id } });
                    })
                    .catch((e) => {
                        this.message = e.response.data.message || 'There was an issue creating the category.';
                    })
//                    .then(() => this.saving = false)
            }


            // handleGetCatsTree(id, cat_name) {
            //     this.handleGetCats(id, cat_name);
            // },
//            onLoadCats: function (id) {
//                this.getCats(id);
//            },
        }
    }
</script>

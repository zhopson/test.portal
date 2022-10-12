<template>
  <div class="container-fluid mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Настройка фильтров</h1>
        </div>

        <div class="loading" v-if="loading">Loading...</div>

            <div v-if="error" class="alert alert-danger" role="alert">
                <p>A simple danger alert—check it out!</p>
                <p>{{ error }}</p>
            </div>

            <div v-if="msg" class="alert alert-success" role="alert">
                <p>{{ msg }}</p>
            </div>

<!-- ////////////////////////////////////////////////////// -->

      <div class="col-md-4">
        <div class="card">
          <div class="card-header">Категории</div>

          <div class="card-body">Дерево категорий</div>

<!-- ////////////////////////////////////////////////////// -->

            <!-- the demo root element -->
            <ul id="demo">
            <tree-item
                class="item"
                :item="treeData"
                @make-folder="makeFolder"
                @add-item="addItem"
                @set-params-filters="setParamsFilters"
            ></tree-item>
            </ul>


        </div>
      </div>
      <div class="col-md-7">
        <div class="card">
          <div class="card-header">Фильтры</div>

          <div class="card-body">
                <h6>Новый параметр</h6>
                <div class="mb-2 mt-3">
                    <label for="nameInput1" class="form-label">Имя параметра</label>
                    <input type="text" class="form-control form-control-sm" v-model="newParam.name" id="nameInput1" placeholder="Название">
                </div>
                <div class="mb-2">
                    <label for="TypeSelect1" class="form-label">Тип параметра</label>
                    <select v-model="newParam.type" :options="param_types" class="form-select form-select-sm" id="TypeSelect1" aria-label="">
                        <option value="0" selected>Выберите тип</option>
                        <option v-for="param_type in param_types" v-bind:key=param_type.value v-bind:value="param_type.value">
                            {{ param_type.text }}
                        </option>
                    </select>
                </div>

                <div class="card mb-2">
                    <div class="row justify-content-center">
                        <div class="col-11 mt-2">
                            <form v-on:submit.prevent="addNewValue">
                                <div class="input-group">
                                    <input type="text" v-model="newValueText" class="form-control form-control-sm" id="nameValue" placeholder="Новое значение">
                                    <button>Добавить</button>
                                </div>
                            </form>
                            <ul>
                                <li
                                is="param-value-item"
                                v-for="(val, index) in newParamValues"
                                v-bind:key="val.id"
                                v-bind:name="val.name"
                                v-on:remove="newParamValues.splice(index, 1)"
                                ></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center">
                    <button @click="saveParam" type="button" class="btn btn-info mb-2 ">Сохранить</button>
                </div>
                <div class="table-responsive">
                <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Значения</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="params in params_filters" :key="params.id">
                        <th scope="row">{{ params.id }}</th>
                        <td>{{ params.name }}</td>
                        <td>{{ getParamType(params.par_type_id) }}</td>
                        <td>
                            <ul class="list-group">
                                <li v-for="vals in params.dop_par_values" :key="vals.id" class="list-group-item">{{ getParValue(vals) }}</li>
                                <!-- <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                                <li class="list-group-item">A fourth item</li>
                                <li class="list-group-item">And a fifth one</li> -->
                            </ul>
                        </td>
                        <td>edit</td>
                    </tr>
                </tbody>
                </table>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
    data() {
        return {
            // treeData : {
            //     name: "My Tree",
            //     children: [
            //     { name: "hello" },
            //     { name: "wat" },
            //     {
            //         name: "child folder",
            //         children: [
            //         {
            //             name: "child folder",
            //             children: [{ name: "hello" }, { name: "wat" }]
            //         },
            //         { name: "hello" },
            //         { name: "wat" },
            //         {
            //             name: "child folder",
            //             children: [{ name: "hello" }, { name: "wat" }]
            //         }
            //         ]
            //     }
            //     ]
            // }
            newParamValues: [],
            newParam: {},
            newValueText: '',
            nextValueId: 0,
            loading: false,
            error: null,
            msg: null,
            treeDataArr: null,
            treeData : null,
            params_filters: null,
//            selected_param_type: null,
            param_types: [],
            current_parent_id : null,
        };
    },
    mounted() {
        this.getAllCatsTree()
        this.getParamTypes()
    },
    watch: {
        // 'selected_param_type'(v) {
        //     alert(this.selected_param_type)
        // }
    },
    methods: {
        makeFolder: function(item) {
            Vue.set(item, "children", []);
            this.addItem(item);
        },
        addItem: function(item) {
            item.children.push({
                name: "new stuff"
            });
        },
        getAllCatsTree: function () {
            this.error = this.treeData = this.treeDataArr = null;
            this.loading = true;

            this.$http({
                url: '/get_tree_all',
                method: "GET"
            })
            .then(response => {
                this.treeDataArr = response.data;
                this.treeData = this.treeDataArr[0];
                this.loading = false;
                })
            .catch(error => {
                console.log(error);
                this.loading = false;
                this.error = error.response.data.message || error.message;
                });
        },
        getParamTypes: function () {
            this.error = this.param_types = null;
            this.loading = true;

            this.$http({
                url: '/get_filter_param_types',
                method: "GET"
            })
            .then(response => {
                this.param_types = response.data.data;
                //console.log(response.data.data);
                // this.treeData = this.treeDataArr[0];
                this.loading = false;
                })
            .catch(error => {
                console.log(error);
                this.loading = false;
                this.error = error.response.data.message || error.message;
                });
        },
        setParamsFilters: function({pf, pid}) {
            //alert("pid = " + pid)
            this.params_filters = pf
            this.current_parent_id = pid
        },
        saveParam: function() {
            if (this.current_parent_id) {
                //alert(this.current_parent_id);
                this.msg = null;
                let outDopParValues=[];
                let pType = this.newParam.type

                this.newParamValues.forEach(function(item, index, array) {
                    let int_value = null
                    let str_value = null
                    let bool_value = null
                    if (pType === 1)
                        int_value = item.name
                    else if (pType === 2)
                        str_value = item.name
                    else if (pType === 3)
                        bool_value = item.name
                    outDopParValues.push({
                        int_value: int_value,
                        str_value: str_value,
                        bool_value: bool_value
                    })

                });
                const data = {
                    newDopPar: this.newParam,
                    newDopParValues: outDopParValues,
                    newCatId: this.current_parent_id
                }
                this.$http
                .post('/save_cat_param', data)
                .then((response) => {
                    this.msg = "Параметр добавлен"
                    //window.location.reload();

                    //this.$forceUpdate();
                    //this.$router.push({ name: 'users.edit', params: { id: response.data.data.id } });
                })
                .catch((e) => {
                    this.msg = e.response.data.message || 'There was an error while creating category param.';
                })
            }

        },
        addNewValue: function () {
            if (this.newValueText) {
                this.newParamValues.push({
                    id: this.nextValueId++,
                    name: this.newValueText
                })
                this.newValueText = ''
            }
        },
        getParamType(id) {
            if (id) {
                let ob = this.param_types.find(el => el.value == id);
                console.log(ob);
                if (ob)
                    return ob.text
                else return null;
            }
            else
                return null;
        },
        getParValue(ob) {
            if (ob.int_value) return ob.int_value
            else if (ob.str_value) return ob.str_value
            else if (ob.bool_value) return ob.bool_value
            else return null;
        }
    }
}
</script>
<style>
/* body {
  font-family: Menlo, Consolas, monospace;
  color: #444;
} */
.item {
  cursor: pointer;
}
.bold {
  font-weight: bold;
}
ul {
  padding-left: 1em;
  line-height: 1.5em;
  list-style-type: none;
}
</style>

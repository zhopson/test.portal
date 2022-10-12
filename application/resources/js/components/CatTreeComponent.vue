<template>
<div class="root-element">

        <!-- <div v-if="error" class="alert alert-danger" role="alert">
            <p>A simple danger alert—check it out!</p>
            <p>{{ error }}</p>
        </div>

        <div class="loading" v-if="loading">Loading...</div> -->

        <li v-if="item">
          <div
            :class="{ bold: isFolder }"
            class = "item1"
            :id="item.id" :ref="item.id"
            tabindex = "0"
            @click="toggle(item.id)"
            @dblclick="makeFolder">
            <span v-if="isFolder">{{ isOpen ? 'ᐅ' : 'ᐁ' }}</span>
            {{ item.name }}
            <!-- <span v-if="isFolder"             , active: isActive
                :class="'glyphicon' + isOpen ? 'glyphicon-triangle-bottom' : 'glyphicon-triangle-right'" aria-hidden="true"
            ></span> -->
          </div>
          <ul v-show="isOpen" v-if="isFolder">
            <tree-item
              class="item"
              v-for="(child, index) in item.children"
              :key="index"
              :item="child"
              @make-folder="$emit('make-folder', $event)"
              @add-item="$emit('add-item', $event)"
              @set-params-filters="$emit('set-params-filters', $event)"
            ></tree-item>
            <li class="add" @click="$emit('add-item', item)">+</li>
          </ul>
        </li>
      <!-- </script> -->
</div>

</template>

<script>
    export default {
        props: {
            // method: { type: Function },
            // sub_cats: Array,
            // tree_id: String,
            // tree_id_target: String,
            // name_cat_root: String,
            // level_: Number,
            //name_cat: String,
            item: Object,
            method: { type: Function },
        },
        data: function() {
          return {
            isOpen: false,
            error: null,
            loading: false,
            //isActive: false,
            //activeItemId: 0,
            // prev_activeItemId: 0
            params_filters: null,
          };
        },
        // created() {
        //     document.addEventListener('focus', this.focusChangedIn)
        //     document.addEventListener('blur', this.focusChangedOut)
        // },
        // beforeDestroy() {
        //     document.removeEventListener('focus', this.focusChangedIn)
        //     document.removeEventListener('blur', this.focusChangedOut)
        // },
        computed: {
          isFolder: function() {
            return this.item && this.item.children && this.item.children.length;
          },
        },
        methods: {
          toggle: function(id) {
            if (this.isFolder) {
              this.isOpen = !this.isOpen;
            }
            this.getParams(id)
            //alert("id = " + id)
          },
          makeFolder: function() {
            if (!this.isFolder) {
              this.$emit("make-folder", this.item);
              this.isOpen = true;
            }
          },
          getParams: function(id) {
            this.error = this.params_filters = null;
            this.loading = true;

            this.$http({
              url: '/get_filter_params/'+id,
              method: "GET"
            })
            .then(response => {
                this.params_filters = response.data.data;
                //alert("id = " + id)
                this.$emit("set-params-filters", { pf: this.params_filters, pid: id });
                this.loading = false;
              })
            .catch(error => {
                console.log(error);
                this.loading = false;
                this.error = error.response.data.message || error.message;
              });
          },
            // focusChangedIn (event) {
            //     const el = event.target
            //     // do something with the element.
            //     this.isActive = true
            //     alert("focusChangedIn")
            // },
            // focusChangedOut (event) {
            //     const el = event.target
            //     // do something with the element.
            //     this.isActive = false
            //     alert("focusChangedOut")
            // }
        }

    }
</script>
 <style>
:focus {
    background-color: rgb(14, 87, 105);
    color: rgb(245, 247, 245);
    opacity: 0.5;
}
/* .active {
    background-color: rgb(61, 8, 92);
    color: rgb(245, 247, 245);
} */
.item1:hover { outline: 1px dashed green; }

 </style>


<template>
    <div class="row row-cols-1 row-cols-md-6 g-4" v-if="cats">
                    <div class="col-sm d-flex" v-for="{id, name } in cats">
                        <div class="card card-body flex-fill">
                            <button type="button" class="btn btn-link" v-on:click="onLoadCats(id, name)">{{ name }}</button>
                        </div>
                    </div>     
    </div>
</template>

<script>
    export default {
        props: {
            method: { type: Function },
            cats:Array,
        },
        methods: {
        onLoadCats(id,name) {
            console.log('Component executed.')
            this.$emit('call-get-cats',id, name);
            //alert(id);
        },
        }
    }
</script>

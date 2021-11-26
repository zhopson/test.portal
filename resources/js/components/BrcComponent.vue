<template>
                <nav aria-label="breadcrumb" v-if="catsTree">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item" v-for="{id, name } in catsTree"><a href="onLoadCatsTree(id,name)">{{ name }}</a></li>
<!--                    <li class="breadcrumb-item active" aria-current="page">Data</li>-->
                  </ol>
                </nav> 

</template>

<script>
    export default {
        props: {
            method: { type: Function },
            catsTree:Array,
        },
        methods: {
            onLoadCatsTree(id, name) {
                console.log('Component executed.')
                this.$emit('call-get-cats-tree', id, name);
                //alert(id);
            },
        }
    }
</script>

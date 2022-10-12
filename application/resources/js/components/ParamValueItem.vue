<template>
    <li>
      {{ name }}
      <button v-on:click="$emit('remove')">Удалить</button>
    </li>
</template>

<script>
    export default {
        props: ['name'],
    }
</script>

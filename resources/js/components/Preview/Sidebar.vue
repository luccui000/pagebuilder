<template>
    <ul class="list-group sidebar-group">
        <li
            v-for="item in data.items"
            :key="item.id"
            class="list-group-item"
        >
            <a :href="item.link">{{ item.name }}</a>
        </li>
    </ul>
</template>

<script>
export default {
    name: "Sidebar",
    props: ['data'],
    setup() {

    }
}
</script>

<style scoped>

</style>

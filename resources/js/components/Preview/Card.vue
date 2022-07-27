<template>
    <div class="card">
        <img class="card-img-top" :src="data.image" alt="Card image cap">
        <h5 class="card-title">{{ data.title }}</h5>
        <p class="card-text">{{ data.description }}</p>
        <a :href="data.link_product" class="btn btn-primary">Go somewhere</a>
    </div>
</template>

<script>
export default {
    name: "Card",
    props: ['data']
}
</script>

<style scoped>

</style>

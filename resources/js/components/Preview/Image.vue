<template>
    <div class="image-wrapper">
        <a :href="data.link" class="">
            <img :src="data.url" alt="">
        </a>
    </div>
</template>

<script>
export default {
    name: "Image",
    props: ['data'],
    setup() {

    }
}
</script>

<style scoped>
.image-wrapper a img {
    width: 100%;
}
</style>

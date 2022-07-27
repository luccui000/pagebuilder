<template>
    <div :id="['preview-carousel' + data.id + data.carousel_id]" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div
                v-for="(carousel, index) in data.carousels"
                class="carousel-item"
                :class="{ 'active': index === 0}"
            >
                <img class="d-block w-100" :src="carousel.background_image" alt="First slide">
            </div>
        </div>
        <a class="carousel-control-prev" :href="['#preview-carousel' + data.id + + data.carousel_id]" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" :href="['#preview-carousel' + data.id + + data.carousel_id]" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</template>

<script>
export default {
    name: "Carousel",
    props: ['data'],
    setup() {

        return {
        };
    }
}
</script>

<style scoped>

</style>

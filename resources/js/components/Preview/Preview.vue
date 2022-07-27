<template>
    <div class="row mt-2" v-for="rows in page" :key="rows.id" >
        <div v-for="col in rows.cols" :class="['col-' + 12 / rows.col_num]" >
             <card v-if="col.rowitems_type === 'CARD'" :data="col.data" />
             <carousel v-if="col.rowitems_type === 'CAROUSEL'" :data="col.data" />
             <Image v-if="col.rowitems_type === 'IMAGE'" :data="col.data" />
            <sidebar v-if="col.rowitems_type === 'SIDEBAR'" :data="col.data" />
            <paragraph v-if="col.rowitems_type === 'PARAGRAPH'" :data="col.data" />
        </div>
    </div>
</template>

<script>
import Card from "./Card.vue";
import Carousel from "./Carousel.vue";
import Image from "./Image.vue";
import Sidebar from "./Sidebar.vue";
import Paragraph from "./Paragraph.vue";

export default {
    name: "Preview",
    components: {Sidebar, Carousel, Card, Image,Paragraph},
    props: ['page'],
    setup() {

    }
}
</script>

<style scoped>

</style>

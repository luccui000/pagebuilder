<template>
    <div class="container">
        <div v-for="row in content" :key="row.id" class="row mt-2">
            <div v-for="col in row" :key="col.id" :class="['col-' + 12 / col.col_num]">
                <card v-if="col.items.type === 'CARD'" :data="col.items.data" />
                <carousel v-if="col.items.type === 'CAROUSEL'" :data="col.items.data" />
                <Image v-if="col.items.type === 'IMAGE'" :data="col.items.data" />
                <sidebar v-if="col.items.type === 'SIDEBAR'" :data="col.items.data" />
                <paragraph v-if="col.items.type === 'PARAGRAPH'" :data="col.items.data" />
            </div>
        </div>
    </div>
    <Footer />
</template>

<script>
import {useRoute} from "vue-router";
import {onMounted, ref} from "vue";
import axios from "axios";
import Card from '../components/Preview/Card.vue';
import Carousel from '../components/Preview/Carousel.vue';
import Paragraph from '../components/Preview/Paragraph.vue';
import Image from '../components/Preview/Image.vue';
import Sidebar from '../components/Preview/Sidebar.vue';
import Footer from "../components/Preview/Footer.vue";

export default {
    name: "Render",
    components: {
        Card,
        Carousel,
        Paragraph,
        Image,
        Sidebar,
        Footer
    },
    setup() {
        const route = useRoute();
        const { slug } = route.params;
        const content = ref(null)

        onMounted(() => {
            axios.get(`/api/page/${slug}`)
                .then(response => {
                    console.log(response.data)
                    content.value = response.data
                })
        })

        return {
            content
        }
    }
}
</script>

<style scoped>

</style>

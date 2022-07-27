<template>
    <div class="card">
        <div class="card-body carousel"
             data-toggle="modal"
             @click="getCarousel"
             :id="['openCarousel' + row.id + col.id + data.id]"
             :data-target="['#editCarousel' + row.id + col.id + data.id]"
        >
            <i class="fa fa-pencil"></i>
        </div>
    </div>
    <div v-if="slider" :id="['view-carousel' + row.id + col.id + data.id + slider.id ]" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div
                v-for="(carousel, index) in slider.carousels"
                class="carousel-item"
                :class="{ 'active': index === 0}"
            >
                <img class="d-block w-100" :src="carousel.background_image" alt="First slide">
            </div>
        </div>
        <a class="carousel-control-prev" :href="['#view-carousel' + row.id + col.id + data.id + slider.id ]" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" :href="['#view-carousel' + row.id + col.id + data.id + slider.id ]" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="modal fade" :id="['editCarousel' + row.id + col.id + data.id]" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="min-width: 1500px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Sửa thông tin carousel</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div v-for="slider in sliders" :key="slider.id" class="row mt-2">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2"></div>
                                                <div class="col-8">
                                                    <div :id="['carousel' + row.id + col.id + data.id + slider.id ]" class="carousel slide" data-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div
                                                                v-for="(carousel, index) in slider.carousels"
                                                                class="carousel-item"
                                                                :class="{ 'active': index === 0}"
                                                            >
                                                                <img class="d-block w-100" :src="carousel.background_image" alt="First slide">
                                                            </div>
                                                        </div>
                                                        <a class="carousel-control-prev" :href="['#carousel' + row.id + col.id + data.id + slider.id ]" role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" :href="['#carousel' + row.id + col.id + data.id + slider.id ]" role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-2 d-flex justify-content-center align-items-center">
                                                    <input name="ckb" v-model="selectedId" :value="slider.id" type="radio" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button @click="handleSave" class="btn btn-success btn-save">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, onMounted, ref} from "vue";
import axios from "axios";

export default {
    name: "Carousel",
    props: ['row', 'col', 'data'],
    setup(props) {
        const sliders = ref(null);
        const selectedId = ref(null);
        const slider = ref(null)

        const getCarousel = () => {
            axios.get('/api/slider')
                .then(response => {
                    sliders.value = response.data
                })
        }
        const handleSave = () => {
            if(window.confirm('Bạn có chắn chắn chọn slider này hay không ? ')) {
                props.data.carousel_id = selectedId.value;
                document.querySelector(`#openCarousel${props.row.id}${props.col.id}${props.data.id}`).click();
                axios.get(`/api/slider/${selectedId.value}`)
                    .then(response => {
                        props.data.carousels = response.data.carousels;
                        slider.value = response.data
                    })
            }
        }
        return {
            slider,
            sliders,
            selectedId,
            handleSave,
            getCarousel
        }
    }
}
</script>

<style scoped>
.carousel {
    background-color: #f5f5f5;
    cursor: pointer;
}
</style>

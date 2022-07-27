<template>
    <div class="row">
        <div class="col-12 d-flex justify-content-between">
            <div></div>
            <div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalThemMoi">
                    <i class="fa fa-plus"></i>Thêm mới
                </button>
                <button class="btn btn-danger ml-2"> <i class="fa fa-trash"></i> Xóa nhiều</button>
            </div>
        </div>
    </div>
    <div v-for="slider in sliders" :key="slider.id" class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <h3>{{ slider.name }}</h3>
                            <div>
                                <button class="btn btn-primary" @click="editSlider(slider.id)" data-toggle="modal" data-target="#modalAddCarousel">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button
                                    @click="activeSlider(slider.id)"
                                    class="btn ml-2"
                                    :class="[slider.status === 'Đã công bố' ? 'btn-success': 'btn-secondary']"
                                >
                                    {{  slider.status === 'Đã công bố' ? 'Đang bật' : 'Bật'  }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div :id="['carousel' + slider.id ]" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div
                                        v-for="(carousel, index) in slider.carousels"
                                        class="carousel-item"
                                        :class="{ 'active': index === 0}"
                                    >
                                        <img class="d-block w-100" :src="carousel.background_image" alt="First slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" :href="['#carousel' + slider.id ]" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" :href="['#carousel' + slider.id ]" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalThemMoi" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Thêm mới slider</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Tên slider</label>
                                <input v-model="sliderName" type="text" class="form-control" placeholder="Nhập tên slider">
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button @click="addNewSlider" class="btn btn-success">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAddCarousel" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Thêm mới carousel cho slider {{ editingSlider }}</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="carousel-single">
                                <div class="form-group">
                                    <label>Tên carousel</label>
                                    <input v-model="carousels.name" type="text" class="form-control" placeholder="Nhập tên carousel">
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input v-model="carousels.background_image" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nội dung hình ảnh</label>
                                    <input v-model="carousels.primary_text" type="text" class="form-control" placeholder="Nhập nội dung hình ảnh">
                                </div>
                                <button @click="addNewCarousel(editingSlider)" class="btn btn-success">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {ref, onMounted, reactive} from "vue";
import axios from "axios";
// import Carousel from "../components/Carousel/Carousel.vue";

export default {
    name: "Slider",
    components: {
        // Carousel
    },
    setup() {
        const sliders = ref(null);
        const newSliders = ref(1)
        const sliderName = ref('')
        const editingSlider = ref(null);

        const carousels = reactive({
            name: '',
            background_image: '',
            primary_text: ''
        })

        onMounted(() => {
            axios.get('/api/slider')
                .then(response => {
                    sliders.value = response.data
                })
        })

        const addNewSlider = () => {
            axios.post('/api/slider', {
                name: sliderName.value
            }).then(response => {
                axios.get('/api/slider')
                    .then(response => {
                        sliders.value = response.data
                    })
            }).catch(error => console.error(error))
        }
        const editSlider = (sliderId) => {
            editingSlider.value = sliderId;
        }
        const addNewCarousel = (sliderId) => {
            axios.post('/api/carousel', {
                slider_id: sliderId,
                name: carousels.name,
                background_image: carousels.background_image,
                primary_text: carousels.primary_text
            }).then(response => {
                carousels.name = '';
                carousels.background_image = '';
                carousels.primary_text = '';
                axios.get('/api/slider')
                    .then(response => {
                        sliders.value = response.data
                    })
            }).catch(error => console.error(error))
        }
        const activeSlider = (sliderId) => {
            axios.post('/api/slider/active', {
                slider_id: sliderId
            }).then(res => {
                axios.get('/api/slider')
                    .then(response => {
                        sliders.value = response.data
                    })
            }).catch(error => console.error(error))
        }
        return {
            sliders,
            carousels,
            addNewSlider,
            newSliders,
            sliderName,
            editSlider,
            editingSlider,
            addNewCarousel,
            activeSlider,
        }
    }
}
</script>

<style scoped>

</style>

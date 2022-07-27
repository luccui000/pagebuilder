<template>
    <div class="card image" :style="{'background-image': `url(${image.url})`}">
        <div
            class="card-body d-flex justify-content-center align-items-center"
            data-toggle="modal"
            :data-target="['#editImage' + data.id]"
        >
            <i class="fa fa-pencil"></i>
        </div>
    </div>

    <div class="modal fade" :id="['editImage' + data.id]" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="min-width: 600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Sửa thông tin hình ảnh</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nhập link ảnh</label>
                                <input v-model="image.url" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hoặc chọn link ảnh từ hệ thống</label>
                                <button
                                    @click="chooseImage"
                                    class="btn btn-success ml-4"
                                    data-toggle="modal"
                                    id="chs"
                                    :data-target="['#chooseImage' + data.id]">Chọn ảnh</button>
                            </div>
                            <div class="form-group">
                                <label>Liên kết khi click vào</label>
                                <input v-model="image.link" type="text" class="form-control">
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
    <div class="modal fade" :id="['chooseImage' + data.id]" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="min-width: 1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Chọn hình ảnh</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div v-for="im in images" :key="im.id" class="col-2">
                            <img :src="im.url" class="w-100 h-100" alt="" @click="setImage(im.url)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-success btn-save" >Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref } from "vue";
import HinhAnh from "../pages/HinhAnh.vue";
import axios from "axios";

export default {
    name: "Image",
    components: {HinhAnh},
    props: ['data'],
    setup() {
        const openModal = ref(false)
        const images = ref(null);
        const image = reactive({
            id: 0,
            url: '',
            link: ''
        })
        const chooseImage = () => {
            axios.get('/api/hinh-anh')
                .then(response => {
                    images.value = response.data;
                })
        }
        const handleSave = () => {
            console.log(image)
        }
        const setImage = (url) => {
            if(window.confirm('Bạn có chắc chắn chọn ảnh này ?')) {
                image.url = url;
                document.querySelector('#chs').click()
            }
        }
        return {
            image,
            openModal,
            images,
            handleSave,
            chooseImage,
            setImage
        }
    }
}
</script>

<style scoped>
.image {
    background-color: #f1f1f1;
    height: calc(100% - 40px);

}
</style>

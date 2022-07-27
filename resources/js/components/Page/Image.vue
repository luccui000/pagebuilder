<template>
    <div class="card">
        <div class="card-body image-wrapper"
             data-toggle="modal"
             :id="['openImage' + row.id + col.id + data.id]"
             :data-target="['#editImage' + row.id + col.id + data.id]"
        >
            <i class="fa fa-pencil"></i>
        </div>
        <img :src="data.url" alt=""/>
    </div>
    <div class="modal fade" :id="['editImage' + row.id + col.id + data.id]" tabindex="-1" role="dialog">
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
                                <input v-model="data.url" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hoặc chọn link ảnh từ hệ thống</label>
                                <button
                                    @click="chooseImage"
                                    class="btn btn-success ml-4"
                                    data-toggle="modal"
                                    :id="['modalImage' + row.id + col.id + data.id]"
                                    :data-target="['#chooseImage' + row.id + col.id + data.id]"
                                >Chọn ảnh</button>
                            </div>
                            <div class="form-group">
                                <label>Liên kết khi click vào</label>
                                <input v-model="data.link" type="text" class="form-control">
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
    <div class="modal fade" :id="['chooseImage' + row.id + col.id + data.id]" tabindex="-1" role="dialog">
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
import axios from "axios";
import {ref} from "vue";

export default {
    name: "Image",
    props: ['row', 'col', 'data'],
    setup(props) {
        const images = ref(null);
        const chooseImage = () => {
            axios.get('/api/hinh-anh')
                .then(response => {
                    images.value = response.data;
                })
        }

        const setImage = (url) => {
            if(window.confirm('Bạn có chắc chắn chọn ảnh này chứ ?')) {
                props.data.url = url
                document.querySelector(`#modalImage${props.row.id}${props.col.id}${props.data.id}`).click()
            }
        }

        const handleSave = () => {
            document.querySelector(`#editImage${props.row.id}${props.col.id}${props.data.id}`).click()
        }

        return {
            images,
            chooseImage,
            setImage,
            handleSave
        }
    }
}
</script>

<style scoped>
.image-wrapper {
    /*position: absolute;*/
}
</style>

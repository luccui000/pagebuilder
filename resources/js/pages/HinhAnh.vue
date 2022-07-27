<template>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-primary" data-toggle="modal" data-target="#open"><i class="fa fa-plus"></i>Thêm mới</button>
            <button class="btn btn-danger ml-2"> <i class="fa fa-trash"></i> Xóa nhiều</button>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div
                            v-for="image in images"
                             :key="image.id"
                            class="col-2"
                        >
                            <div class="card">
                                <div class="card">
                                    <img class="card-img-top" :src="image.url" alt="Card image cap">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="open" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Thêm mới hình ảnh</h2>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Chọn hình ảnh</label>
                        <input type="file" id="file" ref="url" class="form-control" >
                    </div>
                    <button @click="handleUpload" class="btn btn-primary">Tải ảnh lên</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref } from "vue";
import axios from "axios";

export default {
    name: "HinhAnh",
    setup() {
        const url = ref(null)
        const images = ref(null);
        axios.get('/api/hinh-anh')
            .then(response => {
                images.value = response.data;
            })
        const handleUpload = () => {
            const formData = new FormData();
            formData.append('url', url.value.files[0])
            axios.post('/api/hinh-anh/upload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                console.log(response.data)
            }).catch(error => {
                console.log(error)
            })
        }
        return {
            handleUpload,
            url,
            images
        }
    }
}
</script>

<style scoped>

</style>

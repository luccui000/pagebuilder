<template>
    <div class="card">
        <div class="editor" data-toggle="modal" :data-target="['#editModal' + row.id + col.id + data.id]">
            <i class="fa fa-pencil"></i>
        </div>
        <img class="card-img-top" :src="data.image" alt="Card image cap">
        <h5 class="card-title">{{ data.title }}</h5>
        <p class="card-text">{{ data.description }}</p>
        <a :href="data.link_product" class="btn btn-primary">Go somewhere</a>
    </div>
    <div class="modal fade" :id="['editModal' + row.id + col.id + data.id]" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="min-width: 1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Sửa thông tin card</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input v-model="data.image" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hoặc chọn link ảnh từ hệ thống</label>
                                <button
                                    @click="chooseImage"
                                    class="btn btn-success ml-4"
                                    data-toggle="modal"
                                    :data-target="['#chooseCardImage' + row.id + col.id + data.id]"
                                >Chọn ảnh</button>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input v-model="data.title" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input v-model="data.description" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Link sản phẩm</label>
                                <input v-model="data.link_product" type="text" class="form-control">
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
    <div class="modal fade" :id="['chooseCardImage' + row.id + col.id + data.id]" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="min-width: 1200px">
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
                            <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
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

export default {
    name: "Card",
    props: ['row', 'col', 'data'],
    setup (props){
        const images = ref(null);
        const handleSave = () => {
            console.log(props.row);
            console.log(props.col);
        }
        const chooseImage = () => {
            axios.get('/api/hinh-anh')
                .then(response => {
                    images.value = response.data;
                })
        }
        const setImage = (url) => {
            if(window.confirm('Bạn có chắc chắn chọn ảnh này ?')) {
                props.data.image = url;
                document.querySelector(`#chooseCardImage${props.row.id}${props.col.id}${props.data.id}`).click()
            }
        }
        return {
            handleSave,
            images,
            chooseImage,
            setImage
        }
    }
}
</script>

<style scoped>
.card {
    position: relative;
    padding: 10px;
}
.editor {
    position: absolute;
    right: 20px;
}
.btn-save {
    width: 150px;
}
</style>

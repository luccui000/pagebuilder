<template>
    <div class="card">
        <div class="editor" data-toggle="modal" :data-target="['#editModal' + data.id]">
            <i class="fa fa-pencil"></i>
        </div>
        <img class="card-img-top" :src="card.image" alt="Card image cap">
        <h5 class="card-title">{{ card.title }}</h5>
        <p class="card-text">{{ card.description }}</p>
        <a :href="card.link_product" class="btn btn-primary">Go somewhere</a>
    </div>
    <div class="modal fade" :id="['editModal' + data.id]" tabindex="-1" role="dialog">
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
                                <input v-model="card.image" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hoặc chọn link ảnh từ hệ thống</label>
                                <button
                                    @click="chooseImage"
                                    class="btn btn-success ml-4"
                                    data-toggle="modal"
                                    :data-target="['#chooseCardImage' + data.id]"
                                >Chọn ảnh</button>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input v-model="card.title" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input v-model="card.description" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Link sản phẩm</label>
                                <input v-model="card.link_product" type="text" class="form-control">
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
    <div class="modal fade" :id="['chooseCardImage' + data.id]" tabindex="-1" role="dialog">
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
    props: ['data'],
    setup (props){
        const images = ref(null);
        const card = reactive({
            id: 0,
            image: 'https://www.xtmobile.vn/vnt_upload/product/08_2019/thumbs/(600x600)_crop_iphone-12-128gb-cu.jpg',
            title: 'Card title',
            description: 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
            link_product: 'Go somewhere'
        })

        onMounted(() => {
            if(props.data.rowitems_id && props.data.rowitems_id > 0) {
                axios.get(`/api/row-item/${props.data.id}/card/${props.data.rowitems_id}`)
                .then(response => {
                    const { id, image, title, description, link_product } = response.data;
                    card.id = id
                    card.image = image
                    card.title = title
                    card.description = description
                    card.link_product = link_product
                })
            }
        })
        const handleSave = () => {
            // axios.post(`/api/row-item/${props.data.id}/card/${card.id}`, card)
            // .then(response => {
            //     console.log(response.data)
            // })
        }
        const chooseImage = () => {
            axios.get('/api/hinh-anh')
                .then(response => {
                    images.value = response.data;
                })
        }
        const setImage = (url) => {
            if(window.confirm('Bạn có chắc chắn chọn ảnh này ?')) {
                card.image = url;
            }
        }
        return {
            card,
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

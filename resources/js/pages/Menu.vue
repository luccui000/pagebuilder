<template>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3>Danh sách menu con</h3>
                </div>
                <div class="card-body">
                    <ul class="menu-box" >
                        <li
                            v-for="menu in menus"
                            :key="menu.id"
                            class="menu-box-item"
                            @dragover.prevent
                            @dragenter.prevent
                            @drop="onDrop($event, menu.id)"
                        >
                            <router-link to="#" draggable="true" @dragstart="startDrag($event, menu.id)">{{ menu.name }}</router-link>
                            <ul v-show="menu.children.length > 0">
                                <li v-for="item in menu.children" :key="item.id">
                                    <router-link to="#" draggable="true" @dragstart="startDrag">{{ item.name }}</router-link>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <p>* Nhấn giữ chuột vào kéo thả đến vị trí</p>
                    <div class="form-group">
                        <label for="color">Chọn màu sắc cho header</label>
                        <input type="color" id="color" v-model="color" class="form-control" >
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button @click="handleSave" class="btn btn-success btn-save" >Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useRoute } from 'vue-router'
import {onMounted, ref} from "vue";
import axios from "axios";

export default {
    name: "Menu",
    setup() {
        const route = useRoute();
        const { id } = route.params
        const menus = ref(null);
        const color = ref(null);

        onMounted(() => {
            axios.get(`/api/menu/${id}`)
            .then(response => {
                menus.value = response.data;
            })
        })
        const handleSave = () => {
            axios.post('/api/header/change-color', {
                style: `background-color: "${color.value}"`,
                menu_id: id
            }).then(response => {
                console.log(response.data)
            }).catch(error => console.error(error))
        }
        const startDrag = (e, item) => {
            console.log('startDrag', item)
        }
        const onDrop = (e, item) => {
            console.log('onDrop', item)
        }
        return {
            menus,
            color,
            handleSave,
            startDrag,
            onDrop
        }
    }
}
</script>

<style scoped>
ul {
    list-style: none;
}
.menu-box {
    display: flex;
    flex-direction: column;
    padding: 0;
}
.menu-box-item {
    background-color: #f1f1f1;
    margin: 5px 0;
    padding: 10px;
}
.menu-box-item a {
    display: block;
    padding: 10px 20px;
    border: 1px solid #ccc;
    margin: 10px 0;
    color: #5b5b5b;
}
.card-body {
    padding: 0 20px;
}
.btn-save {
    width: 100px;
}
</style>

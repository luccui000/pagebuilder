<template>
    <ul class="list-group sidebar-group">
        <li
            v-for="item in data.items"
            :key="item.id"
            class="list-group-item"
        >
            <a :href="item.link">{{ item.name }}</a>
        </li>
        <li
            data-toggle="modal"
            class="list-group-item d-flex justify-content-center align-items-center"
            :id="['sidebar' + row.id + col.id + data.id]"
            :data-target="['#openSidebar' + row.id + col.id + data.id]"
        >
            <i class="fa fa-plus"></i>
        </li>
    </ul>
    <div class="modal fade" :id="['openSidebar' + row.id + col.id + data.id]" tabindex="-1" role="dialog"  >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nhập thông tin sidebar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Tên siderbar item</label>
                                <input v-model="form.name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Liên kết khi click vào</label>
                                <input v-model="form.link" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button @click="handleAddListGroup" type="button" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {reactive} from "vue";

export default {
    name: "Sidebar",
    props: ['row', 'col', 'data'],
    setup(props) {
        const form = reactive({
            name: '',
            link: ''
        })
        const handleAddListGroup = () => {

            let idx = 1;
            if(props.data.items.length)
                idx = props.data.items.length + 2;

            props.data.items.push({
                id: idx,
                name: form.name,
                link: form.link,
                order: idx
            })
            form.name = '';
            form.link = '';
            document.querySelector(`#sidebar${props.row.id}${props.col.id}${props.data.id}`).click();
        }
        return {
            form,
            handleAddListGroup
        }
    }
}
</script>

<style scoped>
.sidebar-group {
    width: 100%;
    min-width: 170px;
}
</style>

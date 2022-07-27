<template>
    <ul class="list-group w-100 tool-editor tool-editor-list">
        <li
            v-for="listItem in listGroupOrdered"
            :key="listItem.id"
            class="list-group-item"
        >
            {{ listItem.name }}
        </li>
        <li class="list-group-item text-center list-group-add" data-toggle="modal" data-target="#modalAddListGroup">
            <i class="fa fa-plus"></i>
        </li>
    </ul>
    <div class="modal fade" id="modalAddListGroup" tabindex="-1" role="dialog"  >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditHeader-title">Nhập thông tin sidebar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Tên siderbar item</label>
                                <input v-model="groupName" type="text" class="form-control">
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

import { ref, computed } from "vue";

export default {
    name: "ListGroup",
    props: ['listGroup'],
    emits: ['addNewListGroup'],
    setup(props, { emit }) {
        const groupName = ref('')

        const listGroupOrdered = computed(() => {
            return props.listGroup.sort((a, b) => {
                if(a.order > b.order)
                    return 1;
                if(a.order < b.order)
                    return -1;
                return 0;
            })
        })

        const handleAddListGroup = () => {
            emit('addNewListGroup', groupName.value)
            groupName.value = '';
        }
        return {
            groupName,
            listGroupOrdered,
            handleAddListGroup
        }
    }
}
</script>

<style scoped>
.tool-editor {
    position: relative;
}
.tool-editor::after {
    font-family: "FontAwesome";
    content: "\f040";
    position: absolute;
    top: -10px;
    width: 20px;
    height: 20px;
    margin-left: 10px;
}
.list-group-add {
    cursor: pointer;
}
</style>

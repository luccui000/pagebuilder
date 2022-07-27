<template>
    <div class="d-flex flex-column">
        <div class="row">
            <div class="col-12">
                <div class="content" v-html="data.content"></div>
            </div>
        </div>
        <div class="card">
            <div class="card-body d-flex justify-content-center"
                 :id="['btn-paragraph' + row.id + col.id + data.id]"
                 data-toggle="modal"
                 :data-target="['#editParagraph' + row.id + col.id + data.id]"
            >
                <i class="fa fa-pencil"></i>
            </div>
        </div>
    </div>
    <div class="modal fade" :id="['editParagraph' + row.id + col.id + data.id]" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="min-width: 800px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Sửa thông tin paragraph</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div :id="['editor' + row.id + col.id + data.id]"></div>
                            <input type="hidden" v-model="data.content">
                        </div>
                    </div>
                    <div class="row mt-2">
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

import {onMounted} from "vue";

export default {
    name: "Paragraph",
    props: ['row', 'col', 'data'],
    setup(props) {
        let quill;
        onMounted(() => {
            const container = document.getElementById(`editor${props.row.id}${props.col.id}${props.data.id}`);
            quill = new Quill(container, {
                theme: 'snow'
            })
            quill.setText(props.data.content)
        })
        const handleSave = () => {
            props.data.content = quill.root.innerHTML;
            document.getElementById(`btn-paragraph${props.row.id}${props.col.id}${props.data.id}`).click()
        }
        return {
            handleSave
        }
    }
}
</script>

<style scoped>
.content {
    width: 100%;
    max-width: 200px;
}
</style>

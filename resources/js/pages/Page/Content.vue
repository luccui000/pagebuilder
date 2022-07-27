<template>
    <div class="row" >
        <div v-for="col in row.cols" :key="col.id" :class="['col-' + 12 / row.col_num]">
            <div class="card">
                <div class="card-body d-flex justify-content-center">
                    <card v-if="col.rowitems_type === 'CARD'" :row="row" :col="col" :data="col.data" />
                    <Image v-if="col.rowitems_type === 'IMAGE'" :row="row" :col="col" :data="col.data" />
                    <carousel v-if="col.rowitems_type === 'CAROUSEL'" :row="row" :col="col" :data="col.data" />
                    <sidebar v-if="col.rowitems_type === 'SIDEBAR'" :row="row" :col="col" :data="col.data" />
                    <Paragraph v-if="col.rowitems_type === 'PARAGRAPH'" :row="row" :col="col" :data="col.data" />
                    <div v-if="col.rowitems_type === 'NULL'" class="card">
                        <div class="card-body wrapper-tool">
                            <div
                                class="tool-grid cursor-pointer"
                                data-toggle="modal"
                                :data-target="['#modalEditHeader' + row.id + col.id]"
                                :class="['add-grid-' + row.id + col.id]"
                            >
                                <i class="fa fa-edit"></i>
                            </div>
                            <div
                                class="tool-grid cursor-pointer"
                                data-toggle="modal"
                                :data-target="['#createGridCol' + row.id]"
                                :class="['edit-grid-' + row.id]"
                            >
                                <i class="fa fa-th"></i>
                            </div>
                            <div class="tool-grid delete-grid cursor-pointer" >
                                <i class="fa fa-trash"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" :id="['createGridCol' + row.id]" tabindex="-1" role="dialog" >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Chọn số cột</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" >
                                <div class="row d-flex justify-content-center">
                                    <div class="col-2">
                                        <button @click="gridCol = 1" class="btn-select-grid">
                                            <svg width="3" height="20" viewBox="0 0 3 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 0H0V20H3V0Z" fill="#6C6C6C"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div  class="col-2">
                                        <button @click="gridCol = 2" class="btn-select-grid">
                                            <svg width="8" height="20" viewBox="0 0 8 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 0H0V20H3V0Z" fill="#6C6C6C"/>
                                                <path d="M8 0H5V20H8V0Z" fill="#6C6C6C"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-2">
                                        <button @click="gridCol = 3" class="btn-select-grid">
                                            <svg width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 0H10V20H13V0Z" fill="#6C6C6C"/>
                                                <path d="M3 0H0V20H3V0Z" fill="#6C6C6C"/>
                                                <path d="M8 0H5V20H8V0Z" fill="#6C6C6C"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-2">
                                        <button @click="gridCol = 4" class="btn-select-grid">
                                            <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18 0H15V20H18V0Z" fill="#6C6C6C"/>
                                                <path d="M13 0H10V20H13V0Z" fill="#6C6C6C"/>
                                                <path d="M3 0H0V20H3V0Z" fill="#6C6C6C"/>
                                                <path d="M8 0H5V20H8V0Z" fill="#6C6C6C"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-2">
                                        <button @click="gridCol = 6" class="btn-select-grid">
                                            <svg width="28" height="20" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M23 0H20V20H23V0Z" fill="#6C6C6C"/>
                                                <path d="M28 0H25V20H28V0Z" fill="#6C6C6C"/>
                                                <path d="M18 0H15V20H18V0Z" fill="#6C6C6C"/>
                                                <path d="M13 0H10V20H13V0Z" fill="#6C6C6C"/>
                                                <path d="M3 0H0V20H3V0Z" fill="#6C6C6C"/>
                                                <path d="M8 0H5V20H8V0Z" fill="#6C6C6C"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button @click="updateColNum" class="btn btn-success">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" :id="['modalEditHeader' + row.id + col.id]"  tabindex="-1" role="dialog" >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Chọn loại</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" >
                                <div class="form-group">
                                    <label>Chọn loại</label>
                                    <select class="form-control" @change="handleSelectComponent($event, row.id, col.id)">
                                        <option value="PARAGRAPH" >Văn bản</option>
                                        <option value="IMAGE" >Hình ảnh</option>
                                        <option value="CAROUSEL" >Carousel</option>
                                        <option value="CARD" >Card</option>
                                        <option value="GOOGLEMAP" >GoogleMap</option>
                                        <option value="SIDEBAR" >Sidebar</option>
                                    </select>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button @click="confirmChooseGridType(row.id, col.id)"  class="btn btn-primary">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'
import ListGroup from "../../components/Sidebar/ListGroup.vue";
import Card from "../../components/Page/Card.vue";
import Image from "../../components/Page/Image.vue";
import Carousel from "../../components/Page/Carousel.vue";
import Sidebar from "../../components/Page/Sidebar.vue";
import Paragraph from "../../components/Page/Paragraph.vue";

export default {
    name: "Content",
    props: ['row', 'index'],
    emits: ['updateColNum', 'uploadGridType'],
    components: {Paragraph, Carousel, Card, ListGroup, Image, Sidebar},
    setup(props, { emit }) {
        const gridCol = ref(null);
        const editing = ref({
            col: null,
            row: null,
            type: null
        })

        const updateColNum = () => {
            emit('updateColNum', {
                index: props.index,
                grid_col: gridCol.value
            })
            document.querySelector(`.edit-grid-${props.row.id}`).click()
        }
        const handleSelectComponent = (e, rowId, colId) => {
            editing.value.type = e.target.value;
            editing.value.row = rowId;
            editing.value.col = colId;
        }
        const confirmChooseGridType = (rowId, colId) => {
            emit('uploadGridType', editing.value)
            document.querySelector(`.add-grid-${rowId}${colId}`).click()
        }
        return {
            gridCol,
            updateColNum,
            handleSelectComponent,
            confirmChooseGridType
        }
    }
}
</script>

<style scoped>
.cursor-pointer {
    cursor: pointer;
}
.wrapper-tool {
    display: flex;
}
.tool-grid {
    margin: 0 10px;
    font-size: 20px;
}
.edit-grid {
    position: relative;
}
</style>

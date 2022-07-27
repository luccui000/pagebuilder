<template>
    <div class="page__wrapper" ref="pageWrapper">
        <div class="row mt-2">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Tên trang</label>
                            <input v-model="pages.name" name="name" type="text" class="form-control" placeholder="Nhập tên trang">
                        </div>
                        <div class="form-group">
                            <label for="">Nhập đường dẫn slug</label>
                            <input v-model="pages.slug" name="slug" type="text" class="form-control" placeholder="nhap-duong-dan-slug">
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Kích hoạt</label>
                                    <div class="form-check form-switch">
                                        <input v-model="pages.status" name="status" class="form-check-input" type="checkbox" id="check">
                                        <label class="form-check-label" for="check">Nhấn vào đây để chọn kích hoạt</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button @click="previewPage" class="btn btn-primary" style="width: 100px" data-toggle="modal" data-target="#modalPreview">Xem trước</button>
                                <button @click="handleSave" class="btn btn-success ml-2" style="width: 100px">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="toolbox">
                    <div class="toolbox__wrapper" data-toggle="modal" data-target="#createGridCol" >
                        <i class="fa fa-th"></i>
                    </div>
                    <div class="toolbox__wrapper">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <div class="toolbox__wrapper">
                        <i class="fa fa-trash"></i>
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="row">-->
<!--            <div class="col-12">-->
<!--                <div class="card">-->
<!--                    <div class="card-body">-->
<!--                        <div class="container__wrapper">-->
<!--                            <div class="row">-->
<!--                                <div class="col-12">-->
<!--                                    <div class="box">-->
<!--                                        <div class="add-grid" data-toggle="modal" data-target="#modalEditHeader">-->
<!--                                            <i class="fa fa-edit"></i>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div v-if="contents">
            <div class="row" v-for="cnt in contents.contentrows" :key="cnt.id">
                <div v-for="idx in cnt.col_num" :class="['col-' + 12 / cnt.col_num]">
                    <card v-if="cnt.rowitems[idx - 1]?.rowitems_type === 'CARD'" :data="cnt.rowitems[idx - 1]" />
                    <list-group v-if="cnt.rowitems[idx - 1]?.rowitems_type === 'SIDEBAR'" :listGroup="listGroup" />
                    <image v-if="cnt.rowitems[idx - 1]?.rowitems_type === 'IMAGE'" :data="cnt.rowitems[idx - 1]" />
                    <div v-if="!cnt.rowitems.length || cnt.rowitems[idx - 1]?.rowitems_type === 'NULL'" class="card">
                        <div class="card-body">
                            <div class="container__wrapper">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="box">
                                            <div @click="chooseGridType(cnt.id, idx)" class="tool-grid add-grid" data-toggle="modal" data-target="#modalEditHeader">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <div @click="edittingRow = cnt.id" class="tool-grid edit-grid" data-toggle="modal" data-target="#createGridCol" >
                                                <i class="fa fa-th"></i>
                                            </div>
                                            <div @click="deteleRow(cnt.id)" class="tool-grid edit-grid" >
                                                <i class="fa fa-trash"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row create-row" @click="addNewRow" >
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container__wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="box">
                                    <div class="add-grid">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createGridCol" tabindex="-1" role="dialog" >
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
                     <div class="row mt-2">
                         <div class="col-12 d-flex justify-content-end">
                             <button @click="updateColNum" class="btn btn-success">Xác nhận</button>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEditHeader" tabindex="-1" role="dialog" >
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
                        <label for="">Chọn loại</label>
                        <select class="form-control" @change="handleSelectComponent">
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
                            <button @click="confirmChooseGridType"  class="btn btn-primary">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg modal-xlg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditHeader-title">Xem trước</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { onMounted, reactive, ref } from "vue";
import ListGroup from "../components/Sidebar/ListGroup.vue";
import Row from './Page/Row.vue';
import Card from "../components/Card.vue";
import Image from "../components/Image.vue";
import axios from "axios";

export default {
    name: "CreatePage",
    components: {
        Card,
        ListGroup,
        Row,
        Image
    },
    setup() {
        const pageWrapper = ref(null);
        const showAddGridRow = ref(false)
        const contents = ref(null);
        const edittingId = localStorage.getItem('id')
        const edittingRow = ref(null)
        const editingCol = ref(null)
        const gridCol = ref(null);
        const selectedType = ref(null)

        const content = ref(null);
        const pages = reactive({
            name: '',
            slug: '',
            status: false
        })

        const listGroup = reactive([
            {
                id: 1,
                name: 'Phụ kiện điện thoại',
                order: 5,
            },
            {
                id: 2,
                name: 'Ốp lưng, tai nghe',
                order: 2,
            },
            {
                id: 3,
                name: 'Pin sạc dự phòng',
                order: 3
            },
            {
                id: 4,
                name: 'Phụ kiện khác',
                order: 4
            }
        ]);
        const handleSave = () => {
            axios.post('/api/page', pages)
            .then(response => {
                localStorage.setItem('id', response.data.id)
            })
        }

        const previewPage = () => {

        }
        const addNewListGroup = (groupName) => {
            const lastId = listGroup[listGroup.length - 1].id + 1;
            listGroup.push({
                id: lastId,
                name: groupName
            })
        }

        const addNewRow = () => {
            axios.post('/api/page/add-new-row', {
                content_id: localStorage.getItem('id'),
                col_num: 1
            })
                .then(res => {
                    axios('/api/page')
                        .then(response => {
                            contents.value = response.data
                            console.log(response.data)
                        })
                })
        }
        const chooseGridType = (contentId, colIdx) => {
            edittingRow.value = contentId;
            editingCol.value = colIdx;
            console.log(editingCol)
        }
        const updateColNum = () => {
             axios.post('/api/page/update-col', {
                 id: edittingRow.value,
                 col_num: gridCol.value
             }).then(res => {
                 axios('/api/page')
                     .then(response => {
                         contents.value = response.data
                         console.log(response.data)
                     })
             })
        }
        const deteleRow = (contentId) => {
            console.log(contentId)
        }
        onMounted(() => {
            axios('/api/page')
                .then(response => {
                    contents.value = response.data
                })
        })
        const handleSelectComponent = (e) => {
            selectedType.value = e.target.value
        }
        const confirmChooseGridType = () => {
            const data = {
                'contentrow_id': edittingRow.value,
                'order': editingCol.value,
                'type': selectedType.value
            };
            axios.post('/api/page/update-column-type', data)
                .then(response => {
                    axios('/api/page')
                        .then(res => {
                            contents.value = res.data
                        })
                }).catch(error => console.error(error))
        }
        return {
            pages,
            content,
            contents,
            listGroup,
            handleSave,
            addNewListGroup,
            showAddGridRow,
            pageWrapper,
            addNewRow,
            chooseGridType,
            deteleRow,
            gridCol,
            edittingRow,
            updateColNum,
            editingCol,
            handleSelectComponent,
            confirmChooseGridType,
            previewPage
        }
    }
}
</script>

<style scoped>
.container__wrapper {
    background-color: #f8f8f8;
}
.box {
    width: 100%;
    min-height: 100px;
    border: 1px dashed #ccc;
    display: flex;
    justify-content: center;
    align-items: center;
}

.edit-grid  {
    font-size: 25px;
    cursor: pointer;
    display: none;
}
.add-grid {
    font-size: 20px;
}
.box:hover .edit-grid {
    display: block;
}
.modal-xlg {
    max-width: 1500px !important;
}
.toolbox {
    height: 60px;
    background-color: #f8f8f8;
    display: flex;
}
.toolbox__wrapper {
    width: 60px;
    height: 40px;
    background-color: #fff;
    border-radius: 4px;
    list-style: none;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 25px;
    cursor: pointer;
    margin-right: 20px;
}

.text-box {
    border: 1px solid #ddd;
    padding: 5px;
}
.editing-active {
    border-color: #fc3131;
}
.tool-editor-list::after {
    right: 0;
}
.btn-select-grid {
    background-color: #fff;
    border: none;
    padding: 10px 20px;
}
.tool-grid {
    margin: 0px 20px;
}
</style>

<template>
    <div class="page__wrapper">
        <div class="row mt-2">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tên trang</label>
                            <input v-model="contents.name" name="name" type="text" class="form-control" placeholder="Nhập tên trang">
                        </div>
                        <div class="form-group">
                            <label>Nhập đường dẫn slug</label>
                            <input v-model="contents.slug" name="slug" type="text" class="form-control" placeholder="nhap-duong-dan-slug">
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Kích hoạt</label>
                                    <div class="form-check form-switch">
                                        <input v-model="contents.status" name="status" class="form-check-input" type="checkbox" id="check">
                                        <label class="form-check-label" for="check">Nhấn vào đây để chọn kích hoạt</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button @click="previewPage" class="btn btn-primary" style="width: 100px" data-toggle="modal" data-target="#preview-page">Xem trước</button>
                                <button @click="handleSave" class="btn btn-success ml-2" style="width: 100px">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
            </div>
        </div>
        <div v-if="contents">
            <content
                v-for="(row, idx) in contents.rows"
                :key="row.id"
                :row="row"
                :index="idx"
                @updateColNum="handleUpdateColNum"
                @uploadGridType="handleUpdateGridType"
            />
        </div>
        <div class="row create-row" >
            <div class="col-12">
                <div class="card">
                    <div @click="addNewRow" class="card-body d-flex justify-content-center cursor-pointer">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="preview-page" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="min-width: 1500px">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Preview</h3>
                </div>
                <div class="modal-body">
                    <preview :page="contents.rows" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {reactive, ref, watchEffect} from "vue";
import Content from "./Content.vue";
import Preview from "../../components/Preview/Preview.vue";

export default {
    name: "Create",
    components: {
        Preview,
        Content,
    },
    setup() {
        const startIdx = ref(1);
        const showPreview = ref(false);
        const contents = reactive({
            name: '',
            slug: '',
            status: false,
            rows: [
                {
                    id: startIdx.value++,
                    col_num: 1,
                    order: 1,
                    cols: [
                        {
                            id: 1,
                            contentrow_id: 0,
                            rowitems_type: 'NULL',
                            rowitems_id: 1,
                            order: 1
                        }
                    ]
                }
            ]
        });
        const pages = reactive({
            name: '',
            slug: '',
            status: false
        });

        const addNewRow = () => {
            const idx = contents.rows.length;
            contents.rows.push({
                id: idx + 1,
                col_num: 1,
                order: 1,
                cols: [
                    {
                        id: 1,
                        contentrow_id: 0,
                        rowitems_type: 'NULL',
                        rowitems_id: 1,
                        order: 1,
                        data: null
                    }
                ]
            })
        }

        const handleUpdateColNum = ({ index, grid_col}) => {
            if(index >= 0) {
                contents.rows[index].col_num = grid_col;
                contents.rows[index].cols = [];
                for(let i = 1; i <= grid_col; i++) {
                    contents.rows[index].cols.push({
                        id: i,
                        contentrow_id: contents.rows[index].id,
                        rowitems_type: 'NULL',
                        rowitems_id: 0,
                        order: i,
                        data: {}
                    })
                }
            }
        }
        watchEffect(() => contents, (current) => {
            console.log('Watch:::', current)
        })

        const handleUpdateGridType = ({ col, row, type}) => {
            console.log({ col, row, type})
            const idx = contents.rows.findIndex(el => el.id === row)
            if(idx >= 0) {
                const idxRow = contents.rows[idx].cols.findIndex(el => el.id === col)
                if(idxRow >= 0) {
                    contents.rows[idx].cols[idxRow].rowitems_type = type
                    let data = {};
                    switch (type) {
                        case 'CARD':
                            Object.assign(data, {
                                id: 1,
                                image: 'https://www.xtmobile.vn/vnt_upload/product/08_2019/thumbs/(600x600)_crop_iphone-12-128gb-cu.jpg',
                                title: 'Sản phẩm ',
                                description: 'Mô tả sản phẩm ',
                                link_product: 'Go somewhere'
                            })
                            break;
                        case 'CAROUSEL':
                            Object.assign(data, {
                                id: 1,
                                carousel_id: 1,
                                carousels: []
                            })
                            break;
                        case 'SIDEBAR':
                            Object.assign(data, {
                                id: 1,
                                items: []
                            })
                            break;
                        case 'IMAGE':
                            Object.assign(data, {
                                id: 1,
                                url: '',
                                link: ''
                            });
                            break;
                        case 'PARAGRAPH':
                            Object.assign(data, {
                                id: 1,
                                content: '',
                            });
                            break;
                    }
                    contents.rows[idx].cols[idxRow].data = data
                }
            }
            console.log(contents)
        }
        const handleSave = () => {
            console.log(contents)
            axios.post('/api/content', contents)
            .then(response => {
                console.log(response.data)
                window.location.href = '/admin/trang'
            })
        }
        const previewPage = () => {

        }
        return {
            pages,
            contents,
            addNewRow,
            handleSave,
            previewPage,
            showPreview,
            handleUpdateColNum,
            handleUpdateGridType
        }
    }
}
</script>

<style scoped>

</style>

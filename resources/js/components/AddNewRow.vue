<template>
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
</template>

<script>
export default {
    name: "AddNewRow"
}
</script>

<style scoped>

</style>

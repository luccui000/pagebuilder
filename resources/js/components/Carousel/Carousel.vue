<template>
    <div class="row mt-2">
        <div class="col-12">
            <div class="carousel-single">
                <div class="form-group">
                    <label>Tên carousel</label>
                    <input type="text" class="form-control" placeholder="Nhập tên carousel">
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control-custom">
                </div>
                <div class="form-group">
                    <label>Nội dung hình ảnh</label>
                    <input type="text" class="form-control" placeholder="Nhập nội dung hình ảnh">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Carousel"
}
</script>

<style scoped>
.carousel-single {
    border: 1px dashed #dddddd;
    padding: 10px;
    margin-bottom: 10px;
}
.carousel-title {
    padding-top: 15px;
}
</style>

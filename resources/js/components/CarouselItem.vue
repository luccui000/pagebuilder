<template>
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
</template>

<script>
export default {
    name: "CarouselItem"
}
</script>

<style scoped>

</style>

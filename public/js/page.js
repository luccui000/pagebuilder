function removeAllEditing(wrapperClass, editingClass = 'editing') {
    document.querySelectorAll(`.${wrapperClass}`)
        .forEach(el => $(el).removeClass(editingClass))
}
document.querySelectorAll('.editor__header')
.forEach(headerItem => {
    headerItem.addEventListener('click', function() {
        removeAllEditing('editor__header', 'editing');
        $(this).addClass('editing')
        const { id, name } = $(headerItem).data();
        $("#modalEditHeader").modal('show')
        $("#modalEditHeader-title").text(`Chỉnh sửa #${id}`);
        $("#modalEditHeader-input-name").val(name);
    })
})
$("#modalEditHeader-save").click(function(e) {
    e.preventDefault()
    const { id } = $(".editing").data();
    const name = $("#modalEditHeader-input-name").val();

    const data = {
        id,
        name
    }
    axios.post('/api/page/menu-item', data)
        .then(response => {
            window.location.reload();
        }).catch(error => console.error(error))
})
$("#modalEditCarousel-save").click(function(e) {
    const primary_text = $(`input[name=primary_text]`).val();
    const secondary_text = $(`input[name=secondary_text]`).val();
    const primary_image = $(`input[name=primary_image]`).val();
    const background_image = $(`input[name=background_image]`).val();
    const { carousel: { id } } = $('.carousel__editing').data();

    const data = {
        id,
        primary_text,
        secondary_text,
    }
    axios.post('/api/page/carousel', data)
        .then(response => {
            window.location.reload();
        }).catch(error => console.error(error))
})

document.querySelectorAll('.editor__carousel')
    .forEach(carousel => {
        carousel.addEventListener('click', function() {
            removeAllEditing('editor__carousel', 'carousel__editing');
            $(this).addClass('carousel__editing')
            $("#modalEditCarousel").modal('show');
            const { carousel } = $(this).data();
            console.log(carousel)
            $("#modalEditCarousel-content").html(`
                 <div class="form-group">
                    <label>Tiêu đề chính</label>
                    <input name="primary_text" value="${carousel.primary_text}" class="form-control" type="text" />
                 </div>
                 <div class="form-group">
                    <label>Tiêu đề phụ</label>
                    <input name="secondary_text" value="${carousel.secondary_text}" class="form-control" type="text" />
                 </div>
                 <div class="form-group">
                    <label>Ảnh nền</label>
                    <input name="background_image" value="${carousel.background_image}" class="form-control" type="file" />
                 </div>
                 <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input name="primary_image" value="${carousel.primary_image}" class="form-control" type="file" />
                 </div>
                 <div class="form-group">
                    <label>Thứ tự</label>
                    <input name="order" value="${carousel.order}" class="form-control" type="number" />
                 </div>
            `)
        })
    })
    let isActive = false;
    $(".btn__add--grid").click(function() {
        $(".btn__add--showgrid").toggleClass('show')
    })

document.querySelectorAll('.bg__grid--item')
    .forEach(el => {
        el.addEventListener('click', function () {
            const { row } = $(el).data();
            makeGrid(row)
        })
    })


function makeGrid(col, emptyBody = true) {
    const COL_IN_ONE_ROW = 12;
    const gridShow = document.querySelector(".grid__show")
    if(emptyBody)
        gridShow.textContent = "";
    for(let i = 0; i < col; i++) {
        const div = document.createElement('div');
        div.classList.add(`col-${COL_IN_ONE_ROW / col}`);
        div.classList.add('grid__show--box');
        div.classList.add('mt-2');
        div.textContent = `col - ${COL_IN_ONE_ROW / col}`
        div.innerHTML = `<div class="grid__show--afterbox" onclick="showModalEdit(this)" >
            <i class="fa fa-edit"></i>
        </div>`
        gridShow.append(div)
    }
}
let editingSanPham;
function showModalEdit(that) {
    editingSanPham = that;
    $("#modalEditMauSanPham").modal('show')
}

$("#modalEditMauSanPham-save").click(function() {
    const select = $("#modalEditMauSanPham-select").val();
    $(editingSanPham)[0].innerHTML = `
        <i class="fa fa-edit"></i>
        <span>chỉnh ${select}</span>
    `
})
$("#modalThemDong-save").click(function() {
    const select = $("#modalThemDong-select").val();
    console.log(select)
    makeGrid(select, false)
})

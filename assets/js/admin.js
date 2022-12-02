function previewImg(img) {
    const imgSrc = img.getAttribute('img-src')
    const imgPreview = document.querySelector('.img__preview')
    imgPreview.style.display = "block"
    const overlay = imgPreview.querySelector('.preview__overlay')
    const content = imgPreview.querySelector('.preview__content')
    content.innerHTML = `<img src="../assets/Img/${imgSrc}" alt="">
    `
    console.log(overlay)
    overlay.addEventListener('click', () => {
        imgPreview.style.display = "none"
    })
}

function renderCustormer() {
    swal("Comming soon.....", "", "error");




}

function showAddForm() {

    const form = document.querySelector('.addtour')
    const formbg = document.querySelector('.modal_background')

    form.classList.remove('hideModal')

    formbg.addEventListener('click', () => {
        form.classList.add('hideModal')
    })
}
function showUpdateForm(product) {
    // const updateBtn = document.querySelector('.updateTourbtn')
    const form = document.querySelector('.updateTour')
    const formbg = form.querySelector('.modal_background')

    form.classList.remove('hideModal')
    formbg.addEventListener('click', () => {
        form.classList.add('hideModal')
    })
    const id = form.querySelector('.id')

    const name = form.querySelector('.name')
    const price = form.querySelector('.price')
    const detail = form.querySelector('.detail')
    const count = form.querySelector('.count')
    const type = form.querySelector('.type')
    name.value = product.name
    price.value = product.price
    detail.value = product.detail
    count.value = product.count
    type.value = product.type
    id.value = product.id


}





const filter = document.querySelector('#filterRekap');
const inpRekap = document.querySelector('#forRekap');
inpRekap.value = filter.value

filter.addEventListener('change', function () {
    inpRekap.value = filter.value
    window.location = "/Rekap/RTransaksi?" +filter.getAttribute('name')+ "=" + filter.value
});
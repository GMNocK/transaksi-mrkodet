// const infoOngkir = document.querySelector('#infoOngkir');
// const isi = document.createElement('div');
// isi.classList.add('alert');
// isi.classList.add('alert-primary');
// isi.classList.add('alert-dismissible');
// isi.classList.add('fade');
// isi.classList.add('show');
// isi.setAttribute('role', 'alert');

// const btnAlert = document.createElement('button');
// btnAlert.classList.add('close');
// btnAlert.setAttribute('type', 'button');
// btnAlert.setAttribute('data-bs-dismiss', 'alert');
// btnAlert.setAttribute('aria-label', 'close');

// const spanInBtn = document.querySelector('span');
// spanInBtn.setAttribute('aria-hidden', 'true');
// const isiSpan = document.createTextNode("&times;");
// spanInBtn.appendChild(isiSpan);
// const spanInBtn2 = document.querySelector('span');
// spanInBtn2.classList.add('sr-only');
// spanInBtn2.innerHTML = "Close";

// const message = document.createElement('strong');
// message.innerHTML = "Tarif Biaya Ongkir";

// btnAlert.appendChild(spanInBtn);
// btnAlert.appendChild(spanInBtn2);
// isi.appendChild(btnAlert);
// isi.appendChild(message);
// infoOngkir.appendChild(isi);
const operator = document.querySelector('#TotalBayar');
operator.value = "Rp.3000";

const kirim = document.querySelector('#pengiriman');
kirim.addEventListener('change', () => {
    if (kirim.value == "Ambil Di Toko") {
        var i = (operator.value).slice(3,operator.lenght);
        var hasil = (parseInt(i) - 3000);
        operator.value = "Rp."+hasil;
        // infoOngkir.removeChild(isi);
    }
    if (kirim.value == "Kirim Ke Rumah") {
        var i = (operator.value).slice(3,operator.lenght);
        var hasil = (parseInt(i) + 3000);
        operator.value = "Rp."+hasil;
        // infoOngkir.appendChild(isi);
    }
});
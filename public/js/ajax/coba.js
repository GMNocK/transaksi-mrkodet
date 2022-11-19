const filterSelect = document.querySelector('#filter');
filterSelect.addEventListener('change', filtering);


function filtering() {
    const ajax = new XMLHttpRequest()
    const filterValue = document.querySelector('#filter').value;

    ajax.open('GET', '/dataPelanggan', true)

    // ajax.setRequestHeader('Content-Type', 'application/x-ww-form')

    ajax.onreadystatechange = () => {
        if (this.readyState ===  4 && this.status === 200) {
			// let data = JSON.parse(ajax.responseText);
			// document.querySelector('#resutl').innerHTML = this.responseText;

            console.log(this.responseText + "   OK")
		}
    }

    ajax.send()
}
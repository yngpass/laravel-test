let client = document.querySelector('#client');
let car = document.querySelector('#car-add');

client.addEventListener('change', function() {
    if (client.value != '') {
        car.value = '';
        let id_client = client.value;
        let allCars = car.querySelectorAll('option');
        allCars.forEach(el => {
            if(!el.classList.contains('d-none')) {
                el.classList.add('d-none');
            } else if (el.id == id_client) {
                el.classList.remove('d-none');
            }
        });
    }
});
let phone = document.querySelector('input#phone'),
    addCar = document.querySelector('#btn-add-car'),
    countCar = document.querySelector('#count_car'),
    divAddCar = document.querySelector('#div-add-car'),
    i = +(countCar.value);

addCar.addEventListener('click', function () {
    i++;
    let carHTML = `
        <div class="col-lg-6 col-md-12 mb-2">
            <div>Автомобиль ${i}</div>
            <div class="input-group">
                <label for="brand-${i}" class="input-group-text">Марка:</label>
                <input type="text" class="form-control" name="brand-${i}" id="brand-${i}" required>
            </div>
            <div class="input-group mt-3">
                <label for="model-${i}" class="input-group-text">Пол:</label>
                <input type="text" class="form-control" name="model-${i}" id="model-${i}" required>
            </div>
            <div class="input-group mt-3">
                <label for="color-${i}" class="input-group-text">Цвет:</label>
                <input type="text" class="form-control" name="color-${i}" id="color-${i}" required>
            </div>
            <div class="input-group mt-3">
                <label for="state_number-${i}" class="input-group-text">Гос Номер РФ:</label>
                <input type="text" class="form-control" name="state_number-${i}" id="state_number-${i}" maxlength="6" oninput="upCase(this.id)" required>
            </div>
            <div class="mt-3 mb-3">
            <input type="hidden" name="status-${i}" id="status-${i}" checked>
                <input type="checkbox" class="form-check-input" name="status-${i}" id="status-${i}">
                <label for="status" class="form-check-label">Автомобиль находиться на автостоянке</label>
            </div>
        </div>
    `;
    divAddCar.insertAdjacentHTML('beforebegin', carHTML);
    countCar.value = i;
});

phone.addEventListener('input', function() {
    phone.value = phone.value.replace(/[^\d\-+]/, '');
});

function upCase(id) {
    state_number = document.querySelector('#' + id);
    state_number.value = state_number.value.toUpperCase();
}

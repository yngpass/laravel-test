@extends('layouts/header')

@section('title')
Регистрация клиента
@endsection

@section('main_content')

@if (session('message'))
<div class="text-danger text-center mb-3">
    {{ session('message') }}
</div>
@endif

<form action="/registration/check" method="post">
    @csrf

    {{-- форма регистрации клиента --}}
    <h3 class="text-center">Регистрация клиента</h3>
    <div class="col-lg-6 col-md-12">
        <div class="input-group mt-3">
            <label for="fullname" class="input-group-text">ФИО:</label>
            <input type="text" class="form-control" name="fullname" id="fullname" minlength="3" required>
        </div>
        <div class="input-group mt-3">
            <label for="gender" class="input-group-text">Пол:</label>
            <select class="form-select" name="gender" id="gender">
                <option value="мужской">мужской</option>
                <option value="женский">женский</option>
            </select>
        </div>
        <div class="input-group mt-3">
            <label for="phone" class="input-group-text">Номер телефона:</label>
            <input type="text" class="form-control" name="phone" id="phone" value="+7" maxlength="12" required>
        </div>
        <div class="input-group mt-3">
            <label for="address" class="input-group-text">Адрес:</label>
            <input type="text" class="form-control" name="address" id="address">
        </div>
    </div>

    {{-- форма регистрации автомобилей --}}
    <div class="col-12 mt-3 mb-3 border-top"></div>
    <h3 class="text-center">Автомобили клиента</h3>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div>Автомобиль 1</div>
            <div class="input-group">
                <label for="brand-1" class="input-group-text">Марка:</label>
                <input type="text" class="form-control" name="brand-1" id="brand-1" required>
            </div>
            <div class="input-group mt-3">
                <label for="model-1" class="input-group-text">Модель:</label>
                <input type="text" class="form-control" name="model-1" id="model-1" required>
            </div>
            <div class="input-group mt-3">
                <label for="color-1" class="input-group-text">Цвет:</label>
                <input type="text" class="form-control" name="color-1" id="color-1" required>
            </div>
            <div class="input-group mt-3">
                <label for="state_number-1" class="input-group-text">Гос Номер РФ:</label>
                <input type="text" class="form-control" name="state_number-1" id="state_number-1" maxlength="6" oninput="upCase(this.id)" required>
            </div>
            <div class="mt-3 mb-3">
                <input type="hidden" name="status-1" id="status-1" checked>
                <input type="checkbox" class="form-check-input" name="status-1" id="status-1" value="1">
                <label for="status-1" class="form-check-label">Автомобиль находиться на автостоянке</label>
            </div>
        </div>
    
        <div class="col-12 mt-3 mb-3 border-top" id="div-add-car"></div>
        <input type="hidden" name="count_car" id="count_car" value="1">
    </div>
    <div class="col-lg-6 col-md-12 mx-auto">
        <button type="button" class="btn btn-outline-success col-12 mt-3" id="btn-add-car">Добавить автомобиль</button>
        <button type="submit" class="btn btn-outline-primary col-12 mt-3 mb-5">Зарегестрировать</button>
    </div>
</form>

<script src="{{ asset('/resources/js/crud.js') }}"></script>
@endsection
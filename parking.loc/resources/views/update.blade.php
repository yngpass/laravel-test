@extends('layouts/header')

@section('title')
Редактирование данных клиента
@endsection

@section('main_content')

@if (session('message'))
<div class="text-danger text-center mb-3">
    {{ session('message') }}
</div>
@endif

<form action="/update/check/{{ $client->id }}" method="post">
    @csrf

    {{-- форма регистрации клиента --}}
    <h3 class="text-center">Редактирование данных клиента</h3>
    <div class="col-lg-6 col-md-12">
        <div class="input-group mt-3">
            <label for="fullname" class="input-group-text">ФИО:</label>
            <input type="text" class="form-control" name="fullname" id="fullname" minlength="3" value="{{ $client->fullname }}" required>
        </div>
        <div class="input-group mt-3">
            <label for="gender" class="input-group-text">Пол:</label>
            <select class="form-select" name="gender" id="gender">
                @if ($client->gender == 'мужской')
                    <option value="мужской" selected>мужской</option> 
                    <option value="женский">женский</option>
                @else
                    <option value="мужской">мужской</option> 
                    <option value="женский" selected>женский</option>
                @endif
            </select>
        </div>
        <div class="input-group mt-3">
            <label for="phone" class="input-group-text">Номер телефона:</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{ $client->phone }}" maxlength="12" required>
        </div>
        <div class="input-group mt-3">
            <label for="address" class="input-group-text">Адрес:</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $client->address }}">
        </div>
    </div>

    {{-- форма регистрации автомобилей --}}
    <div class="col-12 mt-3 mb-3 border-top"></div>
    <h3 class="text-center">Автомобили клиента</h3>

    <div class="row">
        @foreach ($cars as $car)
            <div class="col-lg-6 col-md-12 mb-2">
                <div>Автомобиль {{ $loop->iteration }}</div>
                <div class="input-group">
                    <label for="brand-{{ $loop->iteration }}" class="input-group-text">Марка:</label>
                    <input type="text" class="form-control" name="brand-{{ $loop->iteration }}" id="brand-{{ $loop->iteration }}" value="{{ $car->brand }}" required>
                </div>
                <div class="input-group mt-3">
                    <label for="model-{{ $loop->iteration }}" class="input-group-text">Модель:</label>
                    <input type="text" class="form-control" name="model-{{ $loop->iteration }}" id="model-{{ $loop->iteration }}" value="{{ $car->model }}" required>
                </div>
                <div class="input-group mt-3">
                    <label for="color-{{ $loop->iteration }}" class="input-group-text">Цвет:</label>
                    <input type="text" class="form-control" name="color-{{ $loop->iteration }}" id="color-{{ $loop->iteration }}" value="{{ $car->color }}" required>
                </div>
                <div class="input-group mt-3">
                    <label for="state_number-{{ $loop->iteration }}" class="input-group-text">Гос Номер РФ:</label>
                    <input type="text" class="form-control" name="state_number-{{ $loop->iteration }}" id="state_number-{{ $loop->iteration }}" maxlength="6" oninput="upCase(this.id)" value="{{ $car->state_number }}" required>
                    <input type="hidden" class="form-control" name="state_number_up-{{ $loop->iteration }}" id="state_number_up-{{ $loop->iteration }}" value="{{ $car->state_number }}" required>
                </div>
                <div class="mt-3 mb-3">
                    <input type="hidden" name="status-{{ $loop->iteration }}" id="status-{{ $loop->iteration }}" checked>
                    @if ($car->status == 1)
                        <input type="checkbox" class="form-check-input" name="status-{{ $loop->iteration }}" id="status-{{ $loop->iteration }}" value="1" checked>
                    @else
                        <input type="checkbox" class="form-check-input" name="status-{{ $loop->iteration }}" id="status-{{ $loop->iteration }}" value="1">
                    @endif
                    <label for="status-{{ $loop->iteration }}" class="form-check-label">Автомобиль находиться на автостоянке</label>
                </div>
            </div>
        @endforeach
    
        <div class="col-12 mt-3 mb-3 border-top" id="div-add-car"></div>
        <input type="hidden" name="count_car" id="count_car" value="{{count($cars)}}">
    </div>
    <div class="col-lg-6 col-md-12 mx-auto">
        <button type="button" class="btn btn-outline-success col-12 mt-3" id="btn-add-car">Добавить автомобиль</button>
        <button type="submit" class="btn btn-outline-primary col-12 mt-3">Редактировать</button>
    </div>
</form>
<div class="col-lg-6 col-md-12 mx-auto">
    <button type="button" class="btn btn-outline-danger col-12 mt-3 mb-5" data-bs-toggle="modal" data-bs-target="#modalDelete">Удалить клиента</button>
</div>
<div class="modal fade" id="modalDelete" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Удаление клиента</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/delete-client/{{ $client->id }}" method="post">
                @csrf
                <div class="modal-body">
                    Вы действительно хотите удалить все данные о клиенте?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Удалить</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('/resources/js/crud.js') }}"></script>
@endsection
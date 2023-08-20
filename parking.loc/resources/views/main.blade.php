@extends('layouts/header')

@section('title')
Главная
@endsection

@section('main_content')

@if (session('message'))
<div class="text-danger text-center mb-3">
    {{ session('message') }}
</div>
@endif

<h3 class="text-center">Автостоянка</h3>

<button type="button" class="btn btn-outline-success col-12 mt-2" data-bs-toggle="modal" data-bs-target="#modalAdd">
    Добавить автомобиль
</button>
<div class="modal fade" id="modalAdd" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавление автомобиля</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/add-car" method="post">
                @csrf
                <div class="modal-body">
                    <div class="input-group">
                        <label for="client" class="input-group-text">ФИО:</label>
                        <select class="form-select" name="client" id="client" required>
                            <option value="" disabled selected>Выберите клиента</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->fullname.' ('.$client->phone.')' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mt-3">
                        <label for="car" class="input-group-text">Автомобиль:</label>
                        <select class="form-select" name="car-add" id="car-add" required>
                            <option value="" disabled selected>Выберите автомобиль</option>
                            @foreach ($carsNotParking as $car)
                                <option class="d-none" id="{{ $car->id_client }}" value="{{ $car->id }}">{{ $car->brand.' '.$car->model.' ('.$car->state_number.')' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                </div>
            </form>
        </div>
    </div>
</div>

<table class="table table-bordered table-hover text-center mt-1">
    <thead>
        <tr>
            <td class="col-4">ФИО</td>
            <td class="col-3">Автомобиль</td>
            <td class="col-3">Гос Номер РФ</td>
            <td class="col-2" colspan="2">Панель инструментов</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)
            @foreach ($clients as $client)
                @if ($car->id_client == $client->id)
                    <tr>
                        <td>
                            {{ $client->fullname }}
                        </td>
                        <td>
                            {{ $car->brand.' '.$car->model }}
                        </td>
                        <td>
                            {{ $car->state_number }}
                        </td>
                        <td>   
                            <a href="/update/{{$client->id}}" class="">
                                <button class="btn text-primary btn-icon">
                                    <i class="fa fa-pencil-square-o"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <button class="btn text-danger btn-icon" data-bs-toggle="modal" data-bs-target="#modalDelete-{{ $car->id }}">
                                <i class="fa fa-trash-o"></i>
                            </button>
                            <div class="modal fade" id="modalDelete-{{ $car->id }}" >
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Удаление автомобиля с автостоянки</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="/delete-car" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div>
                                                    Вы действительно хотите удалить автомобиль {{ $car->brand.' '.$car->model.' '.$car->state_number }} с автостоянки?
                                                </div>
                                                <input type="hidden" name="car-delete" id="car-delete" value="{{ $car->id }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{$cars->links('pagination::bootstrap-4')}}
</div>
@endsection

@section('js')
    <script src="{{ asset('/resources/js/main.js') }}"></script>
@endsection
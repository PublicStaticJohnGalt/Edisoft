@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Заявки</h2>

            <div class="card">
                <div class="card-body bg-white p-4">
                    <form method="get" action="{{ route('admin') }}">
                        <div class="row">
                            <div class="col-12 col-sm-6 form-group">
                                <label>Тип заявки:</label>
                                <select name="type" class="form-control">
                                    <option value=""></option>
                                    <option value="1">Сервисное обслуживание</option>
                                    <option value="2">Поддержка</option>
                                    <option value="3">Запрос технической информации</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 form-group">
                                <label>Приоритет:</label>
                                <select name="priority" class="form-control">
                                    <option value=""></option>
                                    <option value="1">Высокий</option>
                                    <option value="2">Средний</option>
                                    <option value="3">Низкий</option>
                                </select>
                            </div>
                            <div class="col-12 form-group">
                                <button class="btn btn-success" type="submit">Фильтровать</button>
                                <a href="{{ route('admin') }}" class="btn btn-warning">Сбросить</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="">
                <table class="table table-striped table-hover table-light">
                    <thead>
                        <th>Статус</th>
                        <th>Название</th>
                        <th>Тип</th>
                        <th>Приоритет</th>
                        <th>Описание</th>
                        <th>Контактные данные</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>
                                    @if ($ticket->status == 1) <span class="d-inline-block p-1 bg-info text-white">Новая</span>
                                    @elseif ($ticket->status == 2) <span class="d-inline-block p-1 bg-warning text-black-50">В работе</span>
                                    @elseif ($ticket->status == 3) <span class="d-inline-block p-1 bg-success text-white">Выполнена</span>
                                    @elseif ($ticket->status == 4) <span class="d-inline-block p-1 bg-danger text-white">Отложена</span>
                                    @elseif ($ticket->status == 5) <span class="d-inline-block p-1 bg-success text-white">Решена</span>
                                    @endif
                                </td>
                                <td>{{ $ticket->name }}</td>
                                <td>
                                    @if ($ticket->type == 1) Сервисное обслуживание
                                    @elseif ($ticket->type == 2) Поддержка
                                    @elseif ($ticket->type == 3) Запрос технической информации
                                    @endif
                                </td>
                                <td>
                                    @if ($ticket->priority == 1) Высокий
                                    @elseif ($ticket->priority == 2) Средний
                                    @elseif ($ticket->priority == 3) Низкий
                                    @endif
                                </td>
                                <td>{{ $ticket->description }}</td>
                                <td>
                                    {{ $ticket->client_full_name }}<br>
                                    {{ $ticket->client_phone }}<br>
                                    {{ $ticket->client_email }}
                                </td>
                                <td>
                                    <a href="/admin/ticket/edit/{{ $ticket->id }}" class="btn btn-success font-weight-bold">&#128393;</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $tickets->links() }}
            </div>

        </div>
    </div>
</div>
@endsection

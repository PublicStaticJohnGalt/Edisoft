<template>
    <div id="ticket-form">
        <h1>Редактирование заявки</h1>

        <form v-on:submit="updateTicket()">

            <input type="hidden" v-model="ticket.id" />

            <div class="form-group">
                <label class="control-label">Затрачено времени</label>
                <input class="form-control" v-model="ticket.spent_time" disabled />
            </div>

            <div class="form-group">
                <label class="control-label">Название <i style="color:red">*</i></label>
                <input type="text" v-model="ticket.name" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="control-label">Тип заявки <i style="color:red">*</i></label>
                <select v-model="ticket.type" class="form-control" required>
                    <option value="1">Сервисное обслуживание</option>
                    <option value="2">Поддержка</option>
                    <option value="3">Запрос технической информации</option>
                </select>
            </div>

            <div class="form-group">
                <label class="control-label">Приоритет <i style="color:red">*</i></label>
                <select v-model="ticket.priority" class="form-control" required>
                    <option value="1">Высокий</option>
                    <option value="2">Средний</option>
                    <option value="3">Низкий</option>
                </select>
            </div>

            <div class="form-group">
                <label class="control-label">Описание <i style="color:red">*</i></label>
                <textarea v-model="ticket.description" class="form-control" required></textarea>
            </div>

            <h4 class="mt-4">Контактные данные:</h4>
            <div class="form-group">
                <label class="control-label">ФИО <i style="color:red">*</i></label>
                <input type="text" v-model="ticket.client_full_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="control-label">Телефон <i style="color:red">*</i></label>
                <input type="text" v-model="ticket.client_phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="control-label">E-mail</label>
                <input type="email" v-model="ticket.client_email" class="form-control">
            </div>

            <div class="form-group">
                <label class="control-label">Статус <i style="color:red">*</i></label>
                <select v-model="ticket.status" class="form-control" required>
                    <option value="1">Новая</option>
                    <option value="2">В работе</option>
                    <option value="3">Выполнена</option>
                    <option value="4">Отложена</option>
                    <option value="5">Решена</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Комментарий</label>
                <textarea v-model="ticket.comment" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'EditTicket',
        props: [
            'ticket',
            'userId',
        ],
        data: function () {
            return {

            }
        },
        methods: {
            updateTicket() {
                event.preventDefault();
                var app = this;
                var updateTicket = app.ticket;
                console.log(updateTicket);
                axios.post('/ticket/update', updateTicket)
                    .then(function (resp) {
                        window.location.href = "/admin/";
                    })
                    .catch(function (resp) {

                    });
            }
        },
        mounted() {
            this.interval = setInterval(() => {
                axios.post('/ticket/lock', {'ticketId': this.ticket.id, 'userId': this.userId})
                    .then(response => {

                    });
            }, 1000);
        }
    }
</script>

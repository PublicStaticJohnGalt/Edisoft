<template>
    <div id="ticket-form">
        <h1>Добавить заявку</h1>

        <div
            class="alert"
            v-bind:class="{ 'alert-success': alertSuccess, 'alert-error': !alertSuccess }">{{ alert }}</div>

        <form v-on:submit="createTicket()">
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

            <input type="hidden" v-model="ticket.status" value="1" />

            <div class="form-group">
                <button class="btn btn-success">Создать</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                ticket: {
                    name: '',
                    type: '',
                    priority: '',
                    description: '',
                    client_phone: '',
                    client_email: '',
                    client_full_name: '',
                    status: '1',
                },
                alert: '',
                alertSuccess: '',
            }
        },
        methods: {
            createTicket() {
                event.preventDefault();
                var app = this;
                var newTicket = app.ticket;
                axios.post('ticket/create', newTicket)
                    .then(function (resp) {
                        console.log(resp);
                        app.alert = 'Заявка успешно создана';
                        app.alertSuccess = true;
                        app.ticket.name = '';
                        app.ticket.type = '';
                        app.ticket.priority = '';
                        app.ticket.description = '';
                        app.ticket.client_phone = '';
                        app.ticket.client_email = '';
                        app.ticket.client_full_name = '';
                        app.$forceUpdate();

                        setTimeout(function () {
                            app.alert = '';
                            app.alertSuccess = '';
                            app.$forceUpdate();
                        }.bind(app), 5000);
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        app.alert = 'При создании заявки произошла ошибка';
                        app.alertSuccess = false;
                        app.$forceUpdate();
                        setTimeout(function () {
                            app.alert = '';
                            app.alertSuccess = '';
                            app.$forceUpdate();
                        }.bind(app), 5000);
                    });
            }
        }
    }
</script>

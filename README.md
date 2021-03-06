# Тестовое задание для Edisoft

Деплой проекта:
1. git clone https://github.com/PublicStaticJohnGalt/Edisoft
2. Сделать public домашней папкой сайта
3. composer install
4. npm install
5. php artisan cache:clear

## Задание

Необходимо создать небольшое приложение на Yii 1,2 Framework,Laravel 5,6. Желательно оценить свое время на реализацию задачи и прислать это время ответным письмом.

## Приложение для создания заявок. 

На входе мы должны иметь форму с несколькими полями для ввода информации.

Необходимые поля:

- Название заявки
- Тип заявки (Сервисное обслуживание, Поддержка, Запрос технической информации)
- Приоритет заявки (Низкий, Высокий, Средний)
- Описание заявки
- Контактные данные (тел. Почта, ФИО) 

Заявки и пользователи должны быть в разных таблицах и связаны в моделях.

Форма доступна без регистрации и видна на главной странице. Обязательные поля на усмотрение разработчика.

Со стороны админской панели нужно реализовать:

Обязательно

- вывод всех заявок с возможностью сортировки по статусам и типам
- возможность редактировать заявки
- возможность добавлять комментарии к заявкам при их просмотре/редактировании
- статус заявки (новая/в работе/ выполнена/отложена/решена)

На усмотрение разработчика реализовать (одну из фитч, либо все):

- Возможность учитывать время на выполнение заявки (поле для записи времени при добавлении комментария) вписывается руками по формату “ЧЧ: ММ”
- Дополнительное второе поле “время работы” с заявкой вписывается автоматически по правилу (если ведется какая-то работа в заявке, она открыта, что-то пишется в поле комментарий, то время считается автоматически и в поле вписывается время, учтенное системой в автоматическом режиме)
- Если заявку открыли 2 пользователя, то первому дать права полные на редактирование, а второму и далее вывести сообщение, что с заявкой работает такой-то пользователь. И не давать редактировать заявку.

БД можно использовать SQLite.

Приложение должно быть собрано на PHP 7+, использовать composer, приложить маленькую инструкцию как его запустить локально. Код разместить на Github || Bitbucket || Gitlab и предоставить ссылку на репозиторий. Придерживаться PSR-2 при написании кода, использовать миграции для БД.


## Дополнительно описать текстом: 

Описать как сделать очередь заявок и их распределение по сотрудникам компании. При условии, что у каждого сотрудника есть загрузка (равна 100), заявки имеют вес (от 10 до 30), сотрудник может обрабатывать 10 заявок с весом в 10 или 3 весом в 30. Сотрудников 13, заявок может быть до 1000 в сутки, или более.

Как можно учитывать время на работу с заявкой в автоматическом режиме? Нужно для того, чтобы понимать реальное время, затраченное на заявку сотрудником и сравнивать со временем, которое ввел сотрудник после закрытия заявки.



Тестовое задание
--------------------

**УСТАНОВКА**

1. Скопировать репозиторий

	`git clone https://github.com/KhAlexander/test.git`

2. Выполнить установку

	`composer update`

3. Создать базу данных на MySQL скриптом (test - имя базы данных, можно заменить на другое)

	`CREATE DATABASE test
	CHARACTER SET utf8
	COLLATE utf8_general_ci;`

4. В файле .env изменить значения для переменных своего сервера MySQL базы данных и доступа пользователя для создания объектов БД.

	`DB_HOST=127.0.0.1`

	`DB_PORT=3306`
	
	`DB_DATABASE=task`
	
	`DB_USERNAME=root`
	
    `DB_PASSWORD=`
	
5. Создать объекты БД

	`php artisan migrate`
	
6. Запустить приложение из браузера по url

	a) если локальный сервер - _http://localhost/test/public_
	
	b) если на host - _http://domain/public_
	
**ФУНКЦИИ**

1. Создание записи
2. Редактирование записи (необходимо выбрать запись из таблицы) и 
	- использовать кнопку "редактировать"
	или
	- двойной клик мышкой по записи в таблице
3. Удаление записи (необходимо выбрать запись из таблицы).
4. Поиск

	Поиск ведется по всем полям. Настроено, что вводимое значение для поиска ищется во всех полях независимо от расположения -
	в начале, в середине или в конце. Поиск по телефону выполняется без учета формата телефона: 
	
	если телефон +7 (322) 123-45-67, то он найдется по 221, 234 или 56
	

	
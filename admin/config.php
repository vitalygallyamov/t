<?php
	$local="localhost";
	$log="tpatp2";
	$pas="tpatp2";
	$base="tpatp2";

	$admin_email="barsukova@tpatp.ru";
	$admin_email2="kozyrev@tpatp.ru";
	$admin_email3="teplinskaya@tpatp.ru";
	$admin_email4="tpatp@tpatp.ru";
	$admin_email5="diagnostika@tpatp.ru";

	$connection=mysql_connect($local,$log,$pas) or die ("can't connect to mysql");
//	mysql_query("create database $base");
	mysql_select_db($base) or die ("can't select base");

	mysql_set_charset("cp1251");

/*
	mysql_query("create table pages(id int auto_increment, name text, content text, title text, keywords text, description text, razdel int, primary key (id))");

	mysql_query("insert into pages values( '1', 'Главная', '<p>Раздел находится в разработке...</p>', 'Главная', 'Главная', 'Главная', '0' )");
	mysql_query("insert into pages values( '2', 'О компании', '<p>Раздел находится в разработке...</p>', 'О компании', 'О компании', 'О компании', '0' )");
	mysql_query("insert into pages values( '3', 'Обратная связь', '<p>Раздел находится в разработке...</p>', 'Обратная связь', 'Обратная связь', 'Обратная связь', '0' )");
	mysql_query("insert into pages values( '4', 'Расписание движения', '<p>Раздел находится в разработке...</p>', 'Расписание движения', 'Расписание движения', 'Расписание движения', '0' )");
	mysql_query("insert into pages values( '5', 'Новости', '<p>Раздел находится в разработке...</p>', 'Новости', 'Новости', 'Новости', '0' )");
	mysql_query("insert into pages values( '6', 'Заказ автобусов', '<p>Раздел находится в разработке...</p>', 'Заказ автобусов', 'Заказ автобусов', 'Заказ автобусов', '0' )");
	mysql_query("insert into pages values( '7', 'Карьера', '<p>Раздел находится в разработке...</p>', 'Карьера', 'Карьера', 'Карьера', '0' )");
	mysql_query("insert into pages values( '8', 'Дополнительные услуги', '<p>Раздел находится в разработке...</p>', 'Дополнительные услуги', 'Дополнительные услуги', 'Дополнительные услуги', '0' )");
	mysql_query("insert into pages values( '9', 'Снабжение нелеквиды', '<p>Раздел находится в разработке...</p>', 'Снабжение нелеквиды', 'Снабжение нелеквиды', 'Снабжение нелеквиды', '0' )");
	mysql_query("insert into pages values( '10', 'Тобольский автовокзал', '<p>Раздел находится в разработке...</p>', 'Тобольский автовокзал', 'Тобольский автовокзал', 'Тобольский автовокзал', '0' )");
	mysql_query("insert into pages values( '11', 'Продажа билетов', '<p>Раздел находится в разработке...</p>', 'Продажа билетов', 'Продажа билетов', 'Продажа билетов', '0' )");

	mysql_query("insert into pages values( '12', 'Реквизиты', '<p>Раздел находится в разработке...</p>', 'Реквизиты', 'Реквизиты', 'Реквизиты', '2' )");
	mysql_query("insert into pages values( '13', 'История', '<p>Раздел находится в разработке...</p>', 'История', 'История', 'История', '2' )");
	mysql_query("insert into pages values( '14', 'Тобольское ПАТП сегодня', '<p>Раздел находится в разработке...</p>', 'Тобольское ПАТП сегодня', 'Тобольское ПАТП сегодня', 'Тобольское ПАТП сегодня', '2' )");
	mysql_query("insert into pages values( '15', 'Книга почета', '<p>Раздел находится в разработке...</p>', 'Книга почета', 'Книга почета', 'Книга почета', '2' )");
	mysql_query("insert into pages values( '16', 'Законодательство', '<p>Раздел находится в разработке...</p>', 'Законодательство', 'Законодательство', 'Законодательство', '2' )");
	mysql_query("insert into pages values( '17', 'Акционерам и инвесторам', '<p>Раздел находится в разработке...</p>', 'Акционерам и инвесторам', 'Акционерам и инвесторам', 'Акционерам и инвесторам', '2' )");
	mysql_query("insert into pages values( '18', 'Фотогалерея', '<p>Раздел находится в разработке...</p>', 'Фотогалерея', 'Фотогалерея', 'Фотогалерея', '2' )");
	mysql_query("insert into pages values( '19', 'Поздравления', '<p>Раздел находится в разработке...</p>', 'Поздравления', 'Поздравления', 'Поздравления', '2' )");

	mysql_query("insert into pages values( '20', 'Технический осмотр', '<p>Раздел находится в разработке...</p>', 'Технический осмотр', 'Технический осмотр', 'Технический осмотр', '8' )");
	mysql_query("insert into pages values( '21', 'ТО и ТР автобусов и грузовых автомобилей', '<p>Раздел находится в разработке...</p>', 'ТО и ТР автобусов и грузовых автомобилей', 'ТО и ТР автобусов и грузовых автомобилей', 'ТО и ТР автобусов и грузовых автомобилей', '8' )");
	mysql_query("insert into pages values( '22', 'Предрейсовый осмотр водителей', '<p>Раздел находится в разработке...</p>', 'Предрейсовый осмотр водителей', 'Предрейсовый осмотр водителей', 'Предрейсовый осмотр водителей', '8' )");

	mysql_query("insert into pages values( '23', 'Банеры', '<p>Раздел находится в разработке...</p>', '', '', '', '0' )");

	mysql_query("insert into pages values( '24', 'Экскурсионные автобусы', '<p>Раздел находится в разработке...</p>', 'Экскурсионные автобусы', 'Экскурсионные автобусы', 'Экскурсионные автобусы', '6' )");
	mysql_query("insert into pages values( '25', 'Вопрос-ответ', '<p>Раздел находится в разработке...</p>', 'Вопрос-ответ', 'Вопрос-ответ', 'Вопрос-ответ', '3' )");


	mysql_query("insert into pages values( '26', 'Вакансии', '<p>Раздел находится в разработке...</p>', 'Вакансии', 'Вакансии', 'Вакансии', '7' )");
	mysql_query("insert into pages values( '27', 'Мотивация', '<p>Раздел находится в разработке...</p>', 'Мотивация', 'Мотивация', 'Мотивация', '7' )");
	mysql_query("insert into pages values( '28', 'Бланк резюме', '<p>Раздел находится в разработке...</p>', 'Бланк резюме', 'Бланк резюме', 'Бланк резюме', '7' )");

	mysql_query("insert into pages values( '29', 'Город', '<p>Раздел находится в разработке...</p>', 'Город', 'Город', 'Город', '0' )");
	mysql_query("insert into pages values( '30', 'Пригород', '<p>Раздел находится в разработке...</p>', 'Пригород', 'Пригород', 'Пригород', '0' )");
	mysql_query("insert into pages values( '31', 'Дачные', '<p>Раздел находится в разработке...</p>', 'Дачные', 'Дачные', 'Дачные', '0' )");
	mysql_query("insert into pages values( '32', 'Межгород', '<p>Раздел находится в разработке...</p>', 'Межгород', 'Межгород', 'Межгород', '0' )");

	mysql_query("create table baner(id int auto_increment, baner text, razdel int, href text, primary key (id))");
	mysql_query("create table file_razdel(id int auto_increment, name text, primary key (id))");
	mysql_query("create table file(id int auto_increment, name text, file text, razdel int, primary key (id))");
	mysql_query("create table law(id int auto_increment, name text, content text, razdel int, primary key (id))");
	mysql_query("create table book(id int auto_increment, name text, content text, picture text, primary key (id))");
	mysql_query("create table album(id int auto_increment, name text, preview text, primary key (id))");
	mysql_query("create table photo(id int auto_increment, picture text, razdel int, primary key (id))");

	mysql_query("create table news(id int auto_increment, dat int, name text, content text, primary key (id))");
	mysql_query("create table bus(id int auto_increment, name text, place int, picture_01 text, picture_02 text, primary key (id))");
	mysql_query("create table question(id int auto_increment, question text, answer text, primary key (id))");

	mysql_query("create table route(id int auto_increment, nomer text, days text, type int, primary key (id))");
	mysql_query("create table point(id int auto_increment, name text, primary key (id))");
	mysql_query("create table path(id int auto_increment, point_otp int, time_otp text, point_prib int, time_prib text, distance integer, cost double, route int, primary key (id))");
*/

/*
	mysql_query("create table auto_pages(id int auto_increment, name text, content text, title text, keywords text, description text, razdel int, primary key (id))");
	mysql_query("insert into auto_pages values( '1', 'О тобольском<br>автовокзале', '<p>Раздел находится в разработке...</p>', 'О тобольском автовокзале', 'О тобольском автовокзале', 'О тобольском автовокзале', '0' )");
	mysql_query("insert into auto_pages values( '2', '<br>Для пассажиров', '<p>Раздел находится в разработке...</p>', 'Для пассажиров', 'Для пассажиров', 'Для пассажиров', '0' )");
	mysql_query("insert into auto_pages values( '3', '<br>Расписание', '<p>Раздел находится в разработке...</p>', 'Расписание', 'Расписание', 'Расписание', '0' )");
	mysql_query("insert into auto_pages values( '4', '<br>Законодательство', '<p>Раздел находится в разработке...</p>', 'Законодательство', 'Законодательство', 'Законодательство', '0' )");
	mysql_query("insert into auto_pages values( '5', '<br>Новости', '<p>Раздел находится в разработке...</p>', 'Новости', 'Новости', 'Новости', '0' )");
	mysql_query("insert into auto_pages values( '6', '<br>Обратная связь', '<p>Раздел находится в разработке...</p>', 'Обратная связь', 'Обратная связь', 'Обратная связь', '0' )");
	mysql_query("insert into auto_pages values( '7', 'Расписание<br>соседних автовокзалов', '<p>Раздел находится в разработке...</p>', 'Расписание соседних автовокзалов', 'Расписание соседних автовокзалов', 'Расписание соседних автовокзалов', '0' )");
	mysql_query("insert into auto_pages values( '8', 'Рекламный блок', '<p>Раздел находится в разработке...</p>', 'Рекламный блок', 'Рекламный блок', 'Рекламный блок', '0' )");

	mysql_query("create table auto_news(id int auto_increment, dat int, name text, content text, primary key (id))");
	mysql_query("create table auto_file_razdel(id int auto_increment, name text, primary key (id))");
	mysql_query("create table auto_file(id int auto_increment, name text, file text, razdel int, primary key (id))");

	mysql_query("create table auto_route(id int auto_increment, nomer text, days text, type int, primary key (id))");
	mysql_query("create table auto_point(id int auto_increment, name text, primary key (id))");
	mysql_query("create table auto_path(id int auto_increment, point_otp int, time_otp text, point_prib int, time_prib text, distance integer, cost double, route int, primary key (id))");

	mysql_query("insert into pages values( '26', 'Вакансии', '<p>Раздел находится в разработке...</p>', 'Вакансии', 'Вакансии', 'Вакансии', '7' )");
	mysql_query("insert into pages values( '27', 'Мотивация', '<p>Раздел находится в разработке...</p>', 'Мотивация', 'Мотивация', 'Мотивация', '7' )");
	mysql_query("insert into pages values( '28', 'Бланк резюме', '<p>Раздел находится в разработке...</p>', 'Бланк резюме', 'Бланк резюме', 'Бланк резюме', '7' )");

	mysql_query("create table file2(id int auto_increment, name text, file text, primary key (id))");
*/
/*
	mysql_query("insert into auto_pages values( '9', 'Город', '<p>Раздел находится в разработке...</p>', 'Город', 'Город', 'Город', '3' )");
	mysql_query("insert into auto_pages values( '10', 'Пригород', '<p>Раздел находится в разработке...</p>', 'Пригород', 'Пригород', 'Пригород', '3' )");
	mysql_query("insert into auto_pages values( '11', 'Дачные', '<p>Раздел находится в разработке...</p>', 'Дачные', 'Дачные', 'Дачные', '3' )");
	mysql_query("insert into auto_pages values( '12', 'Межгород', '<p>Раздел находится в разработке...</p>', 'Межгород', 'Межгород', 'Межгород', '3' )");
*/
/*
	mysql_query("alter table question add name text");
	mysql_query("alter table question add email text");
*/

/*
	mysql_query("insert into pages values( '33', 'Общие положения', '<p>Раздел находится в разработке...</p>', 'Общие положения', 'Общие положения', 'Общие положения', '8' )");
	mysql_query("insert into pages values( '34', 'Предъявляемые документы', '<p>Раздел находится в разработке...</p>', 'Предъявляемые документы', 'Предъявляемые документы', 'Предъявляемые документы', '8' )");
	mysql_query("insert into pages values( '35', 'Предварительная запись на ГТО', '<p>Раздел находится в разработке...</p>', 'Предварительная запись на ГТО', 'Предварительная запись на ГТО', 'Предварительная запись на ГТО', '8' )");

	mysql_query("alter table file2 add type int default '0' ");
*/

	mysql_query("create table main(id int auto_increment, picture varchar( 25 ), href varchar( 255 ), primary key (id))");

	mysql_query( "update pages set name='Книга жалоб и предложений', title='Книга жалоб и предложений', keywords='Книга жалоб и предложений', description='Книга жалоб и предложений' where id='3' " );
	mysql_query( "update pages set name='Часто задаваемые вопросы', title='Часто задаваемые вопросы', keywords='Часто задаваемые вопросы', description='Часто задаваемые вопросы' where id='25' " );

	mysql_query( "alter table question add ip char( 15 ) default '0.0.0.0' " );

	mysql_query("create table question2(id int auto_increment, question text, answer text, primary key (id))");
?>
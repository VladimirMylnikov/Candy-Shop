
# Проект сайта кондитерского магазина

Проект сайта для кондитерского магазина, позволяющего производить покупки кондитерских товаров. Разметка сайта полностью адаптирована под различного рода устройства.

## Функционал

- **Сортировка товаров по категориям**: Вы можете просматривать все товары или выбирать определенные категории, такие как шоколад, печенье или кексы.
- **Изменение граммовки товара**: Вы можете изменять количество граммов для каждого товара.
- **Добавление в корзину**: Легко добавляйте товары в корзину для последующего заказа.
- **Удаление из корзины**: Удаляйте товары из корзины, если передумали.
- **Увеличение/изменение количества товара в корзине**: Регулируйте количество товаров в корзине.
- **Отправка информации о заказе на почту**: После оформления заказа информация будет отправлена на вашу почту.

## Структура сайта

- **Шапка сайта**: Предоставляет навигацию по категориям сайта.
- **Баннер**: Содержит краткую информацию о кондитерской (название, слоган и т.п.).
- **Продукция**: Раздел с товарами содержит в себе кнопки для сортировки товаров по категориям, а также карточки с информацией о товарах.
- **О нас**: Раздел с подробной информацией о кондитерской.
- **Контакты**: Раздел с контактной информацией о сайте, включая местоположения на карте.
- **Подвал**: Нижний раздел сайта с логотипом компании.
- **Кнопка для перехода в корзину**: Содержит в себе счетчик товаров, а также позволяет перейти в корзину.
- **Всплывающее окно корзины**: Содержит список с карточками товаров, добавленных в корзину, а также поля для указания контакной информации заказчика.

## Технологии

- **HTML**: Структура сайта.
- **CSS**: Стилизация и оформление.
- **JavaScript**: Взаимодействие с пользователем и динамическое обновление контента.
- **PHP**: Подключение и взаимодействие с базой данных.
- **MySQL**: Хранение данных о товарах и заказах.
- **Api Яндекс карты**: Карта с расположением магазина.

### Требования

- Веб-сервер (например, Apache)
- PHP 7.4 или выше
- MySQL 5.7 или выше

## Интерфейс

<img src = "https://github.com/user-attachments/assets/a4f5b664-735e-4c7f-ba58-87242a8767d2" width ="710" /> <img src = "https://github.com/user-attachments/assets/eae8c681-f197-479d-99b3-90a1de325333" width ="200" />

*Заглавный баннер сайта*

<img src = "https://github.com/user-attachments/assets/4fc7c7e1-d90b-40b9-a70a-1d7fe6ed4689" width ="710" /> <img src = "https://github.com/user-attachments/assets/a8f5107d-fe4c-4fa4-aa29-c4e21ddc3bc6" width ="200" />

*Раздел с товарами*

<img src = "https://github.com/user-attachments/assets/9831c408-3e11-4494-9a45-c5d7c8b18afd" width ="710" /> <img src = "https://github.com/user-attachments/assets/259dddc6-e883-4a6b-9867-2c2c8ffc92ba" width ="200" />

*Карточки товаров*

<img src = "https://github.com/user-attachments/assets/056df415-b49d-48d4-8176-14c7a813f8b4" width ="710" /> <img src = "https://github.com/user-attachments/assets/5c7ca7fe-d246-4f1a-92bb-3aa4c4c4f003" width ="200" />

*Раздел с информацией о кондитерской*

<img src = "https://github.com/user-attachments/assets/f659f2fc-99bc-4ccc-a439-9cc307e7b6f3" width ="710" /> <img src = "https://github.com/user-attachments/assets/8eac04bb-6944-4c31-8185-4b21074ae099" width ="200" />

*Раздел с контактной информацией*

<img src = "https://github.com/user-attachments/assets/c77c4480-3753-4159-a975-3b0e395ab680" width ="710" /> <img src = "https://github.com/user-attachments/assets/d3214e40-3163-4a67-83e2-b1a4f111b5f4" width ="200" />

*Пустая корзина*

<img src = "https://github.com/user-attachments/assets/6de4aa0b-9821-4965-b287-eac86485ac8e" width ="710" /> <img src = "https://github.com/user-attachments/assets/53f44e0b-9e39-4910-b8d1-31556360a581" width ="200" />

*Корзина с товарами*

## Подключение к базе данных

Для подключения к базе данных необходимо произвести настройку файла database.php. 

```
<?php
$servrer = "";
$login = "root";
$pass = "";
$name_db = "online-store";
$link = mysqli_connect($server,$login,$pass,$name_db);

if ($link == False)
{
  echo "Соединение не удалось";
}
 ?>
```

## Настройка почты

Для настройки почты необходимо указать данные почтового ящика в файле mail.php

```
$admin_email = 'your email here';
```



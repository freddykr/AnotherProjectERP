# AnotherProjectERP (AnotherProjectManagementSystem)
***
## Alhpa-версия!
Система Управления Проектами. Это альфа-версия.  

## Что умеет:

### 1. Проект, планирование, исполнение
  - Создавать проект
    + обычный
    + серийный в разработке
  - Создавать план проекта
    + Возможность создавать и применять шаблоны со стадиями и задачами.
    + Возможность переключить выполнение плана в ручной или автоматический режим (в случае ручного - план не выполняется).  
  - Стадии проекта
  - Задачи: 
     + Создание для выполнения сейчас / создание для плана
     + Возможность курирования (кроме инициатора, есть куратор - задается при создании)
     + Возможность принятия решения исполнителю (кроме задач из плана)
     + Причина просроченного завершения
     + Механизм продления
     + Комментарии
     + Автозапуск задач в случае истечения указанного срока на принятие решения
  - Хранение файлов
  - Группы файлов
    + Управляемый доступ
  - Журнал событий
    + Типы событий
    + Возможность прикреплять выбранные события
  - Возможность разрабатывать модули и плагины как OOП (MVC паттерн), так и функциональным стилем, что облегчает создание своих наработок 

### 2. Управление
  - Группы и роли прользователей
    + Возможность менять пароли/группы/логины и т.п.
  - Редактируемый доступ ко вкладкам проекта
    + В ом числе выбирать порядок отображения
  - Управление модулями/плагинами/меню/стадиями проекта
  - Управление доступами к группам файлов и выбор дирректории для хранения

## Системные требования:
- PHP >= 5.6.22 (лучше 7)
- MySQL >= 5.5 или MariaDB >= 10.x
- Apache 2.4.x или nginx(лучше) 
- Браузер на Chromuim (из-за html5-элементов, которые на Мозиле до сих пор не везде работают)

## Скриншоты
 
 ![Журнал событий](https://github.com/akaLexa/AnotherProjectERP/blob/master/1.png "Журнал событий")
 ![Список проектов](https://github.com/akaLexa/AnotherProjectERP/blob/master/2.png "Список проектов")
 ![Вкладки в проекте](https://github.com/akaLexa/AnotherProjectERP/blob/master/3.png "Вкладки в проекте")

### Установка
- Открыть configs/configs.php любым текстовым редактором и отредактировать (если нужно) строку "defaultBuild"=>"erp" на "defaultBuild"=>"install"
- Сохранить, зайти в браузер. Если не появился скрипт установки, очистить куки и обновить страницу 
- Логин/Пароль: admin/admin
- Настройки для nginx находятся в комментариях файла .htaccess


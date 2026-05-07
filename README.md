# Лабораторная работа: CI/CD для PHP-приложения (GitHub Actions + Docker)

## Автор

ФИО: Лямичев Семён Яковлевич  
Группа: ПМИ2-ИП1

---

## Описание задания

1. Подготовить Dockerfile для PHP-приложения с поддержкой Composer и зависимостей.
2. Подготовить docker-compose.yml с сервисом php.
3. Настроить CI pipeline в GitHub Actions для сборки Docker и запуска PHPUnit.
4. Проверить работу pipeline на успешных тестах.
5. Продемонстрировать падение pipeline при ошибке в тесте и вернуть тест обратно.

Тема приложения: оформление билетов в кино (имя, количество билетов, фильм, чекбокс «3D очки», радио «Тип места»).

---

## Структура проекта

```text
code/
  TicketOrder.php
tests/
  TicketOrderTest.php
docker-compose.yml
Dockerfile
composer.json
phpunit.xml
.github/workflows/ci.yml
```

---

## Как проверить локально

1. Установить зависимости:
   ```bash
   composer install
   ```

2. Запустить тесты:
   ```bash
   vendor/bin/phpunit tests
   ```

3. Запустить тесты через Docker:
   ```bash
   docker compose up -d --build
   docker compose exec -T php composer install
   docker compose exec -T php vendor/bin/phpunit tests
   docker compose down
   ```

---

## Результат

Настроен CI/CD pipeline на GitHub Actions для PHP-приложения в Docker: при пуше в ветку main выполняется сборка контейнера, установка зависимостей Composer и запуск тестов PHPUnit. Продемонстрировано падение pipeline при намеренно сломанном тесте и последующее восстановление зелёного статуса после исправления.

Для корректной работы CI в контейнер монтируется весь проект, чтобы были доступны `composer.json` и `phpunit.xml`.

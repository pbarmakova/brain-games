# Имя цели (или выходного файла)
TARGET = brain-games

# Переменные
PHP = php
COMPOSER = composer
PHPUNIT = .vendor/bin/phpunit

# Правило по умолчанию
all: install

# Установка зависимостей с Composer
install:
	$(COMPOSER) install

# Запуск проекта
brain-games:
	./bin/$(TARGET)

# Запуск тестов
test:
	$(PHPUNIT)

# Проверка файла composer.json на правильность
validate:
	$(COMPOSER) validate

# Очистка временных файлов
clean:
	rm -rf vendor
	rm -rf *.log

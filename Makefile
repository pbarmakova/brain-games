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

# Запуск проекта на четность
brain-even:
	./bin/brain-even

# Запуск тестов
test:
	$(PHPUNIT)

# Проверка файла composer.json на правильность
validate:
	$(COMPOSER) validate

# Запуск phpcs - сниффер
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

# Очистка временных файлов
clean:
	rm -rf vendor
	rm -rf *.log

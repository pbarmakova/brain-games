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

# Запуск проекта на калькулятор
brain-calc:
	./bin/brain-calc

# Запуск проекта на нод
brain-gcd:
	./bin/brain-gcd

# Запуск проекта на арифметическую прогрессию
brain-progression:
	./bin/brain-progression

# Запуск проекта на простое число
brain-prime:
	./bin/brain-prime

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

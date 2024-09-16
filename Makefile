# Установка зависимостей с Composer
install:
	composer install

# Запуск проекта
brain-games:
	./bin/brain-games

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

# Проверка файла composer.json на правильность
validate:
	composer validate

# Запуск phpcs - сниффер
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
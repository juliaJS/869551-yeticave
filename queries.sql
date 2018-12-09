--заполнение БД данными из существующих массивов
	
INSERT INTO categories
	(name) VALUES
  	('Доски и лыжи'),
		('Крепления'),
		('Ботинки'),
		('Одежда'),
		('Инструменты'),
		('Разное');
	

INSERT INTO users
	(email, name, password, avatar) VALUES
	    ('ulia@mail.ru', 'Юлия', 'secret', 'img/user.jpg'),
	    ('vaska@mail.ru', 'Василий','secret', 'img/user.jpg'),
			('peter@mail.ru', 'Петр', 'secret', 'img/user.jpg');


INSERT INTO lots
    (title, description, image, price, user_id, category_id, increment_rate, end_time) VALUES
      ('2014 Rossignol District Snowboard', 'Сноуборд из платика. Фрирайд', 'img/lot-1.jpg', 10999, 1, 1, 200,
            '2018-12-20 00:33:22'),
      ('DC Ply Mens 2016/2017 Snowboard', 'Сноуборд из платика. Фрирайд', 'img/lot-2.jpg', 159999, 2, 1, 200,
            '2018-12-20 00:33:22'),
      ('Крепления Union Contact Pro 2015 года размер L/XL', 'Сноуборд из платика. Фрирайд', 'img/lot-3.jpg', 8000,
            3, 2, 200, '2018-12-20 00:33:22'),
      ('Ботинки для сноуборда DC Mutiny Charocal', 'Сноуборд из платика. Фрирайд', 'img/lot-4.jpg', 10999, 1, 4, 200,
            '2018-12-20 00:33:22'),
      ('Куртка для сноуборда DC Mutiny Charocal', 'Сноуборд из платика. Фрирайд', 'img/lot-5.jpg', 7500, 2, 5, 200,
            '2018-12-20 00:33:22'),
      ('Маска Oakley Canopy', 'Сноуборд из платика. Фрирайд', 'img/lot-6.jpg', 5400, 3, 6, 200, '2018-12-20 00:33:22');
	
	
INSERT INTO rates
    (user_id, lot_id, amount) VALUES
      (2, 6, 5800),
      (1, 3, 8600);
	

--получить все категории
 SELECT * FROM categories;
 
--получить самые новые, открытые лоты (каждый лот включает название, стартовую цену,
--ссылку на изображение, цену, название категории)
 SELECT l.id, l.title, l.price, l.image, c.name, r.amount
 FROM lots l
 LEFT JOIN categories c ON c.id = l.category_id
 LEFT JOIN rates r ON r.lot_id = l.id;

--получение списка самых свежих ставок для лота по его идентификатору
SELECT * FROM rates WHERE lot_id = 6;

--показ лота по его id, а также получение названия категории, к которой принадлежит лот
SELECT l.id, l.title, l.price, l.image, c.name
FROM lots l WHERE l.id = 5
  LEFT JOIN categories c ON c.id = l.category_id;

--обновить название лота по его идентификатору
UPDATE lots SET name = '2018 Rossignol District Snowboard'
WHERE id = 1;




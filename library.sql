-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 10 2019 г., 22:43
-- Версия сервера: 5.6.38
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `name`, `last_name`, `country`) VALUES
(1, 'Chinua', 'Achebe', 'Nigeria'),
(2, 'Hans Christian', 'Andersen', 'Denmark'),
(3, 'Dante', 'Alighieri', 'Italy'),
(4, 'Unknown', '', 'Sumer and Akkadian Empire'),
(5, 'Unknown', '', 'Achaemenid Empire'),
(6, 'Unknown', '', 'India/Iran/Iraq/Egypt/Tajikistan'),
(7, 'Unknown', '', 'Iceland'),
(8, 'Jane', 'Austen', 'United Kingdom'),
(9, 'Honoré de', 'Balzac', 'France'),
(10, 'Samuel', 'Beckett', 'Republic of Ireland'),
(11, 'Giovanni', 'Boccaccio', 'Italy'),
(12, 'Jorge Luis', 'Borges', 'Argentina'),
(13, 'Emily', 'Brontë', 'United Kingdom'),
(14, 'Albert', 'Camus', 'Algeria, French Empire'),
(15, 'Paul', 'Celan', 'Romania, France'),
(16, 'Louis-Ferdinand', 'Céline', 'France'),
(17, 'Miguel de', 'Cervantes', 'Spain'),
(18, 'Geoffrey', 'Chaucer', 'England'),
(19, 'Anton', 'Chekhov', 'Russia'),
(20, 'Joseph', 'Conrad', 'United Kingdom'),
(21, 'Charles', 'Dickens', 'United Kingdom'),
(22, 'Denis', 'Diderot', 'France'),
(23, 'Alfred', 'Döblin', 'Germany'),
(24, 'Fyodor', 'Dostoevsky', 'Russia'),
(25, 'George', 'Eliot', 'United Kingdom'),
(26, 'Ralph', 'Ellison', 'United States'),
(27, 'Unknown', '', 'Greece'),
(28, 'William', 'Faulkner', 'United States'),
(29, 'Gustave', 'Flaubert', 'France'),
(30, 'Federico García', 'Lorca', 'Spain'),
(31, 'Gabriel García', 'Márquez', 'Colombia'),
(32, 'Johann Wolfgang von', 'Goethe', 'Saxe-Weimar'),
(33, 'Nikolai', 'Gogol', 'Russia'),
(34, 'Günter', 'Grass', 'Germany'),
(35, 'João Guimarães', 'Rosa', 'Brazil'),
(36, 'Knut', 'Hamsun', 'Norway'),
(37, 'Ernest', 'Hemingway', 'United States'),
(38, 'Henrik', 'Ibsen', 'Norway'),
(39, 'James', 'Joyce', 'Irish Free State'),
(40, 'Franz', 'Kafka', 'Czechoslovakia'),
(41, 'Unknown', '', 'India'),
(42, 'Yasunari', 'Kawabata', 'Japan'),
(43, 'Nikos', 'Kazantzakis', 'Greece'),
(44, 'D. H.', 'Lawrence', 'United Kingdom'),
(45, 'Halldór', 'Laxness', 'Iceland'),
(46, 'Giacomo', 'Leopardi', 'Italy'),
(47, 'Doris', 'Lessing', 'United Kingdom'),
(48, 'Astrid', 'Lindgren', 'Sweden'),
(49, 'Lu', 'Xun', 'China'),
(50, 'Naguib', 'Mahfouz', 'Egypt'),
(51, 'Thomas', 'Mann', 'Germany'),
(52, 'Herman', 'Melville', 'United States'),
(53, 'Michel de', 'Montaigne', 'France'),
(54, 'Elsa', 'Morante', 'Italy'),
(55, 'Toni', 'Morrison', 'United States'),
(56, 'Murasaki', 'Shikibu', 'Japan'),
(57, 'Robert', 'Musil', 'Austria'),
(58, 'Vladimir', 'Nabokov', 'Russia/United States'),
(59, 'George', 'Orwell', 'United Kingdom'),
(60, 'Unknown', '', 'Roman Empire'),
(61, 'Fernando', 'Pessoa', 'Portugal'),
(62, 'Edgar Allan', 'Poe', 'United States'),
(63, 'Marcel', 'Proust', 'France'),
(64, 'François', 'Rabelais', 'France'),
(65, 'Juan', 'Rulfo', 'Mexico'),
(66, 'Unknown', '', 'Sultanate of Rum'),
(67, 'Salman', 'Rushdie', 'United Kingdom, India'),
(68, 'Unknown', '', 'Persia, Persian Empire'),
(69, 'Tayeb', 'Salih', 'Sudan'),
(70, 'José', 'Saramago', 'Portugal'),
(71, 'William', 'Shakespeare', 'England'),
(72, 'Unknown', '', 'France'),
(73, 'Laurence', 'Sterne', 'England'),
(74, 'Italo', 'Svevo', 'Italy'),
(75, 'Jonathan', 'Swift', 'Ireland'),
(76, 'Leo', 'Tolstoy', 'Russia'),
(77, 'Mark', 'Twain', 'United States'),
(78, 'Walt', 'Whitman', 'United States'),
(79, 'Virginia', 'Woolf', 'United Kingdom'),
(80, 'Marguerite', 'Yourcenar', 'France/Belgium');

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `author_id`, `title`, `publish_date`) VALUES
(1, 1, 'Things Fall Apart', '1958-01-01'),
(2, 2, 'Fairy tales', '1836-01-01'),
(3, 3, 'The Divine Comedy', '1315-01-01'),
(4, 4, 'The Epic Of Gilgamesh', '0000-00-00'),
(5, 5, 'The Book Of Job', '0000-00-00'),
(6, 6, 'One Thousand and One Nights', '1200-01-01'),
(7, 7, 'Njál\'s Saga', '1350-01-01'),
(8, 8, 'Pride and Prejudice', '1813-01-01'),
(9, 9, 'Le Père Goriot', '1835-01-01'),
(10, 10, 'Molloy, Malone Dies, The Unnamable, the trilogy', '1952-01-01'),
(11, 11, 'The Decameron', '1351-01-01'),
(12, 12, 'Ficciones', '1965-01-01'),
(13, 13, 'Wuthering Heights', '1847-01-01'),
(14, 14, 'The Stranger', '1942-01-01'),
(15, 15, 'Poems', '1952-01-01'),
(16, 16, 'Journey to the End of the Night', '1932-01-01'),
(17, 17, 'Don Quijote De La Mancha', '1610-01-01'),
(18, 18, 'The Canterbury Tales', '1450-01-01'),
(19, 19, 'Stories', '1886-01-01'),
(20, 20, 'Nostromo', '1904-01-01'),
(21, 21, 'Great Expectations', '1861-01-01'),
(22, 22, 'Jacques the Fatalist', '1796-01-01'),
(23, 23, 'Berlin Alexanderplatz', '1929-01-01'),
(24, 24, 'Crime and Punishment', '1866-01-01'),
(25, 24, 'The Idiot', '1869-01-01'),
(26, 24, 'The Possessed', '1872-01-01'),
(27, 24, 'The Brothers Karamazov', '1880-01-01'),
(28, 25, 'Middlemarch', '1871-01-01'),
(29, 26, 'Invisible Man', '1952-01-01'),
(30, 27, 'Medea', '0000-00-00'),
(31, 28, 'Absalom, Absalom!', '1936-01-01'),
(32, 28, 'The Sound and the Fury', '1929-01-01'),
(33, 29, 'Madame Bovary', '1857-01-01'),
(34, 29, 'Sentimental Education', '1869-01-01'),
(35, 30, 'Gypsy Ballads', '1928-01-01'),
(36, 31, 'One Hundred Years of Solitude', '1967-01-01'),
(37, 31, 'Love in the Time of Cholera', '1985-01-01'),
(38, 32, 'Faust', '1832-01-01'),
(39, 33, 'Dead Souls', '1842-01-01'),
(40, 34, 'The Tin Drum', '1959-01-01'),
(41, 35, 'The Devil to Pay in the Backlands', '1956-01-01'),
(42, 36, 'Hunger', '1890-01-01'),
(43, 37, 'The Old Man and the Sea', '1952-01-01'),
(44, 27, 'Iliad', '0000-00-00'),
(45, 27, 'Odyssey', '0000-00-00'),
(46, 38, 'A Doll\'s House', '1879-01-01'),
(47, 39, 'Ulysses', '1922-01-01'),
(48, 40, 'Stories', '1924-01-01'),
(49, 40, 'The Trial', '1925-01-01'),
(50, 40, 'The Castle', '1926-01-01'),
(51, 41, 'The recognition of Shakuntala', '0150-01-01'),
(52, 42, 'The Sound of the Mountain', '1954-01-01'),
(53, 43, 'Zorba the Greek', '1946-01-01'),
(54, 44, 'Sons and Lovers', '1913-01-01'),
(55, 45, 'Independent People', '1934-01-01'),
(56, 46, 'Poems', '1818-01-01'),
(57, 47, 'The Golden Notebook', '1962-01-01'),
(58, 48, 'Pippi Longstocking', '1945-01-01'),
(59, 49, 'Diary of a Madman', '1918-01-01'),
(60, 50, 'Children of Gebelawi', '1959-01-01'),
(61, 51, 'Buddenbrooks', '1901-01-01'),
(62, 51, 'The Magic Mountain', '1924-01-01'),
(63, 52, 'Moby Dick', '1851-01-01'),
(64, 53, 'Essays', '1595-01-01'),
(65, 54, 'History', '1974-01-01'),
(66, 55, 'Beloved', '1987-01-01'),
(67, 56, 'The Tale of Genji', '1006-01-01'),
(68, 57, 'The Man Without Qualities', '1931-01-01'),
(69, 58, 'Lolita', '1955-01-01'),
(70, 59, 'Nineteen Eighty-Four', '1949-01-01'),
(71, 60, 'Metamorphoses', '0100-01-01'),
(72, 61, 'The Book of Disquiet', '1928-01-01'),
(73, 62, 'Tales', '1950-01-01'),
(74, 63, 'In Search of Lost Time', '1920-01-01'),
(75, 64, 'Gargantua and Pantagruel', '1533-01-01'),
(76, 65, 'Pedro Páramo', '1955-01-01'),
(77, 66, 'The Masnavi', '1236-01-01'),
(78, 67, 'Midnight\'s Children', '1981-01-01'),
(79, 68, 'Bostan', '1257-01-01'),
(80, 69, 'Season of Migration to the North', '1966-01-01'),
(81, 70, 'Blindness', '1995-01-01'),
(82, 71, 'Hamlet', '1603-01-01'),
(83, 71, 'King Lear', '1608-01-01'),
(84, 71, 'Othello', '1609-01-01'),
(85, 27, 'Oedipus the King', '0000-00-00'),
(86, 72, 'The Red and the Black', '1830-01-01'),
(87, 73, 'The Life And Opinions of Tristram Shandy', '1760-01-01'),
(88, 74, 'Confessions of Zeno', '1923-01-01'),
(89, 75, 'Gulliver\'s Travels', '1726-01-01'),
(90, 76, 'War and Peace', '1867-01-01'),
(91, 76, 'Anna Karenina', '1877-01-01'),
(92, 76, 'The Death of Ivan Ilyich', '1886-01-01'),
(93, 77, 'The Adventures of Huckleberry Finn', '1884-01-01'),
(94, 41, 'Ramayana', '0000-00-00'),
(95, 60, 'The Aeneid', '0000-00-00'),
(96, 41, 'Mahabharata', '0000-00-00'),
(97, 78, 'Leaves of Grass', '1855-01-01'),
(98, 79, 'Mrs Dalloway', '1925-01-01'),
(99, 79, 'To the Lighthouse', '1927-01-01'),
(100, 80, 'Memoirs of Hadrian', '1951-01-01');

-- --------------------------------------------------------

--
-- Структура таблицы `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191104165524', '2019-11-04 16:56:57'),
('20191105191828', '2019-11-05 19:19:05');

-- --------------------------------------------------------

--
-- Структура таблицы `translation`
--

CREATE TABLE `translation` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `language` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `translation`
--

INSERT INTO `translation` (`id`, `book_id`, `language`) VALUES
(1, 1, 'English'),
(2, 2, 'Danish'),
(3, 3, 'Italian'),
(4, 4, 'Akkadian'),
(5, 5, 'Hebrew'),
(6, 6, 'Arabic'),
(7, 7, 'Old Norse'),
(8, 8, 'English'),
(9, 9, 'French'),
(10, 10, 'French'),
(11, 10, 'English'),
(12, 11, 'Italian'),
(13, 12, 'Spanish'),
(14, 13, 'English'),
(15, 14, 'French'),
(16, 15, 'German'),
(17, 16, 'French'),
(18, 17, 'Spanish'),
(19, 18, 'English'),
(20, 19, 'Russian'),
(21, 20, 'English'),
(22, 21, 'English'),
(23, 22, 'French'),
(24, 23, 'German'),
(25, 24, 'Russian'),
(26, 25, 'Russian'),
(27, 26, 'Russian'),
(28, 27, 'Russian'),
(29, 28, 'English'),
(30, 29, 'English'),
(31, 30, 'Greek'),
(32, 31, 'English'),
(33, 32, 'English'),
(34, 33, 'French'),
(35, 34, 'French'),
(36, 35, 'Spanish'),
(37, 36, 'Spanish'),
(38, 37, 'Spanish'),
(39, 38, 'German'),
(40, 39, 'Russian'),
(41, 40, 'German'),
(42, 41, 'Portuguese'),
(43, 42, 'Norwegian'),
(44, 43, 'English'),
(45, 44, 'Greek'),
(46, 45, 'Greek'),
(47, 46, 'Norwegian'),
(48, 47, 'English'),
(49, 48, 'German'),
(50, 49, 'German'),
(51, 50, 'German'),
(52, 51, 'Sanskrit'),
(53, 52, 'Japanese'),
(54, 53, 'Greek'),
(55, 54, 'English'),
(56, 55, 'Icelandic'),
(57, 56, 'Italian'),
(58, 57, 'English'),
(59, 58, 'Swedish'),
(60, 59, 'Chinese'),
(61, 60, 'Arabic'),
(62, 61, 'German'),
(63, 62, 'German'),
(64, 63, 'English'),
(65, 64, 'French'),
(66, 65, 'Italian'),
(67, 66, 'English'),
(68, 67, 'Japanese'),
(69, 68, 'German'),
(70, 69, 'English'),
(71, 70, 'English'),
(72, 71, 'Classical Latin'),
(73, 72, 'Portuguese'),
(74, 73, 'English'),
(75, 74, 'French'),
(76, 75, 'French'),
(77, 76, 'Spanish'),
(78, 77, 'Persian'),
(79, 78, 'English'),
(80, 79, 'Persian'),
(81, 80, 'Arabic'),
(82, 81, 'Portuguese'),
(83, 82, 'English'),
(84, 83, 'English'),
(85, 84, 'English'),
(86, 85, 'Greek'),
(87, 86, 'French'),
(88, 87, 'English'),
(89, 88, 'Italian'),
(90, 89, 'English'),
(91, 90, 'Russian'),
(92, 91, 'Russian'),
(93, 92, 'Russian'),
(94, 93, 'English'),
(95, 94, 'Sanskrit'),
(96, 95, 'Classical Latin'),
(97, 96, 'Sanskrit'),
(98, 97, 'English'),
(99, 98, 'English'),
(100, 99, 'English'),
(101, 100, 'French');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `last_name`) VALUES
(1, 'demo', '$2y$13$d0Ae2D/KJsm9x6QicfTkx.SqRcAHRKSUzk12kOq4A9fdATjTCXfrO', 'Demo', 'Demo');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CBE5A331F675F31B` (`author_id`);

--
-- Индексы таблицы `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `translation`
--
ALTER TABLE `translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B469456F16A2B381` (`book_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `translation`
--
ALTER TABLE `translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_CBE5A331F675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);

--
-- Ограничения внешнего ключа таблицы `translation`
--
ALTER TABLE `translation`
  ADD CONSTRAINT `FK_B469456F16A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

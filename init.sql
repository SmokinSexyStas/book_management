CREATE TABLE `users` (
                         `id`       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                         `login`    VARCHAR(64)  NOT NULL UNIQUE,
                         `password` VARCHAR(255) NOT NULL
);

CREATE TABLE `books` (
                         `id`           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                         `title`        VARCHAR(255) NOT NULL,
                         `author`       VARCHAR(255) NOT NULL,
                         `release_year` SMALLINT        NOT NULL,
                         `genre`        VARCHAR(100) NOT NULL
);

INSERT INTO `users` (`login`, `password`)
VALUES ('admin', '$2y$10$KnlwessNOd6kCLti.q0rQuLLpCYi1rPX6sZ25hRlZoWzghHkZEqZi');

INSERT INTO `books` (`title`, `author`, `release_year`, `genre`) VALUES
                     ('1984', 'George Orwell', 1949, 'Dystopia'),
                     ('Kobzar', 'Taras Shevchenko', 1840, 'Poetry'),
                     ('Dune', 'Frank Herbert', 1965, 'Science Fiction'),
                     ('Shadows of Forgotten Ancestors', 'Mykhailo Kotsiubynsky', 1912, 'Novella'),
                     ('Harry Potter and the Philosophers Stone', 'J.K. Rowling', 1997, 'Fantasy'),
                     ('The Call of Cthulhu', 'H.P. Lovecraft', 1928, 'Horror'),
                     ('At the Mountains of Madness', 'H.P. Lovecraft', 1936, 'Horror'),
                     ('The Lord of the Rings', 'J.R.R. Tolkien', 1954, 'Fantasy'),
                     ('The Silmarillion', 'J.R.R. Tolkien', 1977, 'Fantasy'),
                     ('Revolt Against the Modern World', 'Julius Evola', 1934, 'Philosophy'),
                     ('Pagan Imperialism', 'Julius Evola', 1928, 'Philosophy'),
                     ('Thus Spoke Zarathustra', 'Friedrich Nietzsche', 1883, 'Philosophy'),
                     ('Beyond Good and Evil', 'Friedrich Nietzsche', 1886, 'Philosophy'),
                     ('Jonathan Livingston Seagull', 'Richard Bach', 1970, 'Parable'),
                     ('The Little Prince', 'Antoine de Saint-Exupery', 1943, 'Fable'),
                     ('The Cathedral', 'Oles Honchar', 1968, 'Novel'),
                     ('Do Oxen Low When Mangers Are Full?', 'Panas Myrnyi', 1880, 'Novel'),
                     ('Animal Farm', 'George Orwell', 1945, 'Dystopia'),
                     ('The Hobbit', 'J.R.R. Tolkien', 1937, 'Fantasy'),
                     ('The Shadow over Innsmouth', 'H.P. Lovecraft', 1936, 'Horror');
create TABLE Scriptures (
    id SERIAL UNIQUE NOT NULL PRIMARY KEY,
    book varchar(25) NOT NULL,
    chapter int NOT NULL,
    verse int NOT NULL,
    content text NOT NULL
);

create TABLE topic (
    id SERIAL UNIQUE NOT NULL PRIMARY KEY,
    topic_name varchar(255) NOT NULL
);

create table link (
    id SERIAL UNIQUE NOT NULL PRIMARY KEY,
    scripture_id integer REFERENCES Scriptures (id),
    topic_id integer REFERENCES topic (id) 
);

insert into topic (topic_name)
    values ('Faith');

insert into topic (topic_name)
    values ('Sacrifice');

insert into topic (topic_name)
    values ('Charity');




insert into Scriptures
    (book, chapter, verse, content)
    VALUES (
        'John 1', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.'
);

insert into Scriptures
    (book, chapter, verse, content)
    VALUES (
        'Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'
);

insert into Scriptures
    (book, chapter, verse, content)
    VALUES (
        'Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'
);

insert into Scriptures
    (book, chapter, verse, content)
    VALUES (
        'Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.'
);
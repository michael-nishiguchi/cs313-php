CREATE TABLE users
(
    user_id SERIAL UNIQUE NOT NULL PRIMARY KEY,
    user_name varchar(255) UNIQUE NOT NULL,
    email varchar(255) UNIQUE NOT NULL
);

create TABLE category
(
    category_id SERIAL UNIQUE NOT NULL PRIMARY KEY,
    category_name varchar(255) UNIQUE NOT NULL,
    amount_budgeted float NOT NULL
);

create TABLE transactions
(
    transaction_id SERIAL UNIQUE NOT NULL PRIMARY KEY,
    transaction_date date NOT NULL,
    cost float NOT NULL,
    business_name varchar(255) NOT NULL,
    category_id int REFERENCES category (category_id)
);


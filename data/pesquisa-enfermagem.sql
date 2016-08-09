---------------------
-- D A T A B A S E --
---------------------

CREATE DATABASE pesquisa_enfermagem
WITH OWNER pgsql
TEMPLATE template0
ENCODING 'utf8'
CONNECTION LIMIT 100;

-----------------------
-- TIME ZONE --
-----------------------

SET TIME ZONE 'America/Sao_Paulo';

-----------------------
-- TABLES --
-----------------------

CREATE TABLE person(
    person_id SERIAL,
    full_name CHARACTER VARYING(70) NOT NULL,
    rg CHARACTER VARYING(11) UNIQUE NOT NULL,
    postalcode CHARACTER VARYING(8) NOT NULL,
    state CHARACTER VARYING(2) NOT NULL,
    city CHARACTER VARYING(70) NOT NULL,
    neighborhood CHARACTER VARYING(80) NOT NULL,
    streetname CHARACTER VARYING(120) NOT NULL,
    "number" CHARACTER VARYING(10) NOT NULL,
    complement CHARACTER VARYING(50),
    phone CHARACTER VARYING(20) NOT NULL,
    survey_success BOOLEAN NOT NULL DEFAULT FALSE,
    survey_success_at TIMESTAMP DEFAULT NULL,
    created_at TIMESTAMP NOT NULL,
    PRIMARY KEY(person_id)
);

CREATE TABLE "user"(
    user_id SERIAL,
    person_id INTEGER NULL,
    email CHARACTER VARYING(50) NOT NULL UNIQUE,
    password CHARACTER VARYING(64) NOT NULL,
    type CHARACTER VARYING(20) NOT NULL,
    tos BOOLEAN NOT NULL DEFAULT FALSE,
    last_login TIMESTAMP NOT NULL,
    active BOOLEAN NOT NULL DEFAULT TRUE,
    created_at TIMESTAMP NOT NULL,
    PRIMARY KEY(user_id),
    FOREIGN KEY(person_id) REFERENCES person(person_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE survey(
    survey_id SERIAL,
    type CHARACTER VARYING(64) NOT NULL,
    active BOOLEAN NOT NULL DEFAULT TRUE,
    PRIMARY KEY(survey_id)
);

CREATE TABLE person_has_survey_answer(
    person_has_survey_answer_id SERIAL,
    person_id INTEGER NOT NULL,
    survey_id INTEGER NOT NULL,
    question TEXT NOT NULL,
    answer TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL,
    PRIMARY KEY(person_has_survey_answer_id, person_id, survey_id),
    FOREIGN KEY(person_id) REFERENCES person(person_id),
    FOREIGN KEY(survey_id) REFERENCES survey(survey_id)
);

CREATE TABLE import_address(
	import_address_postalcode TEXT,
	import_address_ibge_code  TEXT,
	import_address_streetname TEXT,
	import_address_complement TEXT,
	import_address_neighborhood TEXT,
	import_address_state TEXT,
	import_address_city TEXT
);

BEGIN;
COPY import_address FROM '/tmp/import_address.csv' DELIMITER ',' CSV;
COMMIT;

-- -----------------------------------------------------
-- Tratamentos - Importação
-- -----------------------------------------------------

-- Tratamento para remover todas as tuplas com cep vazio --
DELETE FROM import_address
WHERE import_address_postalcode IS NULL;

-- Tratamento para remover todas as tuplas com tamanho de cep diferente de 7 e 8 --
DELETE FROM import_address
WHERE length(import_address_postalcode) != '7'
AND length(import_address_postalcode) != '8';

-- Tratamento para deixar todas as tuplas de estado com 2 caracteres --
UPDATE import_address
SET import_address_state = SUBSTRING(import_address_state, 1, 2);

-- Tratamento para remover todos os caracteres em branco entre o nome da cidade e o seu apelido --
UPDATE import_address
SET import_address_city = trim(regexp_replace(import_address_city, '\s+', ' ', 'g'));

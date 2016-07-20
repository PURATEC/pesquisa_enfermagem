# insercao dos questionarios
INSERT INTO "survey" ( "active", "name", "survey_id") 
VALUES (TRUE, 'Instituições sem a disciplina ou conteúdo de história da enfermagem', 1);

INSERT INTO "survey" ( "active", "name", "survey_id") 
VALUES (TRUE, 'Instituições com a disciplina ou conteúdo de história da enfermagem', 2);

# questoes do questionario
# sem disciplina de historia da enfermagem
INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'radio',
    'A	disciplina ou conteúdo de História da Enfermagem já foi oferecido em períodos anteriores?', 
    'Não;Sim, o conteúdo era ministrado em Disciplina própria;Sim, o conteúdo era ministrado em Disciplina integrada a outros temas', 
    1, 
    1
);

INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'text',
    'Em que ano a disciplina ou conteúdo de História da Enfermagem deixou de ser oferecida como disciplina específica ou associada?', 
    NULL, 
    2, 
    1
);

INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'text',
    'Qual o motivo para a remoção da disciplina?', 
    NULL, 
    3, 
    1
);

# questoes do questionario
# com disciplina de historia da enfermagem
INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'text',
    'Qual a sua instituição?', 
    NULL, 
    4, 
    2
);

INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'text',
    'Qual a sua instituição?', 
    NULL, 
    5, 
    2
);

INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'text',
    'Nome e código da disciplina', 
    NULL, 
    6, 
    2
);

INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'radio',
    'O conteúdo de História da Enfermagem:', 
    'É oferecido em disciplina própria;É oferecido em disciplina integrada com outros conteúdos', 
    7, 
    2
);

INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'text',
    'Departamento ou setor responsável pelo conteúdo ou disciplina de História da Enfermagem:', 
    NULL, 
    8, 
    2
);

INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'text',
    'Ano de oferecimento conteúdo ou disciplina de História da Enfermagem no curso de graduação:', 
    NULL, 
    9, 
    2
);

INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'radio',
    'Período de oferecimento:', 
    '1º Semestre;2º Semestre;Anual', 
    10, 
    2
);

INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'text',
    'Carga horária total da Disciplina:', 
    NULL, 
    11, 
    2
);

INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'text',
    'Carga horária do conteúdo de História', 
    NULL, 
    12, 
    2
);

INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'text',
    'Como você percebe a importância do conteúdo ou da disciplina de História na Enfermagem da formação do enfermeiro?', 
    NULL, 
    13,
    2
);
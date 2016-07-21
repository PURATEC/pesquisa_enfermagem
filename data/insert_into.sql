INSERT INTO "person" ( "city", "complement", "created_at", "full_name", "neighborhood", "number", "person_id", "phone", "postalcode", "rg", "state", "streetname", "survey_success") 
VALUES ( 'Ribeirão Preto', '', TO_TIMESTAMP('21/07/16 14:20:00', 'mm/dd/yyyy hh24:mi.ss.ff'), 'Diego Garcia Sanchez', 'Jd. Presidente Dutra I', '3280', 1, '16982334073', '14060620', '487871509', 'SP', 'Japurá', false);


INSERT INTO "survey" ( "active", "name", "survey_id") 
VALUES (TRUE, 'Instituições sem a disciplina ou conteúdo de história da enfermagem', 1);

INSERT INTO "survey" ( "active", "name", "survey_id") 
VALUES (TRUE, 'Instituições com a disciplina ou conteúdo de história da enfermagem', 2);


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
    'Ano de contratação', 
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
    'select',
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
    'select',
    'Ano de oferecimento conteúdo ou disciplina de História da Enfermagem no curso de graduação:', 
    '1º Ano;2º Ano;3º Ano;4º Ano;5º Ano;', 
    9, 
    2
);
INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'select',
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
INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'text',
    'Encontra dificuldades para ministrar o conteúdo ou disciplina de História da Enfermagem?', 
    NULL, 
    14,
    2
);
INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'checkbox',
    'Quais estratégias metodológicas são utilizadas na disciplina?', 
    'aulas expositivas;aulas expositivas dialogadas;discussão de textos;seminários;encenação teatralviagem didática;análise de documentos;outras', 
    15,
    2
);
INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'checkbox',
    'Quais os métodos de avaliação do aluno?', 
    'participação em sala de aula;frequência;trabalhos individuais escritos;trabalhos em grupo escritos;apresentação de seminários;prova escrita;estudo dirigido;exercícios em sala de aula;outros', 
    16,
    2
);
INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'text',
    'Qual a bibliografia utilizada na disciplina? Favor colar as referências utilizadas nesse espaço.', 
    NULL,
    17,
    2
);
INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'select',
    'De 0 a 10, sendo zero, nenhuma importância e 10 muita importância, como você classifica a importância do conteúdo ou disciplina de História da Enfermagem no currículo de Enfermagem?', 
    '1;2;3;4;5;6;7;8;9;10',
    18,
    2
);
INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'select',
    'De 0 a 10, sendo zero, nenhuma importância e 10 muita importância, como você classifica a valorização dos estudantes para o conteúdo ou disciplina de História da Enfermagem no currículo de Enfermagem?', 
    '1;2;3;4;5;6;7;8;9;10',
    19,
    2
);
INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'select',
    'De 0 a 10, sendo 0, nenhuma importância e 10 muita importância, como você classifica a valorização que a sua instituição atribui ao conteúdo ou disciplina de História da Enfermagem no currículo de Enfermagem?', 
    '1;2;3;4;5;6;7;8;9;10',
    20,
    2
);
INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'select',
    'De 0 a 10, sendo 0, nenhum e 10 excelente, como você classifica seu domínio dos conhecimentos para ministrar o conteúdo ou disciplina de História da Enfermagem?', 
    '1;2;3;4;5;6;7;8;9;10',
    21,
    2
);
INSERT INTO "question" ( "active", "element_type", "label", "options", "question_id", "survey_id") 
VALUES (
    true, 
    'checkbox',
    'Como geralmente se dá a escolha do docente desse conteúdo ou disciplina de História da Enfermagem na sua instituição? Quais os critérios?', 
    'Currículo específico;Concurso específico para a disciplina;Processo Seletivo específico para a disciplina;Afinidade com o tema;Professor contratado com menor carga horária;Disponibilidade;Outros',
    22,
    2
);

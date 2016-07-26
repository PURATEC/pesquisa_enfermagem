INSERT INTO "person" ( "city", "complement", "created_at", "full_name", "neighborhood", "number", "person_id", "phone", "postalcode", "rg", "state", "streetname", "survey_success") 
VALUES ( 'Ribeirão Preto', '', TO_TIMESTAMP('21/07/16 14:20:00', 'mm/dd/yyyy hh24:mi.ss.ff'), 'Diego Garcia Sanchez', 'Jd. Presidente Dutra I', '3280', 1, '16982334073', '14060620', '487871509', 'SP', 'Japurá', false);


INSERT INTO "survey" ( "active", "name", "survey_id") 
VALUES (TRUE, 'Instituições sem a disciplina ou conteúdo de história da enfermagem', 1);

INSERT INTO "survey" ( "active", "name", "survey_id") 
VALUES (TRUE, 'Instituições com a disciplina ou conteúdo de história da enfermagem', 2);


INSERT INTO "question" ("element_type", "label", "options", "survey_id", "question_id")  
VALUES (
    'radio',
    'A	disciplina ou conteúdo de História da Enfermagem já foi oferecido em períodos anteriores?', 
    'Não;Sim, o conteúdo era ministrado em Disciplina própria;Sim, o conteúdo era ministrado em Disciplina integrada a outros temas', 
    1,1
);
INSERT INTO "question" ("placeholder", "element_type", "label", "survey_id", "question_id")
VALUES (
    'Ex: 2005',
    'text',
    'Em que ano a disciplina ou conteúdo de História da Enfermagem deixou de ser oferecida como disciplina específica ou associada?',  
    1,2
);
INSERT INTO "question" ("placeholder", "element_type", "label", "survey_id", "question_id")
VALUES (
    'Coloque aqui o motivo da remoção da disciplina',
    'textarea',
    'Qual o motivo para a remoção da disciplina?', 
    1,3
);







INSERT INTO "question" ("size", "placeholder", "element_type", "label", "survey_id", "question_id")
VALUES (
    5,
    'Ex: Instituição exemplo',
    'text',
    'Qual a sua instituição?', 
    2,4
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label", "question_id", "question_option_id")
VALUES (
    2,
    'Ex: 2016',
    'text',
    'Ano de contratação: ',
    4,1 
);
INSERT INTO "question" ("size", "element_type", "label", "options",  "survey_id", "question_id")
VALUES (
    5,
    'select',
    'O conteúdo de História da Enfermagem:', 
    'É oferecido em disciplina própria;É oferecido em disciplina integrada com outros conteúdos',
    2,5
);
INSERT INTO "question" ("size", "placeholder", "element_type", "label", "survey_id", question_id)  
VALUES (
    7,
    'Ex: História da Enfermagem - HE005',
    'text',
    'Nome e código da disciplina', 
    2,6
);
INSERT INTO "question" ("size", "placeholder", "element_type", "label", "survey_id", "question_id")  
VALUES (
    12,
    'Ex: Departamento exemplo',
    'text',
    'Departamento ou setor responsável pelo conteúdo ou disciplina de História da Enfermagem:', 
    2,7
);
INSERT INTO "question" ("size", "element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    9,
    'select',
    'Ano de oferecimento conteúdo ou disciplina de História da Enfermagem no curso de graduação:', 
    '1º Ano;2º Ano;3º Ano;4º Ano;5º Ano', 
    2,8
);
INSERT INTO "question_option" ("size", "element_type", "label", "options",  "question_id", "question_option_id")
VALUES (
    3,
    'select',
    'Período de oferecimento:', 
    '1º Semestre;2º Semestre;Anual', 
    8,2
);
INSERT INTO "question" ("size", "placeholder", "element_type", "label", "survey_id", "question_id")  
VALUES (
    4,
    'Ex: 120 horas',
    'text',
    'Carga horária total da Disciplina:', 
    2,9
);
INSERT INTO "question" ("size", "placeholder", "element_type", "label", "survey_id", "question_id") 
VALUES (
    4,
    'Ex: 120 horas',
    'text',
    'Carga horária do conteúdo de História', 
    2,10
);
INSERT INTO "question" ("size", "placeholder", "element_type", "label", "survey_id", "question_id")  
VALUES (
    12, 
    'Ex: Percebo que...',
    'textarea',
    'Como você percebe a importância do conteúdo ou da disciplina de História na Enfermagem da formação do enfermeiro?', 
    2,11
);
INSERT INTO "question" ("size", "element_type", "label", "options",  "survey_id", "question_id")   
VALUES (
    12,
    'select',
    'Encontra dificuldades para ministrar o conteúdo ou disciplina de História da Enfermagem?', 
    'Não;Sim, quais?',
    2,12
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "question_id", "question_option_id")
VALUES (
    12,
    'Cite aqui as dificuldades...',
    'textarea',
    12,3
);
INSERT INTO "question" ("size", "element_type", "label", "options",  "survey_id", "question_id")   
VALUES (
    12,
    'checkbox',
    'Quais estratégias metodológicas são utilizadas na disciplina?',
    'aulas expositivas;aulas expositivas dialogadas;discussão de textos;seminários;encenação teatralviagem didática;análise de documentos;outras', 
    2,13
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "question_id", "question_option_id")
VALUES (
    12,
    'Caso haja outras estratégias, descreva aqui',
    'textarea',
    13,4
);
INSERT INTO "question" ("size", "element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    12,
    'checkbox',
    'Quais os métodos de avaliação do aluno?', 
    'participação em sala de aula;frequência;trabalhos individuais escritos;trabalhos em grupo escritos;apresentação de seminários;prova escrita;estudo dirigido;exercícios em sala de aula;outros', 
    2,14
);
INSERT INTO "question_option" ("placeholder", "element_type", "question_id", "question_option_id")
VALUES (
    'Caso haja outros métodos, descreva aqui',
    'textarea',
    14,5
);
INSERT INTO "question" ("element_type", "label",  "survey_id", "question_id")   
VALUES (
    'textarea',
    'Qual a bibliografia utilizada na disciplina? Favor colar as referências utilizadas nesse espaço.', 
    2,15
);

INSERT INTO "question" ("size", "element_type", "label", "survey_id", "question_id")
VALUES (
    3,
    'slider',
    'De 0 a 10, sendo zero, nenhuma importância e 10 muita importância, como você classifica a importância do conteúdo ou disciplina de História da Enfermagem no currículo de Enfermagem?', 
    2,16
);
INSERT INTO "question" ("size", "element_type", "label", "survey_id", "question_id")
VALUES (
    3, 
    'slider',
    'De 0 a 10, sendo zero, nenhuma importância e 10 muita importância, como você classifica a valorização dos estudantes para o conteúdo ou disciplina de História da Enfermagem no currículo de Enfermagem?', 
    2,17
);
INSERT INTO "question" ("size", "element_type", "label", "survey_id", "question_id")
VALUES (
    3,
    'slider',
    'De 0 a 10, sendo 0, nenhuma importância e 10 muita importância, como você classifica a valorização que a sua instituição atribui ao conteúdo ou disciplina de História da Enfermagem no currículo de Enfermagem?', 
    2,18
);
INSERT INTO "question" ("size", "element_type", "label", "survey_id", "question_id")
VALUES (
    3,
    'slider',
    'De 0 a 10, sendo 0, nenhum e 10 excelente, como você classifica seu domínio dos conhecimentos para ministrar o conteúdo ou disciplina de História da Enfermagem?', 
    2,19
);
INSERT INTO "question" ("element_type", "label", "options", "survey_id", "question_id")  
VALUES (
    'checkbox',
    'Como geralmente se dá a escolha do docente desse conteúdo ou disciplina de História da Enfermagem na sua instituição? Quais os critérios?', 
    'Currículo específico;Concurso específico para a disciplina;Processo Seletivo específico para a disciplina;Afinidade com o tema;Professor contratado com menor carga horária;Disponibilidade;Outros',
    2,20
);
INSERT INTO "question_option" ("placeholder", "element_type", "question_id", "question_option_id")
VALUES (
    'Caso haja outros critérios, descreva aqui',
    'textarea',
    20,6
);





INSERT INTO "question" ("size", "element_type", "label", "options",  "survey_id", "question_id")
VALUES (
    3,
    'select',
    'Gênero:', 
    'Masculino;Femino',
    2,21
);
INSERT INTO "question" ("size", "placeholder", "element_type", "label", "survey_id", "question_id")
VALUES (
    2, 
    'Ex: 30 anos',
    'text',
    'Idade:', 
    2,22
);
INSERT INTO "question" ("size", "element_type", "label", "options",  "survey_id", "question_id") 
VALUES (
    10,
    'select',
    'Qual sua formação inicial?', 
    'Bacharel em Enfermagem;Bacharel e Licenciado em Enfermagem; Bacharel ou Licencitura em História;Outro',
    2,23
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label", "question_id", "question_option_id")
VALUES (
    2,
    'Ex: 1997',
    'text',
    'Ano de conclusão: ',
    23,7
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label", "question_id", "question_option_id")
VALUES (
    8,
    'Ex: Bacharel e Licenciado em Enfermagem',
    'textarea',
    'Caso seja outro, qual?',
    23,8
);
INSERT INTO "question" ("size", "element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    10,
    'select',
    'Possui outro curso de graduação?', 
    'Não;Sim',
    2,24
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label", "question_id", "question_option_id")
VALUES (
    2,
    'Ex: 1997',
    'text',
    'Ano de conclusão: ',
    24,9
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label",  "question_id", "question_option_id")
VALUES (
    8,
    'Ex: Bacharel e Licenciado em Enfermagem',
    'text',
    'Caso tenha, qual? ',
    24,10
);
INSERT INTO "question_option" ("size", "element_type", "label", "options",  "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Andamento do curso: ',
    'Concluído;Em andamento',
    24,11
);

INSERT INTO "question" ("size", "element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    10,
    'select',
    'Possui curso de especialização?', 
    'Não;Sim',
    2,25
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label", "question_id", "question_option_id")
VALUES (
    2,
    'Ex: 1997',
    'text',
    'Ano de conclusão: ',
    25,12
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label",  "question_id", "question_option_id")
VALUES (
    8,
    'Ex: Especialização em Enfermagem',
    'text',
    'Caso tenha, qual? ',
    25,13
);
INSERT INTO "question_option" ("size", "element_type", "label", "options",  "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Andamento do curso: ',
    'Concluído;Em andamento',
    25,14
);
INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    'checkbox',
    'Possui Pós-graduação Stricto Sensu?', 
    'Mestrado;Doutorado;Pós Doutorado',
    2,26
);
INSERT INTO "question" ("size", "element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    8,
    'select',
    'Há quanto tempo é responsável pela disciplina ou conteúdo de História da Enfermagem?', 
    'Menos de 1 ano;De 1 à 3 anos;De 4 à 6 anos;De 7 à 9 anos;Mais de 10 anos',
    2,27
);
INSERT INTO "question" ("size", "placeholder", "element_type", "label",  "survey_id", "question_id") 
VALUES (
    8, 
    'Ex: 40 horas',
    'text',
    'Qual a sua carga horária semanal média nessa instituição de ensino?', 
    2,28
);
INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    'select',
    'Possui outro vinculo empregatício?', 
    'Não;Sim',
    2,29
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label",  "question_id", "question_option_id")
VALUES (
    5,
    'Ex: Nome da instituição - Sigla',
    'text',
    'Nome da instituição: ',
    29,15
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label",  "question_id", "question_option_id")
VALUES (
    4,
    'Ex: Professor',
    'text',
    'Função: ',
    29,16
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label",  "question_id", "question_option_id")
VALUES (
    3,
    'Ex: 40 horas',
    'text',
    'Carga horária média semanal: ',
    29,17
);
INSERT INTO "question" ("element_type", "label", "survey_id", "question_id")  
VALUES (
    'empty',
    'Idiomas', 
    2,30
);
INSERT INTO "question_option" ("size", "element_type", "label", "options",  "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Ingles: ',
    'Sem conhecimento;Básico ou Regular;Avançado;Fluente',
    30,18
);
INSERT INTO "question_option" ("size", "element_type", "label", "options",  "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Espanhol: ',
    'Sem conhecimento;Básico ou Regular;Avançado;Fluente',
    30,19
);
INSERT INTO "question_option" ("size", "element_type", "label",  "question_id", "question_option_id")
VALUES (
    4,
    'text',
    'Outros: ',
    30,20
);
INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    'select',
    'Você é responsável por outras disciplinas?', 
    'Não;Sim',
    2,31
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label",  "question_id", "question_option_id")
VALUES (
    5,
    'Ex: Nome da disciplina',
    'text',
    'Nome da disciplina: ',
    31,21
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label",  "question_id", "question_option_id")
VALUES (
    3,
    'Ex: 40 horas',
    'text',
    'Carga horária média semanal: ',
    31,22
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label",  "question_id", "question_option_id")
VALUES (
    4,
    'Ex: Enfermagem psiquiátrica, pediátrica, obstétrica, de saúde pública',
    'text',
    'Área de conhecimento: ',
    31,23
);
INSERT INTO "question_option" ("size", "element_type", "label",  "question_id", "question_option_id")
VALUES (
    8,
    'textarea',
    'Outras? Quais? ',
    31,24
);
INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    'select',
    'Participa de algum grupo de pesquisa?', 
    'Não;Sim',
    2,32
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    5,
    'select',
    'Área ',
    'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de DOenças Contagiosas;Enfermagem de Saúde Pública',
    32,25
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    3,
    'select',
    'Função: ',
    'Participante;Líder;Vice-líder',
    32,26
);


INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")
VALUES (
    'select',
    'Atua em alguma linha ou linhas de pesquisa?', 
    'Não;Sim',
    2,33
);
INSERT INTO "question_option" ("size", "element_type", "label", "question_id", "question_option_id")
VALUES (
    8,
    'textarea',
    'Especifique quais: ',
    33,27
);
INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    'select',
    'Participa de projetos de pesquisa?', 
    'Não;Sim',
    2,34
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Área ',
    'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de DOenças Contagiosas;Enfermagem de Saúde Pública',
    34,28
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade de projetos em andamento: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    34,29
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade de projetos concluídos: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    34,30
);
INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    'select',
    'Atua em algum projeto de extensão?', 
    'Não;Sim',
    2,35
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Área ',
    'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de DOenças Contagiosas;Enfermagem de Saúde Pública',
    35,31
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade de projetos em andamento: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    35,32
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade de projetos concluídos: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    35,33
);

INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    'select',
    'Produziu artigos completos publicados em periódicos na área de História da Enfermagem?',
    'Não;Sim',
    2,36
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    8,
    'select',
    'Revista: ',
    'Nenhuma;Revista Latino Americana de Enfermagem;Revista de Escola de Enfermagem da USP;Acta Paulista de Enfermagem;Revista Brasileira de Enfermagem;Revista Texto e Contexto;Revista Escola de Enfermagem Anna Nery;Revista Gaúcha de Enfermagem;Revista Reuol;Revista Mineira de Enfermagem REME;Revista Escola de Enfermagem da UERJ;História da Enfermagem - Revista Eletrônica (HERE)',
    36,34
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label", "question_id", "question_option_id")
VALUES (
    4,
    'Ex: 4',
    'text',
    'Total de artigos: ',
    36,35
);
INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    'select',
    'Produziu artigos completos publicados em periódicos em outras áreas da Enfermagem?',
    'Não;Sim',
    2,37
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    8,
    'select',
    'Revista: ',
    'Nenhuma;Revista Latino Americana de Enfermagem;Revista de Escola de Enfermagem da USP;Acta Paulista de Enfermagem;Revista Brasileira de Enfermagem;Revista Texto e Contexto;Revista Escola de Enfermagem Anna Nery;Revista Gaúcha de Enfermagem;Revista Reuol;Revista Mineira de Enfermagem REME;Revista Escola de Enfermagem da UERJ;História da Enfermagem - Revista Eletrônica (HERE)',
    37,36
);
INSERT INTO "question_option" ("size", "placeholder", "element_type", "label", "question_id", "question_option_id")
VALUES (
    4,
    'Ex: 4',
    'text',
    'Total de artigos: ',
    37,37
);

INSERT INTO "question" ("element_type", "label",  "survey_id", "question_id")  
VALUES (
    'empty',
    'Produziu livros',
    2,38
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Área ',
    'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de DOenças Contagiosas;Enfermagem de Saúde Pública',
    38,38
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    38,39
);

INSERT INTO "question" ("element_type", "label",  "survey_id", "question_id")  
VALUES (
    'empty',
    'Produziu capítulos de livros',
    2,39
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Área ',
    'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de DOenças Contagiosas;Enfermagem de Saúde Pública',
    39,40
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    39,41
);

INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    'select',
    'Participação em congressos ou eventos de porte nacional/regional?',
    'Não;Sim',
    2,40
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Área ',
    'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de DOenças Contagiosas;Enfermagem de Saúde Pública',
    40,42
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    40,43
);

INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    'select',
    'Possui orientação de alunos de mestrado?',
    'Não;Sim',
    2,41
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Área ',
    'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de DOenças Contagiosas;Enfermagem de Saúde Pública',
    41,44
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade de alunos em andamento: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    41,45
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade de alunos com defesa concluídos: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    41,
);

INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    'select',
    'Possui orientação de alunos de doutorado?',
    'Não;Sim',
    2,42
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Área ',
    'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de DOenças Contagiosas;Enfermagem de Saúde Pública',
    42,47
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade de alunos em andamento: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    42,48
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade de alunos com defesa concluídos: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    42,49
);

INSERT INTO "question" ("element_type", "label", "options",  "survey_id", "question_id")  
VALUES (
    'select',
    'Possui orientação em Trabalho de Conclusão de Curso ou Iniciação científica?',
    'Não;Sim',
    2,43
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Área ',
    'História da Enfermagem;Enfermagem Médico-Cirúrgica;Enfermagem Obstétrica;Enfermagem Pediátrica;Enfermagem Psiquiátrica;Enfermagem de DOenças Contagiosas;Enfermagem de Saúde Pública',
    43,50
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade de alunos em andamento: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    43,51
);
INSERT INTO "question_option" ("size", "element_type", "label", "options", "question_id", "question_option_id")
VALUES (
    4,
    'select',
    'Quantidade de alunos com defesa concluídos: ',
    '0;1;2;3;4;5;6;7;8;9;10;Mais de 10',
    43,52
);

INSERT INTO "question" ("element_type", "label",  "survey_id", "question_id")   
VALUES (
    'textarea',
    'O programa da disciplina de História da Enfermagem ou de seu conteúdo está de acordo com o que é ministrado em sala de aula? Ou atualizado?',
    2,44
);
INSERT INTO "question" ("element_type", "label",  "survey_id", "question_id")   
VALUES (
    'textarea',
    'Existe alguma atividade da disciplina de História da Enfermagem ou de seu conteúdo, que ainda não consta no programa da disciplina ou de sua bibliografia?',
    2,45
);
INSERT INTO "question" ("element_type", "label",  "survey_id", "question_id")   
VALUES (
    'textarea',
    'Por favor, Anexar arquivo ou colar texto do programa da disciplina de História da Enfermagem ou disciplina que trabalha o conteúdo de História da Enfermagem, ou link para site institucional com programa.',
    2,46
);
INSERT INTO "question" ("element_type", "label",  "survey_id", "question_id")   
VALUES (
    'textarea',
    'Por favor, Anexar arquivo ou colar texto com rede/grade curricular, do curso de Enfermagem com respectivas cargas horárias, ou link para site institucional com currículo.',
    2,47
);
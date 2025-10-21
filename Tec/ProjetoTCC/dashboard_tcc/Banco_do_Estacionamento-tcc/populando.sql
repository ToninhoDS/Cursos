insert into tb_bike_outros values
('1','bike', 'cor rosa', 'ALAN',NULL),
('2','patins', 'esta sem roda','CARLOS',NULL),
('3','chinelo', 'com prego','LORENA',NULL),
('4','pop', 'pneu careca','MAIKEN','Roubada');


insert into tb_uf_empresa values
('1','MT'),
('2','DF'),
('3','SE'),
('4','AM'),
('5','SP'),
('6','AC');

insert into tb_cidade_empresa values
('1', 'Rondonópolis', '1'),
('2', 'Brasília', '2'),
('3', 'Aracaju', '3'),
('4', 'Manaus', '4'),
('5', 'Sertãozinho', '5'),
('6', 'Rio Branco', '6');


insert into tb_bairro_empresa values
('1', 'Jardim Brasília', '1'),
('2', 'Riacho Fundo II', '2'),
('3', 'Aeroporto', '3'),
('4', 'Novo Aleixo', '4'),
('5', 'Conjunto Habitacional Antônio Pedro Ortolan', '5'),
('6', 'Loteamento Joafra', '6');

insert into tb_gerente value
('1','Denisse','Gerente','Atuante no mercado','Compromisso'
,'30','Denissegerente@vagaspark.com','123456','13981603708','bernardo.png','1'),
('2','Luciano','Gerente','Atuante no mercado','Compromisso'
,'32','Denissegerente@vagaspark.com','123456','13981603708','antonio-mayda.png','2'),
('3','Anderson','Gerente','Atuante no mercado','Compromisso'
,'33','Denissegerente@vagaspark.com','123456','13981603708','screenshot-1.png','3');

insert into tb_funcionario value
('1','Antonio carlos','Tec. Manutencao Informatica Junior','Ensino Completo','2023-04-22','Masculino',
'Elisete dos Santos','Casado','1988-03-05','30','12345678901','996665558','30039','Antoniogerente@vagaspark.com','123456','13981603708','screenshot-14.png','1','1'),

('2','Carlos Fafa','Tec. Manutencao Informatica Junior','Ensino Completo','2023-04-22','Masculino',
'Elisete dos Santos','Casado','1988-03-05','30','12345678901','996665558','30039','Antoniogerente@vagaspark.com','123456','13981603708','screenshot-2.png','1','1'),
('3','Renato','Tec. Manutencao Informatica Junior','Ensino Completo','2023-04-22','Masculino',
'Elisete dos Santos','Casado','1988-03-05','30','12345678901','996665558','30039','Antoniogerente@vagaspark.com','123456','13981603708','feedback-do-cliente.png'
,'1','2'),
('4','Douglas','Tec. Manutencao Informatica Junior','Ensino Completo','2023-04-22','Masculino',
'Elisete dos Santos','Casado','1988-03-05','30','12345678901','996665558','30039','Antoniogerente@vagaspark.com','123456','13981603708','screenshot-2.png.png'
,'1','2'),
('5','Julia','Tec. Manutencao Informatica Junior','Ensino Completo','2023-04-22','Masculino',
'Elisete dos Santos','Casado','1988-03-05','30','12345678901','996665558','30039','Antoniogerente@vagaspark.com','123456','13981603708','feedback-do-cliente.png'
,'1','2'),
('6','RAfael','Tec. Manutencao Informatica Junior','Ensino Completo','2023-04-22','Masculino',
'Elisete dos Santos','Casado','1988-03-05','30','12345678901','996665558','30039','Antoniogerente@vagaspark.com','123456','13981603708','screenshot-2.png.png'
,'1','3');

insert into tb_status_vagas  (cd_status_vagas, cd_numero_vaga, nm_nome, img_icon, dt_entrada, sg_placa, cd_cpf, nm_status) values
('1','1','Antonio','Carro','19:03','ANS-3908','136.230.852-86','Ocupado'),
('2','2','Enzxo Farinhado','Moto','19:03','NEJ-8313','558.882.025-84','Ocupado'),
('3','3','kaike','Patins','18:03','AOM-2970','067.846.794-31','Livre'),
('4','4','Carlos','Outros','14:03','KPF-4778','333.564.700-94','Reserva'), 
('5','5','Tonico','Bicicleta','1:03','NEW-3182','743.721.422-93','Reserva'),
('6','6','Rayra hasuhsuh','Outros','1:03','HZO-2490','006.248.620-97','Ocupado'), 
('7','7','','Livre','','MUV-1609','399.443.846-23','Livre'),
('8','8','Antonio','Carro','19:03','MOU-6604','559.186.550-00','Ocupado'), 
('9','9','Enzxo Farinhado','Moto','19:03','MQY-3954','187.233.440-75','ocupado'), 
('10','10','kaike','Patins','18:03','KET-8904','448.196.880-06','Livre'), 
('11','11','Carlos','Outros','14:03','DNO-2637','991.851.233-40','Reserva'),
('12','12','Tonico','Bicicleta','1:03','HPI-7589','300.831.410-49','Reserva'), 
('13','13','Rayra hasuhsuh','Outros','1:03','MZX-0024','567.596.008-27','ocupado'),
('14','14','Antonio','Carro','19:03','HZM-8017','031.574.345-00','Ocupado'),
('15','15','Enzxo Farinhado','Moto','19:03','JTC-3907','248.969.750-14','ocupado'),
('16','16','kaike','Patins','18:03','NAE-7471','859.364.540-29','Livre'), 
('17','17','Carlos','Outros','14:03','CON-1661','357.235.070-01','Reserva'), 
('18','18','Tonico','Bicicleta','1:03','IEW-8686','226.615.300-53','Reserva'), 
('19','19','Rayra hasuhsuh','Outros','1:03','ENB-0247','049.161.186-26','ocupado'),
('20','20','','Livre','','HZZ-4802','652.159.799-01','Livre');

-- fim @@@@@@@@@@@@@@@@@@@@

insert into tb_login values
('1','julio-pereira88@simoesmendonca.adv.br', 'HA0bRoSHGs'),
('2','francisco_bernardes@petrobrais.com.br', 'tpRjDeDiSI'),
('3','rebeca_silveira@wwlimpador.com.br', '66kt9COrDu'),
('4','enrico_martins@live.com.pt', 'EMOXEdB81Y'),
('5','laviniamarciarocha@pisbrasil.com.br', 'eBkzc3zruE'),
('6','eliane_jennifer_dacruz@damha.com.br', 'XIXaXAdkgx'),
('7','elisa_malu_rodrigues@moyageorges.com.br', 'B9ifWchxsJ'),
('8','henriqueerickmelo@wredenborg.se', 'dw4d4uicW3'),
('9','giovanni_darosa@kof.com.mx', 'hGKoIJAPcI'),
('10','rebeca_agatha_viana@tanby.com.br', '7wqU0tHtEu'),
('11','raimunda-aparicio70@qmagico.com.br', 'fL58W9J7Yi'),
('12','mirellavanessadacosta@live.se', 'bLzkcIiz8l'),
('13','noahjuliocortereal@santander.com.br', 'tk5cQaf89N'),
('14','larissa-campos96@genesyslab.com', 'AdsBFGGGT2'),
('15','marcio.henry.ribeiro@oi15.com.br', 'TOOaG6ZrGa'),
('16','ruan_dasilva@stembalagens.com.br', 'Cz3Jt7lWTq'),
('17','vanessa-lima80@2014fwcao.com', 'j4G4p7PckW'),
('18','lavinia.andreia.almada@yahoo.com.br', 'r2BiF1Im9D'),
('19','leandro_emanuel_peixoto@piemme.com.br', 'ZXmAHxBKF3'),
('20','emanuelly_sara_barbosa@tanet.com.br', 'hYYjbWOOcf');
 
 
 insert into tb_cliente values
('1', 'julio-pereira88@simoesmendonca.adv.br', 'HA0bRoSHGs', '1', 'Julio Thiago Pereira'),
('2', 'francisco_bernardes@petrobrais.com.br', 'tpRjDeDiSI', '2',  'Francisco Caleb Vitor Bernardes'),
('3', 'rebeca_silveira@wwlimpador.com.br', '66kt9COrDu', '3',  'Rebeca Sophie Silveira'),
('4', 'enrico_martins@live.com.pt', 'EMOXEdB81Y', '4',  'Enrico Bento Tiago Martins'),
('5', 'laviniamarciarocha@pisbrasil.com.br', 'eBkzc3zruE', '5',  'Lavínia Márcia Rocha'),
('6', 'eliane_jennifer_dacruz@damha.com.br', 'XIXaXAdkgx', '6',  'Eliane Jennifer da Cruz'),
('7', 'elisa_malu_rodrigues@moyageorges.com.br', 'B9ifWchxsJ', '7',  'Elisa Malu Nair Rodrigues'),
('8', 'henriqueerickmelo@wredenborg.se', 'dw4d4uicW3', '8',  'Henrique Erick Melo'),
('9', 'giovanni_darosa@kof.com.mx', 'hGKoIJAPcI', '9',  'Giovanni Antonio Luís da Rosa'),
('10', 'rebeca_agatha_viana@tanby.com.br', '7wqU0tHtEu', '10',  'Rebeca Agatha Viana'),
('11', 'raimunda-aparicio70@qmagico.com.br', 'fL58W9J7Yi', '11',  'Raimunda Analu Aparício'),
('12', 'mirellavanessadacosta@live.se', 'bLzkcIiz8l', '12',  'Mirella Vanessa Alessandra da Costa'),
('13', 'noahjuliocortereal@santander.com.br', 'tk5cQaf89N', '13',  'Noah Julio Thomas Corte Real'),
('14', 'larissa-campos96@genesyslab.com', 'AdsBFGGGT2', '14',  'Larissa Marlene Josefa Campos'),
('15', 'marcio.henry.ribeiro@oi15.com.br', 'TOOaG6ZrGa', '15',  'Márcio Henry Ruan Ribeiro'),
('16', 'ruan_dasilva@stembalagens.com.br', 'Cz3Jt7lWTq', '16',  'Ruan Murilo da Silva"'),
('17', 'vanessa-lima80@2014fwcao.com', 'j4G4p7PckW', '17',  'Vanessa Luna Lima'),
('18', 'lavinia.andreia.almada@yahoo.com.br', 'r2BiF1Im9D', '18',  'Lavínia Andreia Almada'),
('19', 'leandro_emanuel_peixoto@piemme.com.br', 'ZXmAHxBKF3', '19',  'Leandro Emanuel Cláudio Peixoto'),
('20', 'emanuelly_sara_barbosa@tanet.com.br', 'hYYjbWOOcf', '20',  'Emanuelly Sara Tânia Barbosa');


-- 3

insert into tb_uf values
('1','MT'),
('2','DF'),
('3','SE'),
('4','AM'),
('5','SP'),
('6','AC'),
('7','PI'),
('8','MS'),
('9','PA'),
('10','DF'),
('11','PE'),
('12','PR'),
('13','PB'),
('14','RO'),
('15','RR'),
('16','PA'),
('17','MG'),
('18','PR'),
('19','SP'),
('20','SP');


-- 4

insert into tb_cidade values
('1', 'Rondonópolis', '1'),
('2', 'Brasília', '2'),
('3', 'Aracaju', '3'),
('4', 'Manaus', '4'),
('5', 'Sertãozinho', '5'),
('6', 'Rio Branco', '6'),
('7', 'Parnaíba', '7'),
('8', 'Campo Grande', '8'),
('9', 'Belém', '9'),
('10', 'Brasília', '10'),
('11', 'Jaboatão dos Guararapes', '11'),
('12', 'Ponta Grossa', '12'),
('13', 'João Pessoa', '13'),
('14', 'Cacoal', '14'),
('15', 'Boa Vista', '15'),
('16', 'Belém', '16'),
('17', 'Barbacena', '17'),
('18', 'Curitiba', '18'),
('19', 'Araraquara', '19'),
('20', 'Guarulhos', '20');

-- 5

insert into tb_bairro values
('1', 'Jardim Brasília', '1'),
('2', 'Riacho Fundo II', '2'),
('3', 'Aeroporto', '3'),
('4', 'Novo Aleixo', '4'),
('5', 'Conjunto Habitacional Antônio Pedro Ortolan', '5'),
('6', 'Loteamento Joafra', '6'),
('7', 'João XXIII', '7'),
('8', 'Jardim São Conrado', '8'),
('9', 'Tapanã (Icoaraci)', '9'),
('10', 'Setor Sul (Gama)', '10'),
('11', 'Santo Aleixo', '11'),
('12', 'Colônia Dona Luíza', '12'),
('13', 'Mandacaru', '13'),
('14', 'Village do Sol', '14'),
('15', 'Jardim Floresta', '15'),
('16', 'Jurunas', '16'),
('17', 'Nossa Senhora Aparecida', '17'),
('18', 'Alto da Rua XV', '18'),
('19', 'Vila Xavier (Vila Xavier)', '19'),
('20', 'Cidade Seródio', '20');

 -- 6

insert into tb_cor values
('1','Branco'),
('2','Cinza'),
('3','Preto'),
('4','Prata'),
('5','Azul'),
('6','Vermelho'),
('7','Marrom/Bege'),
('8','Verde'),
('9','Amarelo'),
('10','Minions'),
('11','Branco'),
('12','Cinza'),
('13','Preto'),
('14','Prata'),
('15','Azul'),
('16','Vermelho'),
('17','Marrom/Bege'),
('18','Verde'),
('19','Amarelo'),
('20','Outros');

 
-- 7

insert into tb_marca values
('1','Fiat'),
('2','Volkswagen'),
('3','Bentley'),
('4','Hyundai'),
('5','Fiat'),
('6','Volkswagen'),
('7','Bentley'),
('8','Hyundai'),
('9','Fiat'),
('10','Volkswagen'),
('11','Bentley'),
('12','Hyundai'),
('13','Fiat'),
('14','Volkswagen'),
('15','Bentley'),
('16','Hyundai'),
('17','Fiat'),
('18','Volkswagen'),
('19','Bentley'),
('20','Chevrolet');


-- 8

insert into tb_modelo values
('1','Volkswagen Gol','1'),
('2','Fiat Strada','2'),
('3','Chevrolet Onix','3'),
('4','Hyundai HB20','4'),
('5','Volkswagen Gol','5'),
('6','Fiat Strada','6'),
('7','Chevrolet Onix','7'),
('8','Hyundai HB20','8'),
('9','Volkswagen Gol','9'),
('10','Fiat Strada','10'),
('11','Chevrolet Onix','11'),
('12','Hyundai HB20','12'),
('13','Volkswagen Gol','13'),
('14','Fiat Strada','14'),
('15','Chevrolet Onix','15'),
('16','Hyundai HB20','16'),
('17','Volkswagen Gol','17'),
('18','Fiat Strada','18'),
('19','Chevrolet Onix','19'),
('20','Chevrolet Onix Plus','20');

-- 9

insert into tb_horario values
('1','13:30','15:30'),
('2','12:00','13:00'),
('3','12:00','13:40'),
('4','12:00','12:30'),
('5','12:00','14:30'),
('6','11:00','12:00'),
('7','11:30','13:40'),
('8','12:30','15:30'),
('9','09:00','13:00'),
('10','11:40','12:00'),
('11','12:50','16:00'),
('12','13:30','20:00'),
('13','13:00','21:00'),
('14','08:00','18:00'),
('15','18:00','21:00'),
('16','18:30','19:00'),
('17','18:40','22:00'),
('18','18:00','23:00'),
('19','19:00','23:00'),
('20','19:30','22:00');


-- 10

insert into tb_patio values
('1','1'),
('2','2');


-- 11

insert into tb_veiculo values
('1','ANS-3908','1','1','1'),
('2','NEJ-8313','2','2','2'),
('3','AOM-2970','3','3','3'),
('4','KPF-4778','4','4','4'),
('5','NEW-3182','5','5','5'),
('6','HZO-2490','6','6','6'),
('7','MUV-1609','7','7','7'),
('8','MOU-6604','8','8','8'),
('9','MQY-3954','9','9','9'),
('10','KET-8904','10','10','10'),
('11','DNO-2637','11','2','11'),
('12','HPI-7589','12','5','12'),
('13','MZX-0024','13','9','13'),
('14','HZM-8017','14','7','14'),
('15','JTC-3907','15','8','15'),
('16','NAE-7471','16','6','16'),
('17','CON-1661','17','7','17'),
('18','IEW-8686','18','8','18'),
('19','ENB-0247','19','9','19'),
('20','HZZ-4802','20','2','20');


-- 12
insert into tb_estacionamento values
('1','Tonho Estacionamento','20220510','20220511','1','1'),
('2','Tonho Estacionamento','20220610','20220612','2','2'),
('3','Enzo Park','20220615','20220621','3','3'),
('4','Enzo Park','20220712','20220713','4','4'),
('5','Tonho Estacionamento','20220610','20220622','5','5'),
('6','Enzo Park','20220720','20220721','6','6'),
('7','Tonho Estacionamento','20220510','20220511','7','7'),
('8','Enzo Park','20220701','20220703','8','8'),
('9','Tonho Estacionamento','20220530','20220531','9','9'),
('10','Tonho Estacionamento','20220801','20220802','10','10'),
('11','Enzo Park','20220622','20220623','11','11'),
('12','Enzo Park','20220920','20220921','12','12'),
('13','Tonho Estacionamento','20220510','20220521','13','13'),
('14','Tonho Estacionamento','20220910','20220911','14','14'),
('15','Enzo Park','20220625','20220626','15','15'),
('16','Enzo Park','20220721','20220726','16','16'),
('17','Enzo Park','20220801','20220802','17','17'),
('18','Enzo Park','20220620','20220629','18','18'),
('19','Enzo Park','20220723','20220824','19','19'),
('20','Enzo Park','20220810','20220815','20','20');


-- 13

insert into tb_vaga values
('1','11','1','Em uso','1'),
('2','11','2', null,'2'),
('3','11','2','Em uso','3'),
('4','11','2','Em uso','4'),
('5','11','1', null,'5'),
('6','11','1','Em uso','6'),
('7','11','1','Em uso','7'),
('8','11','2','Em uso','8'),
('9','11','2','Em uso','9'),
('10','11','1', null,'10'),
('11','11','1','Em uso','11'),
('12','11','1','Em uso','12'),
('13','11','2', null,'13'),
('14','11','2','Em uso','14'),
('15','11','2','Em uso','15'),
('16','11','1','Em uso','16'),
('17','11','1', null,'17'),
('18','11','1','Em uso','18'),
('19','11','2','Em uso','19'),
('20','11','2','Em uso','20');


-- 14

insert into tb_pessoa_fisica values
('1', '136.230.852-86', '1', '1'),
('2', '558.882.025-84', '2', '2'),
('3', '067.846.794-31', '3', '3'),
('4', '333.564.700-94', '4', '4'),
('5','743.721.422-93', '5', '5'),
('6', '006.248.620-97', '6', '6'),
('7','399.443.846-23', '7', '7'),
('8', '559.186.550-00', '8', '8'),
('9', '187.233.440-75', '9', '9'),
('10', '448.196.880-06', '10', '10'),
('11','991.851.233-40', '11', '11'),
('12', '300.831.410-49', '12', '12'),
('13','567.596.008-27', '13', '13'),
('14','031.574.345-00', '14', '14'),
('15','248.969.750-14', '15', '15'),
('16', '859.364.540-29', '16', '16'),
('17', '357.235.070-01', '17', '17'),
('18', '226.615.300-53', '18', '18'),
('19','049.161.186-26', '19', '19'),
('20','652.159.799-01', '20', '20');

-- 15

insert into tb_pessoa_juridica values
('1', null,'1', '1'),
('2', null, '2', '2'),
('3', null, '3', '3'),
('4', '42.511.777/0001-60', '4', '4'),
('5', null, '5', '5'),
('6', '59.067.078/0001-76', '6', '6'),
('7', null, '7', '7'),
('8', '43.861.452/0001-70', '8', '8'),
('9', '37.962.613/0001-10', '9', '9'),
('10', '65.254.503/0001-39', '10', '10'),
('11', null, '11', '11'),
('12', '31.492.526/0001-60', '12', '12'),
('13', null, '13', '13'),
('14', null, '14', '14'),
('15', null, '15', '15'),
('16', '72.181.135/0001-01', '16', '16'),
('17', '36.062.069/0001-97', '17', '17'),
('18', '01.695.631/0001-35', '18', '18'),
('19', null, '19', '19'),
('20', null, '20', '20');

-- 16

insert into tb_telefone values
('1','(66) 99163-1531', null,'1'),
('2','(61) 98153-5596','(61) 3763-1803','2'),
('3','(79) 98421-1175','(79) 2914-8488','3'),
('4','(92) 98271-7282', null,'4'),
('5','(16) 99124-3887', null,'5'),
('6','(68) 99917-1591','(68) 2557-3140','6'),
('7','(86) 98133-6502', null,'7'),
('8','(67) 99200-4118', null,'8'),
('9','(91) 99787-5532', null,'9'),
('10','(61) 98421-5775','(61) 2905-4970','10'),
('11','(81) 98767-3939','(81) 2737-2601','11'),
('12','(42) 99649-3133', null,'12'),
('13','(83) 99772-7749', null,'13'),
('14','(69) 98671-7424','(69) 2809-1847','14'),
('15','(95) 98322-1696','(95) 2674-0425','15'),
('16','(91) 98458-0538','(91) 3919-0690','16'),
('17','(32) 98561-5622','(32) 3923-5321','17'),
('18','(41) 99549-8073', null,'18'),
('19','(16) 99195-9999', null,'19'),
('20','(11) 99214-9687', null,'20');
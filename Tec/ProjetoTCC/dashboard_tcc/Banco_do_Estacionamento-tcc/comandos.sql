-- PESQUISAR FUNCIONARIO POR GERENCIA 22/04/2023

select g.nm_gerente as 'Gerencia',f.cd_funcionario, f.nm_nome, f.nm_cargo, f.dt_emissao_contratual, f.nm_sexo, f.cd_data_nascimento  
from tb_gerente as g
JOIN tb_funcionario as f
on   f.cd_gerente = g.cd_gerente
where g.cd_gerente =1;

--pesquisa para abrir o modal

SELECT g.nm_gerente, f.cd_funcionario, f.nm_nome, f.nm_cargo, f.dt_emissao_contratual, f.nm_sexo, f.cd_data_nascimento, f.cd_cpf,
f.cd_credencial, f.cd_email_funcionario, f.cd_senha_funcionario, f.cd_telefone, f.img_imagem, b.cd_bairro, g.cd_gerente
    FROM tb_gerente as g
    JOIN tb_funcionario as f
    ON   f.cd_gerente = g.cd_gerente
    JOIN tb_bairro as b
    on f.cd_funcionario = b.cd_bairro
    WHERE g.cd_gerente = 1 ORDER BY f.cd_funcionario;
    --OU
    WHERE f.cd_credencial = '30039' ORDER BY f.cd_funcionario;

--30/04/2023
      ALTER TABLE tb_funcionario
    add nm_formacao varchar(100) null; -- acrescentar , nome_da_coluna int null;


    -- ALTERAR CONTEUDO DA TABELA COM ID 
    update tb_gerente
SET CD_IMG = 'bernardo.png'
WHERE CD_GERENTE = 1;

UPDATE tb_funcionario SET nm_nome='tonico'  WHERE cd_credencial='30039';
DELETE FROM tb_relatorio_atividade WHERE cd_relatorio_atividade >=191 ;


-- VIEW 1 --
 create view vw_login_senha
as select tb_cliente.nm_cliente as Cliente,tb_login.cd_email_login as Email,tb_login.cd_senha_login as Senha 
from tb_cliente
join tb_login
on tb_cliente.cd_login = tb_login.cd_login;

select * from 
vw_login_senha
order by Cliente;
-- FIM --

-- VIEW 2 -- 
create view vw_informacao_cliente
 as select c.nm_cliente as 'Cliente', ci.nm_cidade as 'Nome da cidade', t.cd_numero1 as 'Número 1', t.cd_numero2 as 'Número 2'
 from tb_cliente as c
 join tb_pessoa_fisica as pf
 on pf.cd_cliente = c.cd_cliente
 join tb_pessoa_juridica as pj
 on pj.cd_cliente = c.cd_cliente
 join tb_bairro as b
 on b.cd_bairro = pf.cd_bairro and pj.cd_bairro
 join  tb_cidade as ci
 on ci.cd_cidade = b.cd_cidade
 join tb_telefone as t
 on t.cd_cliente = c.cd_cliente;
 
 select * from 
 vw_informacao_cliente
order by Cliente;
-- FIM --

-- VIEW 3 --
create view vw_informacao_carro_cliente 
as select c.nm_cliente as 'Cliente' , mo.nm_modelo as 'Modelo', e.nm_estacionamento as 'Nome do Estacionamento'
from tb_cliente as c
join tb_veiculo as v
on v.cd_cliente = c.cd_cliente
join tb_modelo as mo
on mo.cd_modelo = v.cd_veiculo
join tb_estacionamento as e
on e.cd_veiculo = v.cd_veiculo;

select * from 
vw_informacao_carro_cliente
order by Cliente;
-- FIM --

-- VIEW 4 --
create view vw_informacao_fluxo_cliente
as select c.nm_cliente as 'Cliente', hr.hr_entrada as 'Horário entrada', hr.hr_saida as 'Horário saída'
from tb_horario as hr
join tb_estacionamento as e
on e.cd_horario = hr.cd_horario
join tb_veiculo as v
on v.cd_veiculo = e.cd_veiculo
join tb_cliente as c
on c.cd_cliente = v.cd_cliente;

select * from 
vw_informacao_fluxo_cliente
order by Cliente;
-- FIM --

-- VIEW 5 --
create view vw_informacao_veiculo_cliente
as select c.nm_cliente as 'Cliente', mo.nm_modelo as 'Modelo', ma.nm_marca 'Marca', co.nm_cor as 'Cor do veiculo', v.cd_placa as'Placa do veiculo' 
from tb_cliente as c
join tb_veiculo as v
on v.cd_cliente = c.cd_cliente
join tb_modelo as mo
on mo.cd_modelo = v.cd_modelo
join tb_marca as ma
on ma.cd_marca = mo.cd_marca
join tb_cor as co
on v.cd_cor = co.cd_cor;

select * from 
vw_informacao_veiculo_cliente
order by Cliente;
-- FIM --

-- VIEW 6 --
create view vw_quantidade_cliente
as select count(nm_cliente) as 'Total Clientes', count(cd_cpf) as 'Pessoa Fisica', count(cd_cnpj) as 'Pessoa Jurídica'
from tb_cliente as c
join tb_pessoa_fisica as pf
on pf.cd_cliente =  c.cd_cliente
join tb_pessoa_juridica as pj
on pj.cd_cliente = c.cd_cliente;

select * from 
vw_quantidade_cliente;
-- FIM --

-- VIEW 7 --
create view vw_cliente_sul
as select nm_cliente as 'Cliente', sg_uf as 'Estado'
from tb_pessoa_fisica as pf
join tb_bairro as b
on pf.cd_bairro = b.cd_bairro
join tb_cidade as ci
on ci.cd_cidade = b.cd_cidade
join tb_uf as uf
on uf.cd_uf = ci.cd_uf
join tb_cliente as c
on c.cd_cliente = pf.cd_cliente;

select * from 
vw_cliente_sul
where Estado = 'PR'or Estado = 'SC' or Estado = 'RS' 
order by Estado;
-- FIM --

-- VIEW 8 --
create view vw_cliente_nordeste
as select nm_cliente as 'Cliente', sg_uf as 'Estado'
from tb_pessoa_fisica as pf
join tb_bairro as b
on pf.cd_bairro = b.cd_bairro
join tb_cidade as ci
on ci.cd_cidade = b.cd_cidade
join tb_uf as uf
on uf.cd_uf = ci.cd_uf
join tb_cliente as c
on c.cd_cliente = pf.cd_cliente;

select * from 
vw_cliente_nordeste
where Estado = 'MA' or Estado = 'BA'or Estado = 'AL' or Estado = 'SE' or Estado = 'PE'
or Estado = 'PI' or Estado = 'RN' or Estado = 'CE' or Estado = 'PB'
order by Estado;
-- FIM --

-- VIEW 9 --
create view vw_cliente_sudeste
as select nm_cliente as 'Cliente', sg_uf as 'Estado'
from tb_pessoa_juridica as pj
join tb_bairro as b
on pj.cd_bairro = b.cd_bairro
join tb_cidade as ci
on ci.cd_cidade = b.cd_cidade
join tb_uf as uf
on uf.cd_uf = ci.cd_uf
join tb_cliente as c
on c.cd_cliente = pj.cd_cliente;

select * from
vw_cliente_sudeste
where Estado = 'ES'or Estado = 'MG' or Estado = 'RJ' or Estado = 'SP'
order by Estado;
-- FIM --

-- VIEW 10 --
create view vw_cliente_centrooeste
as select nm_cliente as 'Cliente', sg_uf as 'Estado'
from tb_pessoa_juridica as pj
join tb_bairro as b
on pj.cd_bairro = b.cd_bairro
join tb_cidade as ci
on ci.cd_cidade = b.cd_cidade
join tb_uf as uf
on uf.cd_uf = ci.cd_uf
join tb_cliente as c
on c.cd_cliente = pj.cd_cliente;

select * from 
vw_cliente_centrooeste
where Estado = 'GO'or Estado = 'MT' or Estado = 'MS' or Estado = 'DF'
order by Estado;
-- FIM --


-- Atividade Procedure Parametrizada --

-- Procedure 1 --
DELIMITER //
create procedure pc_consulta_cliente (out retorno int)
BEGIN
select count(*) into retorno from tb_cliente;
select retorno as 'Clientes';
END //
DELIMITER ;

call pc_consulta_cliente (@retorno);
-- FIM --

-- Procedure 2 --
DELIMITER //
create procedure pc_consulta_cliente_cidade (in id_cidade int, out retorno int)
BEGIN
select count(cd_cpf) into retorno from tb_pessoa_fisica as pf
join tb_bairro as b
on pf.cd_bairro = b.cd_bairro
join tb_cidade as ci
on ci.cd_cidade = b.cd_cidade
join tb_uf as uf
on uf.cd_uf = ci.cd_uf
join tb_cliente as c
on c.cd_cliente = pf.cd_cliente
where ci.cd_cidade = id_cidade;
select retorno as 'Clientes';
END //
DELIMITER ;

call pc_consulta_cliente_cidade (2 ,@retorno);
-- FIM --

-- Procedure 3 --
DELIMITER //
create procedure pc_consulta_telefone (in id_cliente int)
BEGIN
select cd_numero1 as 'Número' from tb_telefone
where cd_cliente = id_cliente;
END //
DELIMITER ;

select * from tb_telefone;
call pc_consulta_telefone(2220);
-- FIM--


-- Procedure 4 --
DELIMITER //
create procedure pc_consulta_login (in id_login int)
BEGIN
select nm_cliente as 'Cliente', cd_email_cliente as 'Email', cd_senha_cliente as 'Email' from tb_cliente
where cd_login = id_login;
END //
DELIMITER ;

select * from tb_cliente;
call pc_consulta_login(15);
-- FIM--


-- Procedure 5 --
DELIMITER //
create procedure pc_consulta_veiculo (in id_marca int)
BEGIN
select nm_modelo as 'Modelo' from tb_modelo
where cd_marca = id_marca;
END //
DELIMITER ;

select * from tb_modelo;
call pc_consulta_veiculo(4);
-- FIM--


-- Atividade CRUD --

-- CRUD - CADASTRA --
DELIMITER //
create procedure pc_cadastra_cor (in id_cor int, in nome_cor varchar(50), out retorno varchar(100)) 
BEGIN 
if not exists (select * from tb_cor where cd_cor = id_cor or nm_cor = nome_cor) 
then 
BEGIN
insert into tb_cor (cd_cor, nm_cor)
value (id_cor, nome_cor);
if row_count() = 0 
then
set retorno = "ERRO! A cor NÃO foi castrada";
else 
set retorno = "SUCESSO! A cor foi cadastrada";
END if;
END;
else 
set retorno = "ERRO! Essa cor JÁ foi cadastrada";
END if;
select retorno;
END//
DELIMITER ;

call pc_cadastra_cor(14 ,'Verde Claro', @retorno);

select * from tb_cor;
-- FIM --


-- CRUD - EDITA --
DELIMITER //
create procedure pc_edita_cor (in id_cor int,in nome_cor varchar(100),out retorno varchar(100)) 
BEGIN 
if not exists (select * from tb_cor where cd_cor = id_cor or nm_cor = nome_cor) 
then 
BEGIN
set retorno = "ERRO! Cor NÂO encontarda!";
END;
else
UPDATE tb_cor
SET nm_cor = nome_cor
WHERE id_cor = cd_cor;
if row_count() = 0 
then
set retorno = "ERRO! A cor NÃO foi Alterada!";
else 
set retorno = "SUCESSO! A cor foi Alterada!";
END if;
END if;
select retorno;
END//
DELIMITER ;
drop procedure pc_edita_cor; 
call pc_edita_cor(11, 'Outros',@retorno);

select * from tb_cor;
-- FIM --


-- CRUD - DELETA --
DELIMITER //
create procedure pc_deleta_cor (in id_cor int, out retorno varchar(100)) 
BEGIN 
if not exists (select * from tb_cor where cd_cor = id_cor) 
then 
BEGIN
set retorno = "ERRO! Cor NÂO encontarda!";
END;
else
delete from  tb_cor 
where cd_cor = id_cor;
if row_count() = 0 
then
set retorno = "ERRO! A cor NÃO foi Deletada!";
else 
set retorno = "SUCESSO! A cor foi Deletada!";
END if;
END if;
select retorno;
END//
DELIMITER ;

call pc_deleta_cor(11 ,@retorno);

select * from tb_cor;
-- FIM --



select c.cd_cliente, v.cd_veiculo, c.nm_cliente as 'Cliente', mo.nm_modelo as 'Modelo', ma.nm_marca 'Marca', co.nm_cor as 'Cor do veiculo', v.cd_placa as'Placa do veiculo' 
from tb_cliente as c
join tb_veiculo as v
on v.cd_cliente = c.cd_cliente
join tb_modelo as mo
on mo.cd_modelo = v.cd_modelo
join tb_marca as ma
on ma.cd_marca = mo.cd_marca
join tb_cor as co
on v.cd_cor = co.cd_cor;

DELETE FROM tb_cliente WHERE cd_cliente = 2;

select * from tb_veiculo;

select *from tb_cliente;

select * from tb_login;

UPDATE tb_cliente
JOIN tb_login ON tb_login.cd_login = tb_cliente.cd_login
SET tb_login.cd_login = 7, tb_cliente.cd_cliente = 7
WHERE cd_cliente = 8;

SELECT
  CONSTRAINT_NAME,
  COLUMN_NAME,
  REFERENCED_TABLE_NAME,
  REFERENCED_COLUMN_NAME
FROM
  INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE
  TABLE_SCHEMA = 'db_tcc_estacionamento1'
  AND TABLE_NAME = 'tb_estacionamento'
  AND REFERENCED_TABLE_NAME IS NOT NULL;
  

START TRANSACTION;
insert into tb_login values
('', 'julio-pereira88@simoesmendonca.adv.br', 'HA0bRoSHGs');
 insert into tb_cliente values
(LAST_INSERT_ID(), 'julio-pereira88@simoesmendonca.adv.br', 'HA0bRoSHGs',LAST_INSERT_ID(), 'Julio Thiago Pereira');
COMMIT;


select LAST_INSERT_ID();
select * from tb_cliente;
select * from tb_login;


-- FEITO POR GRUPO TCHOLAS
-- Ver 1.4
-- Parte do cadastro do usuário
DROP DATABASE IF EXISTS `boaforma`;
CREATE DATABASE `boaforma`;
use `boaforma`;

-- Tabela user (para os Usuários do site)
drop table if exists `user`;
CREATE TABLE IF NOT EXISTS `user`(
	`userID` int not null auto_increment,
	`nome` varchar(500) not null default 'Usuário',
	`sobrenome` varchar(100) not null,
	`email` varchar(200) not null unique,
	`celular` varchar(11) not null,
	`data_nasc` date not null,
	`cpf` varchar(11),
	`senha` varchar(32) not null,
		constraint `fk_cadastroExerc_email1` primary key (userID, email)
);
-- Cadastro de pessoas para o site
insert into `user` (nome, sobrenome, email, celular, data_nasc, cpf, senha) values 
('Richard', 'Silva', 'richard.silva@teste.com', '19992653827', '20001011', '12345678912', md5('senha123')),
('Andrea', 'Frota', 'andrea-frota1@boaforma.org', '19982638276', '19980515', '37183548222', md5('123senha')),
('Deivid', 'Silva', 'deivid.silva87@etec.sp.gov.br', '19997652147', '19980515', '94873726345', md5('katiau')),
('Felipe', 'Santos', 'felipe.santos1181@etec.sp.gov.brg', '19982638276', '20050613', '28376129879', md5('mucilon')),
('Gabriel', 'Souza', 'gabriel.souza676@etec.sp.gov.br', '19974208964', '20050303', '47295420691', md5('baiano')),
('Gustavo', 'Tamashiro', 'gustavo.tamashiro@etec.sp.gov.br', '19982638276', '20050710', '57626988102', md5('japonego')),
('Maria', 'Oliveira', 'maria.oliveira1061@etec.sp.gov.br', '19982638276', '20050122', '09829845798', md5('dudinha'));
select * from user;

-- Cadastro para lista-exercicios

drop table if exists `cadastroExerc`;
CREATE TABLE IF NOT EXISTS `cadastroExerc`(
	`ceID` int unique auto_increment,
    `ceRep` int,
    `ceSerie` int,
    `ceDescanso` int,
    `exercID` int,
		primary key (ceID),
		foreign key (exercID) references exercicio(exercID) on delete cascade);

SELECT cadastroExerc.ceID, exercicio.exercNome FROM cadastroExerc
INNER JOIN exercicio ON cadastroExerc.exercID = exercicio.exercID;
select * from cadastroExerc;
select cadastroExerc.ceSerie;

insert into `cadastroExerc` (ceRep, ceSerie, ceDescanso) values
('15', '4', '40');
drop table if exists cadastroExerc;

DROP TABLE IF EXISTS `exercicio`;
CREATE TABLE `exercicio`(
	`exercID` int unique auto_increment,
    `exercNome` varchar(50),
    `exercDesc` varchar(600),
		primary key (exercID)
);
-- select * from exercicio where exercID = 
insert into `exercicio`(exercNome, exercDesc) values 
-- Abdômen
('Abdominal Supra','Deitado no solo de barriga pra cima, com os pés apoiados no chão e mantendo a curvatura natural da lombar, faça uma flexao de tronco com contraçao do abdomen.'),
('Abdominal Infra','Deitado com as pernas elevadas e estendidas, braços encostados no chão, o abdomen deve sustentar a elevaçao das pernas'),
('Abdominal Oblíquo','Deitado no solo de barriga pra cima, pernas elevadas flexionadas a 90°. com as mãos atrás da nuca, inicie o movimento fazendo uma flexão de tronco seguida de uma rotaçao onde o cotovelo busca o joelho da perna contralateral'),
('Prancha Ventral','Apoie os cotovelos e a palma das mãos no chão, pernas estendidas com a ponta dos pés apoiados no solo(mantendo o tronco e cervical alinhados). Faça contraçao abdominal e leve o joelho em direçao ao tronco'),

-- Peito
('Supino 45°', 'Deitado sobre um banco com elevação de 45 graus, pés no chão e costas levemente arqueadas. Pegue a barra na linha dos ombros e desça-a até a parte superior dos músculos peitorais.'),
('Fly 45°', 'Com o banco inclinado, pés no chão com máxima estabilidade, pegue os halteres e traga-o até a linha peitoral.'),
('Supino Sentado', 'Com o corpo totalmente em contato com a máquina e o banco regulado de acordo com a linha peitoral, ajuste seu peso para que possa empurrar a barra.'),
('Crossover', 'Posicione entre as polias dando um passo para frente e inclinando-se para frente. Braços e cotovelos estendidos. Realizar movimento de arco para frente de seu tronco buscando uma boa contração dos músculos peitorais e voltar os braços para posição de início.'),
('Peck Deck', 'Regular a maquina de acordo com a posição dos ombros em 90 graus e cotovelos flexionados. Realizar o fechamento com os cotovelos em frente ao peito '),

-- Tríceps
('Supino no banco reto com pegada fechada', 'Deite-se de costas em um banco reto e agarre a barra com uma pegada fechada e levante a barra em linha reta e segure-a, com os braços esticados.'),
('Mergulho no Banco', 'Coloque um banco atrás de você e outro na sua frente. Eles devem estar perpendiculares ao seu corpo e você deve segurar na borda do banco de trás com as duas mãos próximas ao corpo. As palmas devem estar separadas em uma distância equivalente à largura dos ombros e os braços devem estar completamente estendidos.'),
('Extensão de halteres sob a cabeça', 'Posicione-se em pé com os pés afastados em uma largura equivalente à largura dos ombros. Segure um halter em cada uma das mãos e estender os braços para cima, sobre a cabeça, com uma palma da mão voltada para a outra. Então, flexione os cotovelos e abaixe o haltere, colocando-o atrás da cabeça, de modo que ele fique perpendicular ao chão.'),
('Tríceps na máquina', 'Sente-se corretamente no equipamento, escolha o peso e segure com firmeza nas alças da máquina. Dobre os cotovelos em um ângulo de 90º, mantendo-os ao lado do corpo, para focar o trabalho nos tríceps.'),

-- Ombro
('Elevação Lateral', 'Comece sentado em um banco com as costas retas, segure um halter em cada mão na altura dos ombros e com os cotovelos dobrados. Leve os halteres para cima no sentido vertical até esticar os braços, depois, traga os halteres para baixo, até que eles toquem os ombros.'),
('Desenvolvimento de ombros com barra', 'Primeiro, sente-se em um banco reto com uma leve inclinação, deixe a coluna reta e encoste a parte superior das costas no encosto do banco Depois, suba a carga até a altura do pescoço, deixando os cotovelos flexionados ao lado do corpo. Os antebraços devem estar na posição vertical e as escápulas travadas para trás e desça a barra flexionando os cotovelos para voltar à posição inicial'),
('Crucifixo invertido com halteres', 'Incline o corpo para a frente, flexione levemente os joelhos, deixe o tronco paralelo ao chão e segure um halter em cada uma das mãos, com as palmas apontando para dentro, em seguida, desça os halteres, sem permitir que eles se encostem, já que deixar os pesos encostarem torna o movimento mais fácil.'),
('Desenvolvimento Arnold para Ombros', 'sente-se em um banco com encosto e segure um haltere em cada uma das mãos, com as palmas viradas para você. Mantenha a coluna ereta e as costas bem apoiadas, quando atingir a parte alta do movimento, os cotovelos devem estar estendidos, com os halteres próximos um do outro e posicionados acima da cabeça, com as palmas das mãos direcionadas para fora.'),

-- Trapézio
('Encolhimento com Halteres', 'o movimento consiste em subir os ombros em direção as orelhas e aguarde alguns segundos para voltar a posição inicial'),
('Encolhimento com Barra por Trás', 'Segure a barra com as palmas das mãos viradas para trás e sem uma distância muito grande entre as mãos e suspenda a barra de uma forma que mantenha os cotovelos estendidos então subas os ombros sem mexer o cotovelo.'),
('Remada Alta', 'Segure uma barra à frente do corpo, com as palmas das mãos voltadas para o corpo, com o movimento de flexão dos cotovelos, você deve subir a barra (ou os halteres) até a altura dos ombros e voltar a posição inicial.'),
('Encolhimento com Barra pela Frente', 'Com a barra em sua frente faça o movimento de subida dos ombros, permaneça alguns segundos e retorne à posição inicial. '),

-- ---------------------------------------------
-- Costas
('Pull Down', 'Usando uma barra reta na polia alta, incline seu corpo em direção a polia e traga a barra em direção as coxas com os braços totalmente estendidos, contraindo sempre a parte das dorsais.'),
('Remada Cavalinho', 'Segurar a barra com pegada neutra e os braços estendidos. Flexionar os cotovelos e trazer a barra em direção ao tronco, sempre mantendo os braços o mais perto possível do corpo. Contrair o máximo os músculos das costas e depois lentamente retornar à posição inicial.'),
('Remada sentada', 'Usando o triângulo, sente-se com os joelhos flexionados e com a postura reta, traga o triângulo em direção a cintura e volte estendendo completamente os braços.'),
('Remada unilateral', 'Utilizando um banco reto com 2 halteres posicionados um em cada lado, apoie o joelho no banco com a perna oposta afastada e com o tronco na posição horizontal. Segure o peso esquerdo com a palma da mão virada para o lado do corpo, puxe o halter em direção a cintura jogando os cotovelos para trás e voltando lentamente.'),
('Pulley frente', 'Ao sentar-se em frente a torre do aparelho com uma barra reta, estenda a mão e segure a barra um pouco além da largura dos ombros e puxe a barra para baixo em direção à parte superior do tórax, visando logo abaixo da clavícula e retorne lentamente para a posição inicial.'),

-- Bíceps
('Rosca Scott', 'Usando o banco com os braços no recosto de maneira que eles fiquem apoiados até a altura do cotovelo, segure a barra com as duas palmas da mão virada para cima, traga a barra para cima contraindo ao máximo os bíceps e retorne de maneira controlada para posição inicial.'),
('Rosca direta', 'Em pé, com os pés afastados dos ombros e joelhos pouco flexionados, segure a barra com os cotovelos esticados, contraindo o bíceps com o final do movimento e o cotovelo todo flexionado.'),
('Rosca martelo', 'pés afastados na largura dos ombros com joelhos flexionados e escapulas travadas realizar movimento de alavanca com os halteres.'),
('Rosca direta na polia', 'Com uma barra baixa na polia, pegue-a e deixe os cotovelos sempre juntos com o corpo e realize a contração dos bíceps.'),

-- Antebraço
('Rosca punho', 'Pegue uma barra e coloque o peso devido. Sentado, encaixe seu pulso na ponta do joelho. Coloque sua mão por baixo da barra. seu polegar deverá ficar por cima da barra. O cotovelo não deverá sair da coxa. Arrume a coluna em uma posição de conforto que não fique com hiperextensão de lombar. Com os pulsos, faça a extensão estendendo os dedos e a flexão.'),
('Carregamento de Halteres', 'Fique ereto com os pés paralelos aos ombros utilize dois halteres e mantenha-os suspensos com os braços estendidos para baixo. Você pode realizar o exercício como na suspensão na barra ou pode caminhar com os halteres. O objetivo é desenvolver força e resistência.'),
('Suspensão na barra', 'Segure a barra fixa com uma pegada pronada, supinada ou neutra e permaneça com o corpo suspenso na barra fixa em repetições de 60 a 90 segundos cada.'),
('Rosca de Punho Invertida', 'Afaste as mãos na barra até que fiquem paralelas aos ombros e dobre os punhos para baixo abaixando a barra e erga novamente retornando a posição inicial.'),

-- -------------------------------------------------------

-- Glúteo
('Glúteo na polia', 'Encaixe a corda com os ganchos no tornozelo, semi flexione o joelho direito, de forma que estique o joelho esquerdo para trás. Lembre-se de manter o tronco direcionado para frente, sem forças as costas na execução. Repita o mesmo processo com a outra perna.'),
('Búlgaro', 'Estique o joelho direito sobre o banco, mantendo a perna oposta livre. Posicone os pesos na lateral de corpo, agache com o peso sem retirar a perna direita do banco. Repita o mesmo processo com a outra perna.'),
('Sumô', 'Posicione sobre dois estepes em cada pé de forma que mantenha os joelhos redirecionados para fora. Com o peso em mãos, agache direcionado para baixo sem mover o joelhos, dentro ou fora.'),
('Máquina de Glúteo', 'Se posicione sobre a máquina, de forma que jogue o peso do equipamento para trás, similar ao Gluteo polia, dando um "coice" no ar.'),

-- Panturrilha
('Banco Panturrilha', 'Posicione os pés no equipamento mantendo-se sentado. Force os joelhos para cima sem manter os calcanhares no equipamento, tendo apenas a metade do pé.'),
('Panturrilha em pé', 'Posicione a barra nas costas, force o joelho jogando-o para cima'),

-- Posterior
('Leg-press', 'Foque o peso nos calcanhares, ao fazer força para cima. Mantenha os pés um pouco acima do meio do equipamento, realizando a exercício de forma que as pernas encostem no peito, sem esticar totalmente os joelhos.'),
('Cadeira Flexora', 'Com as escápulas contrarias e glúteos encaixados na cadeira, usar de apoio as barras e fazer o movimento com as pernas.'),
('Stiff', 'Com os joelhos semi flexionados, ative as escápulas das costas, mantendo em um angulo seguro para não focar, agache o tronco em direção ao chão fazendo força nos calcanhares'),

-- Quadríceps
('Cadeira Extensora', 'Com as escápulas contraídas e glúteos apoiados na cadeira, usar as mãos para estabilizar e realizar o movimento priorizando a fase concêntrica.'),
('Avanço', 'Com o peso do corpo ou halter, realize agachamentos andando, mantendo os pesos na lateral do corpo, utilizando cada perna a cada passada'),
('Leg-press', 'Mantenha os joelhos posicionados no meio do equipamento. Faça força nos calcanhares, realizando um movimento para cima sem esticar totalmente os joelhos, encostando no peito ao descer.'),
('Agachamento', 'Posicione a barra nas costas, diante que fique abaixo dos ombros. Foque a força nos calcanhares, agachando sem descer muito e mexer os joelhos para as laterais.')
;

-- acessar table
select * from user;
select * from exercicio;
select * from cadastroExerc;
-- deletar database caso precise
drop database boaforma;
drop table user;
drop table cadastroexerc;
drop table exercicio;
-- deletar table caso precise
drop database if exists user;
-- alterar parte de tabela caso precise
ALTER TABLE nome_tabela

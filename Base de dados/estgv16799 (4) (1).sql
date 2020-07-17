

--
-- Database: `estgv16799`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`estgv16799`@`localhost` PROCEDURE `ListaFuncDaEmpresa` (IN `Empresaa` INT)  BEGIN
   DECLARE o INT;
   DECLARE Funci CURSOR
   FOR
   SELECT * FROM Funcionarios f WHERE EmpresaFuncionario = Empresaa;
      OPEN Funci;
    REPEAT
            FETCH Funci INTO o;
      UNTIL done END REPEAT;
         CLOSE Funci;
END$$

CREATE DEFINER=`estgv16799`@`localhost` PROCEDURE `listar_empresas_com_CODPOST` (IN `Cod_Post` VARCHAR(20))  BEGIN

SELECT * FROM Empresa e WHERE e.CodPostEmpresa like Cod_Post ;

END$$

--
-- Functions
--
CREATE DEFINER=`estgv16799`@`localhost` FUNCTION `NcardsFidelizados` (`id` INT) RETURNS INT(11) BEGIN 
 DECLARE n int;
  (SELECT COUNT(*) AS val into n
FROM Cartao
INNER JOIN RegistoCartao ON RegistoCartao.CartaoRegistoCartao=Cartao.ID_Cartao
INNER JOIN Clientes ON RegistoCartao.ClienteRegistoCartao=Clientes.IDCliente
WHERE Clientes.IDCliente=RegistoCartao.ClienteRegistoCartao
AND Clientes.IDCliente = id)  ;
 
 RETURN n;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `Carimbos`
--

CREATE TABLE `Carimbos` (
  `IDCarimbo` int(11) NOT NULL,
  `CartaoCarimbo` int(11) NOT NULL,
  `FuncionarioCarimbo` int(11) NOT NULL,
  `TítuloCarimbo` text NOT NULL,
  `DescricaoCarimbo` text NOT NULL,
  `PremioCarimbo` text NOT NULL,
  `imgCarimbo` varchar(250) NOT NULL,
  `DataInicioCarimbo` date NOT NULL,
  `DataFimCarimbo` date NOT NULL,
  `CorLetraCarimbos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `Cartao`
--

CREATE TABLE `Cartao` (
  `ID_Cartao` int(11) NOT NULL,
  `EmpresaCartao` int(11) NOT NULL,
  `Título` text NOT NULL,
  `SubTítulo` text,
  `IMGCartao` text NOT NULL,
  `CorLetraCartao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Clientes`
--

CREATE TABLE `Clientes` (
  `IDCliente` int(11) NOT NULL,
  `PNomeCliente` text NOT NULL,
  `UNomeCliente` text NOT NULL,
  `SexoCliente` text NOT NULL,
  `DataNascCliente` datetime NOT NULL,
  `CodPostCliente` text NOT NULL,
  `MoradaCliente` text NOT NULL,
  `LocalidadeCliente` text NOT NULL,
  `ContactoCliente` int(11) NOT NULL,
  `EmailCliente` text NOT NULL,
  `P_EnderecoCliente` bit(1) NOT NULL DEFAULT b'1',
  `P_ContactoCliente` bit(1) NOT NULL DEFAULT b'1',
  `P_EmailCliente` bit(1) NOT NULL DEFAULT b'1',
  `P_SexoCliente` bit(1) NOT NULL DEFAULT b'1',
  `P_DataNascCliente` bit(1) NOT NULL DEFAULT b'1',
  `Carimbo` int(11) DEFAULT NULL,
  `ClienteR` int(11) DEFAULT NULL,
  `Reg_Carimbo` int(11) DEFAULT NULL,
  `ClienteRCarimbo` int(11) DEFAULT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cupoes`
--

CREATE TABLE `Cupoes` (
  `IDCupao` int(11) NOT NULL,
  `CartaoCupao` int(11) NOT NULL,
  `FuncionarioCupao` int(11) NOT NULL,
  `TituloCupao` text,
  `IMGCupao` text,
  `ValeCupao` int(11) DEFAULT NULL,
  `DataInicioCupao` datetime DEFAULT NULL,
  `DataFimCupao` datetime DEFAULT NULL,
  `DescricaoCupao` text,
  `CorLetraCupoes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Empresa`
--

CREATE TABLE `Empresa` (
  `IDEmpresa` int(11) NOT NULL,
  `NomeEmpresa` text NOT NULL,
  `NIF` varchar(9) NOT NULL,
  `MoradaEmpresa` text NOT NULL,
  `CodPostEmpresa` varchar(30) NOT NULL,
  `LocalidadeEmpresa` text NOT NULL,
  `Contacto1Empresa` int(11) NOT NULL,
  `Contacto2Empresa` int(11) DEFAULT NULL,
  `EmailEmpresa` text NOT NULL,
  `xcoordenada` varchar(240) NOT NULL,
  `ycoordenada` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Funcionarios`
--

CREATE TABLE `Funcionarios` (
  `IDFuncionario` int(11) NOT NULL,
  `EmpresaFuncionario` int(11) DEFAULT NULL,
  `PNomeFuncionario` varchar(50) NOT NULL,
  `UNomeFuncionario` varchar(50) NOT NULL,
  `MoradaFuncionario` text NOT NULL,
  `CodPostFuncionario` text NOT NULL,
  `LocalidadeFuncionario` text NOT NULL,
  `ContactoFuncionario` int(11) NOT NULL,
  `EmailFuncionario` text NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `PasswordFuncionario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Mensagem_Admin`
--

CREATE TABLE `Mensagem_Admin` (
  `ID_Mensagem_Admin` int(11) NOT NULL,
  `EmpresaMensagem` int(11) NOT NULL,
  `Mensagem` varchar(500) NOT NULL,
  `Enviada` tinyint(4) NOT NULL,
  `Data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Mensagens`
--

CREATE TABLE `Mensagens` (
  `IDMensagem` int(11) NOT NULL,
  `NomePessoa` varchar(100) NOT NULL,
  `EmailPessoa` varchar(100) NOT NULL,
  `TelemovelPessoa` int(9) NOT NULL,
  `Mensagem` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Notificacoes`
--

CREATE TABLE `Notificacoes` (
  `IDNotificacao` int(11) NOT NULL,
  `EmpresaNotificacao` int(11) NOT NULL,
  `ClienteNotificacao` int(11) NOT NULL,
  `Mensagem` text NOT NULL,
  `datanotificacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `RegistoCarimbo`
--

CREATE TABLE `RegistoCarimbo` (
  `IDRegCarimbo` int(11) NOT NULL,
  `CarimboRCarimbo` int(11) NOT NULL,
  `ClienteRCarimbo` int(11) NOT NULL,
  `SlotCompletosCarimbo` int(9) NOT NULL DEFAULT '0',
  `DataCompletoCarimbo` datetime DEFAULT NULL,
  `DataInicioCarimbo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `RegistoCartao`
--

CREATE TABLE `RegistoCartao` (
  `IDRegistoCartao` int(11) NOT NULL,
  `CartaoRegistoCartao` int(11) NOT NULL,
  `ClienteRegistoCartao` int(11) NOT NULL,
  `PontosCartao` int(11) NOT NULL,
  `NotificaCliente` bit(1) DEFAULT NULL,
  `DataRegistoCartao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `RegistoCupao`
--

CREATE TABLE `RegistoCupao` (
  `IDRegistoCupao` int(11) NOT NULL,
  `CupaoRegistoCupao` int(11) NOT NULL,
  `ClienteRegistoCupao` int(11) NOT NULL,
  `DataRCupao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DescricaoRCupao` text,
  `UsadoCupao` tinyint(1) NOT NULL DEFAULT '0',
  `favorito` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Carimbos`
--
ALTER TABLE `Carimbos`
  ADD PRIMARY KEY (`IDCarimbo`),
  ADD KEY `CartaoCarimbo` (`CartaoCarimbo`),
  ADD KEY `FuncionarioCarimbo` (`FuncionarioCarimbo`);

--
-- Indexes for table `Cartao`
--
ALTER TABLE `Cartao`
  ADD PRIMARY KEY (`ID_Cartao`),
  ADD KEY `EmpresaCartao` (`EmpresaCartao`);

--
-- Indexes for table `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`IDCliente`);

--
-- Indexes for table `Cupoes`
--
ALTER TABLE `Cupoes`
  ADD PRIMARY KEY (`IDCupao`),
  ADD KEY `CartaoCupao` (`CartaoCupao`),
  ADD KEY `FuncionarioCupao` (`FuncionarioCupao`);

--
-- Indexes for table `Empresa`
--
ALTER TABLE `Empresa`
  ADD PRIMARY KEY (`IDEmpresa`);

--
-- Indexes for table `Funcionarios`
--
ALTER TABLE `Funcionarios`
  ADD PRIMARY KEY (`IDFuncionario`),
  ADD KEY `EmpresaFuncionario` (`EmpresaFuncionario`);

--
-- Indexes for table `Mensagem_Admin`
--
ALTER TABLE `Mensagem_Admin`
  ADD PRIMARY KEY (`ID_Mensagem_Admin`),
  ADD KEY `Fk_ID_Empresa_MsgAdmin` (`EmpresaMensagem`);

--
-- Indexes for table `Mensagens`
--
ALTER TABLE `Mensagens`
  ADD PRIMARY KEY (`IDMensagem`);

--
-- Indexes for table `Notificacoes`
--
ALTER TABLE `Notificacoes`
  ADD PRIMARY KEY (`IDNotificacao`),
  ADD KEY `Fk_ID_Empresa` (`EmpresaNotificacao`),
  ADD KEY `Fk_ID_Cliente` (`ClienteNotificacao`);

--
-- Indexes for table `RegistoCarimbo`
--
ALTER TABLE `RegistoCarimbo`
  ADD PRIMARY KEY (`IDRegCarimbo`),
  ADD KEY `CarimboRCarimbo` (`CarimboRCarimbo`),
  ADD KEY `ClienteRCarimbo` (`ClienteRCarimbo`);

--
-- Indexes for table `RegistoCartao`
--
ALTER TABLE `RegistoCartao`
  ADD PRIMARY KEY (`IDRegistoCartao`),
  ADD KEY `ClienteRegistoCartao` (`ClienteRegistoCartao`),
  ADD KEY `CartaoRegistoCartao` (`CartaoRegistoCartao`);

--
-- Indexes for table `RegistoCupao`
--
ALTER TABLE `RegistoCupao`
  ADD PRIMARY KEY (`IDRegistoCupao`),
  ADD KEY `CupaoRegistoCupao` (`CupaoRegistoCupao`),
  ADD KEY `ClienteRegistoCupao` (`ClienteRegistoCupao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Carimbos`
--
ALTER TABLE `Carimbos`
  MODIFY `IDCarimbo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Cartao`
--
ALTER TABLE `Cartao`
  MODIFY `ID_Cartao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `Clientes`
--
ALTER TABLE `Clientes`
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Cupoes`
--
ALTER TABLE `Cupoes`
  MODIFY `IDCupao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `Empresa`
--
ALTER TABLE `Empresa`
  MODIFY `IDEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `Funcionarios`
--
ALTER TABLE `Funcionarios`
  MODIFY `IDFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `Mensagem_Admin`
--
ALTER TABLE `Mensagem_Admin`
  MODIFY `ID_Mensagem_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `Mensagens`
--
ALTER TABLE `Mensagens`
  MODIFY `IDMensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Notificacoes`
--
ALTER TABLE `Notificacoes`
  MODIFY `IDNotificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `RegistoCarimbo`
--
ALTER TABLE `RegistoCarimbo`
  MODIFY `IDRegCarimbo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `RegistoCartao`
--
ALTER TABLE `RegistoCartao`
  MODIFY `IDRegistoCartao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `RegistoCupao`
--
ALTER TABLE `RegistoCupao`
  MODIFY `IDRegistoCupao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Carimbos`
--
ALTER TABLE `Carimbos`
  ADD CONSTRAINT `carimbos_ibfk_1` FOREIGN KEY (`CartaoCarimbo`) REFERENCES `Cartao` (`ID_Cartao`),
  ADD CONSTRAINT `carimbos_ibfk_2` FOREIGN KEY (`FuncionarioCarimbo`) REFERENCES `Funcionarios` (`IDFuncionario`);

--
-- Limitadores para a tabela `Cartao`
--
ALTER TABLE `Cartao`
  ADD CONSTRAINT `cartao_ibfk_1` FOREIGN KEY (`EmpresaCartao`) REFERENCES `Empresa` (`IDEmpresa`);

--
-- Limitadores para a tabela `Cupoes`
--
ALTER TABLE `Cupoes`
  ADD CONSTRAINT `cupoes_ibfk_1` FOREIGN KEY (`CartaoCupao`) REFERENCES `Cartao` (`ID_Cartao`),
  ADD CONSTRAINT `cupoes_ibfk_2` FOREIGN KEY (`FuncionarioCupao`) REFERENCES `Funcionarios` (`IDFuncionario`);

--
-- Limitadores para a tabela `Funcionarios`
--
ALTER TABLE `Funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`EmpresaFuncionario`) REFERENCES `Empresa` (`IDEmpresa`);

--
-- Limitadores para a tabela `Mensagem_Admin`
--
ALTER TABLE `Mensagem_Admin`
  ADD CONSTRAINT `Fk_ID_Empresa_MsgAdmin` FOREIGN KEY (`EmpresaMensagem`) REFERENCES `Empresa` (`IDEmpresa`);

--
-- Limitadores para a tabela `Notificacoes`
--
ALTER TABLE `Notificacoes`
  ADD CONSTRAINT `Fk_ID_Cliente` FOREIGN KEY (`ClienteNotificacao`) REFERENCES `Clientes` (`IDCliente`),
  ADD CONSTRAINT `Fk_ID_Empresa` FOREIGN KEY (`EmpresaNotificacao`) REFERENCES `Empresa` (`IDEmpresa`);

--
-- Limitadores para a tabela `RegistoCarimbo`
--
ALTER TABLE `RegistoCarimbo`
  ADD CONSTRAINT `registocarimbo_ibfk_1` FOREIGN KEY (`CarimboRCarimbo`) REFERENCES `Carimbos` (`IDCarimbo`),
  ADD CONSTRAINT `registocarimbo_ibfk_2` FOREIGN KEY (`ClienteRCarimbo`) REFERENCES `Clientes` (`IDCliente`);

--
-- Limitadores para a tabela `RegistoCartao`
--
ALTER TABLE `RegistoCartao`
  ADD CONSTRAINT `registocartao_ibfk_1` FOREIGN KEY (`ClienteRegistoCartao`) REFERENCES `Clientes` (`IDCliente`),
  ADD CONSTRAINT `registocartao_ibfk_2` FOREIGN KEY (`CartaoRegistoCartao`) REFERENCES `Cartao` (`ID_Cartao`);

--
-- Limitadores para a tabela `RegistoCupao`
--
ALTER TABLE `RegistoCupao`
  ADD CONSTRAINT `registocupao_ibfk_1` FOREIGN KEY (`CupaoRegistoCupao`) REFERENCES `Cupoes` (`IDCupao`),
  ADD CONSTRAINT `registocupao_ibfk_2` FOREIGN KEY (`ClienteRegistoCupao`) REFERENCES `Clientes` (`IDCliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

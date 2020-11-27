CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL UNIQUE KEY,
  `contrasenya` varchar(255) NOT NULL,
  `tipoUsuario` varchar(255),
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


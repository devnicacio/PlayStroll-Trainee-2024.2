--
-- Banco de dados: `db_playstroll`
--
DROP DATABASE IF EXISTS db_playstroll;
CREATE DATABASE IF NOT EXISTS `db_playstroll` DEFAULT CHARACTER SET utf8 COLLATE    ;
USE `db_playstrooll`;

-- --------------------------------------------------------

--
-- Estrutura da tabela: `users`
--

CREATE TABLE `users`(
    `id` int(11) NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,

)

CREATE TABLE `posts`(
    `id` int(11) NOT NULL,
    `image_capa` varchar(245) COLLATE utf8mb4_general_ci NOT NULL,
    `image_capa` varchar(245) COLLATE utf8mb4_general_ci NOT NULL,

);
--
-- Banco de dados: `db_playstroll`
--
DROP DATABASE IF EXISTS `db_playstroll`;
CREATE DATABASE IF NOT EXISTS `db_playstroll` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_playstroll`;

-- --------------------------------------------------------

--
-- Estrutura da tabela: `users`
--

CREATE TABLE `users`(
    `id` int(11) NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'Davi Pacheco', 'davi.pacheco@code.ufjf.br', '12345678', '/uploads/avatar.jfif'),
(2, 'João Victor Nicácio', 'joaovictor.nicacio@code.ufjf.br', '12345678', '/uploads/avatar.jfif'),
(3, 'Leandro', 'leandro@code.ufjf.br', '12345678', '/uploads/avatar.jfif'),
(4, 'Rayssa', 'rayssa@code.ufjf.br', '12345678', '/uploads/avatar.jfif'),
(5, 'João Paulo', 'joaopaulo@code.ufjf.br', '12345678', '/uploads/avatar.jfif'),
(6, 'Diego', 'diego@code.ufjf.br', '12345678', '/uploads/avatar.jfif'),
(7, 'Gabriel Reis', 'greis@code.ufjf.br', '12345678', '/uploads/avatar.jfif'),
(8, 'Vítor', 'vetor@code.ufjf.br', '12345678', '/uploads/avatar.jfif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts`(
    `id` int(11) NOT NULL,
    `image_capa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `image_retrato` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `create_at` date NOT NULL,
    `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `avaliation` decimal(9,1) NOT NULL,
    `content` longtext COLLATE utf8mb4_general_ci NOT NULL,
    `id_user` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `posts` (`id`, `image_capa`, `image_retrato`, `create_at`, `title`, `avaliation`, `content`, `id_user`) VALUES
(1, '/uploads/image1.png', '/uploads/image2.png', '2024-11-21', 'Jogo do Ano',9.9, 'ah não sei o que não sei o que lá...', 1);

--
-- Índices para tabelas
--

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `idx__posts_title` (`title`),
    ADD KEY `fk_posts__user_id` (`id_user`);

--
-- Índices para tabela ``
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `idx__users_email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 9;

--
-- Restrições para as tabelas
--

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
    ADD CONSTRAINT `fk_posts__user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
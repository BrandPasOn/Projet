-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 11 oct. 2023 à 13:39
-- Version du serveur : 5.7.24
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `maets`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `game_id` int(11) NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `game_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 246925, 'comment of Brandon', '2023-09-14 10:18:47', '2023-10-09 08:35:29'),
(2, 1, 246925, 'second comment updated', '2023-09-14 10:19:30', '2023-09-14 14:04:40'),
(3, 1, 246925, 'test updated', '2023-09-14 10:21:15', '2023-09-14 14:08:49'),
(4, 1, 246925, 'gégéa', '2023-09-14 12:28:40', '2023-09-14 14:09:26'),
(6, 1, 246925, '<strong> coucou </strong>', '2023-09-14 14:55:22', '2023-09-14 14:55:22'),
(8, 1, 218000, 'teste', '2023-09-28 14:55:44', '2023-09-28 14:55:51'),
(9, 1, 218000, 'petit comsaze', '2023-09-28 15:34:27', '2023-09-28 15:34:37'),
(10, 1, 123, 'bonsoir', '2023-09-29 14:22:12', '2023-09-29 14:22:20'),
(11, 1, 246925, 'comment of Brandon LE BG (with big british accent)', '2023-10-05 17:25:43', '2023-10-05 17:25:43'),
(12, 2, 218000, 'olivia comment', '2023-10-06 16:02:01', '2023-10-06 16:07:29'),
(13, 1, 93545, 'Commentazeaez', '2023-10-09 09:08:32', '2023-10-09 09:09:06'),
(14, 1, 83198, 'yoooooooooo ', '2023-10-09 10:57:12', '2023-10-09 10:59:04'),
(17, 12, 246925, 'test', '2023-10-11 12:29:30', '2023-10-11 12:29:30');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `email`, `title`, `content`, `read`, `created_at`, `updated_at`) VALUES
(1, 'aze@aze.aze', 'azeazeaze', 'azeazeazeaze', 1, '2023-10-03 16:50:53', '2023-10-11 13:12:10'),
(2, 'aze@aze.aze', 'azeazeaze', 'azeazeazeaze', 1, '2023-10-03 16:52:51', '2023-10-11 13:00:49'),
(3, 'aze@aze.aze', 'azeazeaze', 'azeazeazeaze', 0, '2023-10-03 16:54:40', '2023-10-03 16:54:40'),
(4, 'aze@aze.aze', 'azeazeaze', 'azeazeaze', 0, '2023-10-03 16:59:57', '2023-10-03 16:59:57'),
(5, 'aze@aze.aze', 'azeazeaze', 'azeazeaze', 1, '2023-10-03 17:01:57', '2023-10-11 12:58:26'),
(6, 'aze@aze.aze', 'azeazeaze', 'cvvcbcvbcbvcbvbvc', 0, '2023-10-03 17:02:08', '2023-10-03 17:02:08'),
(7, 'test@test.fr', 'teeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeest', 1, '2023-10-03 17:08:30', '2023-10-11 13:12:05'),
(8, 'test@test.fr', 'teeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeste', 0, '2023-10-03 17:11:17', '2023-10-03 17:11:17'),
(9, 'test@test.fr', 'teeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeste', 1, '2023-10-03 17:11:36', '2023-10-11 13:12:09'),
(10, 'test@test.fr', 'petiut test', 'héhéhéhhéhéhéh test', 1, '2023-10-03 17:14:50', '2023-10-11 13:12:42'),
(11, 'test2@test.fr', 'bvccbvxbvcxbvcxbvcxbvcxbvcx', 'etr(h<detrhygerhetrherh', 0, '2023-10-03 17:17:09', '2023-10-03 17:17:09'),
(12, 'test2@test.fr', 'bvccbvxbvcxbvcxbvcxbvcxbvcx', 'etr(h<detrhygerhetrherh', 0, '2023-10-03 17:17:24', '2023-10-03 17:17:24'),
(13, 'test2@test.fr', 'thrdfhsfdgdgfdfgd', 'azeazeazeazeazeaeaeaez', 0, '2023-10-03 17:17:50', '2023-10-03 17:17:50'),
(14, 'test@test.fr', 'azeaezazeazea', 'azeazeaeazeazeaeaaeeaze', 0, '2023-10-03 17:18:36', '2023-10-03 17:18:36'),
(15, 'test2@test.fr', 'azeazeazeazeaze', 'azeazeazeazeazeazeazeaeaze', 0, '2023-10-03 17:21:26', '2023-10-03 17:21:26'),
(16, 'test@test.fr', 'bonsoir aajahjajhahahhahah', 'azeazeazeazeazeaze', 0, '2023-10-03 17:22:10', '2023-10-03 17:22:10'),
(17, 'test@test.fr', 'zaeazeaaezaezaezaezaezaez', 'azeazeaeaezaaezzaeeazaezaezaezaezaezaez', 0, '2023-10-03 17:23:56', '2023-10-03 17:23:56'),
(18, 'test@test.fr', 'azeaeazaezaezaezaezaez', 'aezezaaezaezarezezttreztrezztreeryYER QyrerehyYREeryr', 0, '2023-10-03 17:41:49', '2023-10-03 17:41:49'),
(19, 'test2@test.fr', 'bvccbvcbvbcvxcxbvbvcx', 'bfwcxdfqhghdgfqdbgfqndqbgf', 0, '2023-10-03 17:43:55', '2023-10-03 17:43:55'),
(20, 'brandonmillion1206@outlook.fr', 'azeazeaezazeaezae', 'aezezaezaeazzaeaezeaz', 0, '2023-10-03 17:51:16', '2023-10-03 17:51:16'),
(21, 'test2@test.fr', 'azeazeazeaaez', 'erhgdethjurdetjnedtj', 0, '2023-10-03 17:52:52', '2023-10-03 17:52:52'),
(22, 'test2@test.fr', 'azeazeazea', 'azeazeazeaeza', 0, '2023-10-03 17:56:11', '2023-10-03 17:56:11'),
(23, 'test2@test.fr', 'azeazeazezae', 'azeazeazeazeaze', 0, '2023-10-03 17:58:58', '2023-10-03 17:58:58'),
(24, 'brandonmillion1206@outlook.fr', 'azeazeaea', 'detrhetrhdetrh errdh', 0, '2023-10-03 17:59:49', '2023-10-03 17:59:49'),
(25, 'test2@test.fr', 'azeazeaea', 'azeaeaz', 0, '2023-10-03 18:10:22', '2023-10-03 18:10:22'),
(26, 'aze@aze.Aze', 'azeazeaze', 'azeazeazeazeaztfregrg', 0, '2023-10-03 18:12:34', '2023-10-03 18:12:34'),
(27, 'test2@test.fr', 'eazeazeazez', 'eazeazeazea', 1, '2023-10-03 18:15:28', '2023-10-11 08:00:13'),
(28, 'test2@test.fr', 'azeazeaze', 'zaeazeaeazaez', 1, '2023-10-03 18:19:04', '2023-10-11 12:54:32'),
(29, 'test2@test.fr', 'ouioiuouiouiouio', 'eazeaezaezazeaez', 1, '2023-10-03 18:21:21', '2023-10-11 13:00:53'),
(30, 'brandonmillion1206@outlook.fr', 'azeazeazeazea', 'azeazeazeaz', 1, '2023-10-03 18:21:51', '2023-10-11 08:00:11'),
(31, 'test2@test.fr', 'azeazeaze', 'azeazeazeaze', 0, '2023-10-03 18:25:57', '2023-10-03 18:25:57'),
(32, 'aze@aze.Aze', 'azeaez', 'azeazeaze', 0, '2023-10-03 18:27:58', '2023-10-03 18:27:58'),
(33, 'brandonmillion1206@outlook.fr', 'azeazea', 'azeazeae', 0, '2023-10-03 18:30:01', '2023-10-03 18:30:01'),
(34, 'test2@test.fr', 'azeaze', 'azeazeazeazeaeazeaze', 0, '2023-10-03 18:31:57', '2023-10-03 18:31:57'),
(35, 'test2@test.fr', 'azedehgrrdehdeherjh', 'sdfsfdsfsfsdf', 0, '2023-10-03 18:32:25', '2023-10-03 18:32:25'),
(36, 'eric@agence-greenweb.com', 'azeazeaze', 'azeazeazeazeaze', 0, '2023-10-03 18:35:47', '2023-10-03 18:35:47'),
(37, 'test2@test.fr', 'azeazeaze', 'azeazeaez', 0, '2023-10-03 18:37:48', '2023-10-03 18:37:48'),
(38, 'test2@test.fr', 'azeazeaze', 'azeazeagaezfraz', 0, '2023-10-03 18:38:51', '2023-10-03 18:38:51'),
(39, 'brandon.million@3wa.io', 'azeazeazeaze', 'azeazeazeaz', 0, '2023-10-03 18:40:35', '2023-10-03 18:40:35'),
(40, 'brandonmillion1206@outlook.fr', 'azeazeazea', 'azeaeazeaz', 0, '2023-10-03 18:41:53', '2023-10-03 18:41:53'),
(41, 'aze@aze.Aze', 'test numéro beeaucoup', 'azeazeazeazeazeaez', 0, '2023-10-03 18:42:34', '2023-10-03 18:42:34'),
(42, 'eric@agence-greenweb.com', 'azeazeazeaze', 'zaeazeazeaea', 0, '2023-10-03 18:42:57', '2023-10-03 18:42:57'),
(43, 'brandonmillion1206@outlook.fr', 'azeazeazeazea', 'azeazeazeazeaezaez', 0, '2023-10-03 18:43:17', '2023-10-03 18:43:17'),
(44, 'test2@test.fr', 'azeazeazeazeaze', 'azeazeazeazeae', 0, '2023-10-03 18:46:14', '2023-10-03 18:46:14'),
(45, 'test@test.fr', 'contaxt', 'object', 0, '2023-10-06 16:27:39', '2023-10-06 16:27:39'),
(46, 'brandonmillion1206@outlook.fr', 'Contact', 'Comment object', 1, '2023-10-06 16:28:30', '2023-10-11 12:58:32'),
(47, 'test@test.fr', 'GNGNGNGNGNGNGN', 'COntact test', 1, '2023-10-09 09:06:25', '2023-10-11 12:58:29');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_11_141759_add_role_to_users_table', 2),
(6, '2023_09_12_082515_users_games', 3),
(7, '2023_09_12_084557_comments', 4),
(8, '2023_09_12_085247_users_games_update', 5),
(9, '2023_09_12_085503_images', 6),
(10, '2023_10_03_180446_contact', 7),
(11, '2023_10_03_210229_newsletter', 8),
(12, '2023_10_08_104240_user_wished_games', 9);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'test@test.fr', '2023-10-03 19:04:34', '2023-10-03 19:04:34'),
(2, 'test@test.fr', '2023-10-06 16:12:06', '2023-10-06 16:12:06'),
(3, 'test@test.fr', '2023-10-06 16:12:31', '2023-10-06 16:12:31'),
(4, 'test@test.fr', '2023-10-06 16:15:04', '2023-10-06 16:15:04'),
(5, 'test@test.fr', '2023-10-06 16:17:12', '2023-10-06 16:17:12'),
(6, 'test@test.fr', '2023-10-06 16:17:30', '2023-10-06 16:17:30'),
(7, 'test2@test.fr', '2023-10-06 16:19:44', '2023-10-06 16:19:44'),
(8, 'aze@aze.Aze', '2023-10-06 16:22:27', '2023-10-06 16:22:27'),
(9, 'brandon.million@3wa.io', '2023-10-06 16:24:05', '2023-10-06 16:24:05'),
(10, 'eric@agence-greenweb.com', '2023-10-06 16:24:15', '2023-10-06 16:24:15'),
(11, 'blbl@vll.re', '2023-10-06 16:24:48', '2023-10-06 16:24:48'),
(12, 'test2@test.te', '2023-10-06 16:25:18', '2023-10-06 16:25:18'),
(13, 'test7@test.te', '2023-10-06 16:25:46', '2023-10-06 16:25:46'),
(14, 'test4@test.Te', '2023-10-06 16:26:44', '2023-10-06 16:26:44'),
(15, 'test8@test.te', '2023-10-06 16:27:22', '2023-10-06 16:27:22'),
(16, 'blblblb@test.te', '2023-10-09 09:06:42', '2023-10-09 09:06:42');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '1' COMMENT '1 = user, 2 = admin',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Brandon', 'test@test.fr', 2, '$2y$10$gkpcnDx2ebWpgcAb8UNIduupsF.Vjwh7.SWuG6YYSx7uwdwIrDUEC', 'kiaIYWdXGtSxw2igBAj1i40mwl3JZRAtlg7lmipgWKmxrrVN5nyQflzeuRNe', '2023-09-11 11:55:13', '2023-10-09 09:13:52'),
(2, 'olivia', 'test2test2test2@test.fr', 1, '$2y$10$SRj4x4ZGjIh.NwfwoneM1.6ZPfMMOOU0WzruGRPuMNCH.Adktz2R2', NULL, '2023-09-14 14:57:37', '2023-10-11 12:58:15'),
(4, 'Brandon2', 'brandon2@test.fr', 1, '$2y$10$wIfuetJTVHz6eWpGnhgH5.QMd4UnAnJK5r/Y8l9MayFxBNr/6HVyi', NULL, '2023-10-06 13:41:52', '2023-10-08 14:40:28'),
(5, 'Brandon3', 'brandon3@test.fr', 1, '$2y$10$hSk9.TftrIvmJnDWq/VdgOdzQnvpT8IacibFgWX6VQ0fLorPapAF.', NULL, '2023-10-06 13:48:23', '2023-10-11 11:09:06'),
(6, 'Brandon4', 'brandon4@test.fr', 1, '$2y$10$RZoHnQ8keNgvTJsKj3ko/u3bCTnOIjY6MaQviBKQVQwFBngyRT7nq', NULL, '2023-10-06 13:49:53', '2023-10-08 14:38:14'),
(7, 'Brandon5', 'brandon5@test.fr', 1, '$2y$10$Mc0RTha3R0VIu9NzGBzv8uE0sOxpXUWWMTYOK/LsSDjqpl8VkJQ.W', NULL, '2023-10-06 14:04:55', '2023-10-11 12:57:54'),
(8, 'Brandon6', 'brandon6@test.fr', 1, '$2y$10$hy79boDBpEmmCIUqfV9hIuE.LdLHBCsVN.jhGCQ7roG1bKKtmLAxK', NULL, '2023-10-06 14:06:20', '2023-10-06 14:06:20'),
(9, 'MangaTech', 'manga@test.fr', 1, '$2y$10$jAUmPTQjCdpBbJqviUiume/.sfj5Z/2UPkPIvf.ZeP5DsobU0wQ.y', NULL, '2023-10-10 10:00:49', '2023-10-10 10:40:38'),
(12, 'BrandonBG', 'brandonbg@test.te', 1, '$2y$10$7luumDjaZdlqbA7BndYUbOhx55T6hQXoDMV86gVg2XbQxRl9yZ6yu', NULL, '2023-10-11 12:27:38', '2023-10-11 12:56:53');

-- --------------------------------------------------------

--
-- Structure de la table `users_games`
--

CREATE TABLE `users_games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `game_id` int(11) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_favorite` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_games`
--

INSERT INTO `users_games` (`id`, `user_id`, `game_id`, `note`, `is_favorite`, `created_at`, `updated_at`) VALUES
(12, 1, 135082, 'Note of me', 1, '2023-09-15 10:02:08', '2023-10-10 13:48:16'),
(16, 1, 123, 'Wow is good', 1, '2023-09-29 14:22:07', '2023-10-11 08:31:23'),
(22, 1, 266823, NULL, 0, '2023-10-02 15:26:24', '2023-10-11 07:34:55'),
(23, 1, 218000, NULL, 1, '2023-10-08 22:00:10', '2023-10-08 22:39:43'),
(26, 1, 32510, 'Note', 1, '2023-10-08 22:05:39', '2023-10-10 10:57:32'),
(28, 1, 93545, '', 0, '2023-10-09 09:08:12', '2023-10-11 08:49:34'),
(29, 1, 89616, NULL, 1, '2023-10-09 09:16:19', '2023-10-10 13:56:19'),
(30, 1, 235080, NULL, 0, '2023-10-10 13:57:40', '2023-10-10 13:57:40'),
(32, 1, 83198, NULL, 0, '2023-10-11 13:26:31', '2023-10-11 13:26:31');

-- --------------------------------------------------------

--
-- Structure de la table `users_wished_games`
--

CREATE TABLE `users_wished_games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `game_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_wished_games`
--

INSERT INTO `users_wished_games` (`id`, `user_id`, `game_id`, `created_at`, `updated_at`) VALUES
(22, 1, 41349, '2023-10-09 09:16:50', '2023-10-09 09:16:50'),
(23, 1, 10603, '2023-10-09 09:16:54', '2023-10-09 09:16:54'),
(24, 1, 386, '2023-10-10 15:23:28', '2023-10-10 15:23:28'),
(25, 1, 246925, '2023-10-11 12:02:24', '2023-10-11 12:02:24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `users_games`
--
ALTER TABLE `users_games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_games_user_id_foreign` (`user_id`);

--
-- Index pour la table `users_wished_games`
--
ALTER TABLE `users_wished_games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_wished_games_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users_games`
--
ALTER TABLE `users_games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `users_wished_games`
--
ALTER TABLE `users_wished_games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users_games`
--
ALTER TABLE `users_games`
  ADD CONSTRAINT `users_games_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users_wished_games`
--
ALTER TABLE `users_wished_games`
  ADD CONSTRAINT `users_wished_games_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

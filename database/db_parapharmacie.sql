-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 04:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parapharmacie`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `description`, `date`, `created_at`, `updated_at`, `image`) VALUES
(6, 'Nouveaux produit', 'Nouveaux produit sont arrivé', '2021-05-31', '2021-06-08 10:49:22', '2021-06-12 12:40:29', '1623152962.jpg'),
(7, 'Nouveaux produit de Clic', 'Nouveaux produit de Clic', '2021-06-10', '2021-06-08 10:50:38', '2021-06-08 10:50:38', '1623153038.jpg'),
(8, 'Nouveaux produit', 'Nouveaux produit', '2021-06-11', '2021-06-08 10:51:07', '2021-06-08 11:57:33', '1623157053.jpg'),
(9, 'avene', 'Nouveaux Produit', '2021-06-17', '2021-06-14 07:59:24', '2021-06-14 07:59:58', '1623661164.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'IUU', NULL, NULL),
(2, 'creme', NULL, NULL),
(3, 'Visage', '2021-06-08 14:53:44', '2021-06-08 14:56:40'),
(4, 'avene', '2021-06-14 08:15:33', '2021-06-14 08:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(11) NOT NULL,
  `titre` varchar(60) NOT NULL,
  `montant` double NOT NULL,
  `date` date NOT NULL,
  `mode_paiement` varchar(60) NOT NULL,
  `employe` int(11) DEFAULT NULL,
  `doccument` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `titre`, `montant`, `date`, `mode_paiement`, `employe`, `doccument`, `created_at`, `updated_at`) VALUES
(1, 'k', 5345, '2021-06-17', 'chèque', 7, 'C:\\xampp\\tmp\\phpFFB8.tmp', '2021-06-08 09:40:21', '2021-06-08 09:40:21'),
(2, 'Electricité', 324, '2021-06-04', 'chèque', 7, '1623151066.jpg', '2021-05-06 11:17:46', '2021-06-08 10:17:46'),
(3, 'test', 999, '2021-06-10', 'chèque', 7, 'C:\\xampp\\tmp\\phpBFF2.tmp', '2021-05-04 11:18:14', '2021-06-08 12:45:46'),
(4, 'test', 2222, '2021-06-09', 'chèque', 9, '1623153165.pdf', '2021-05-04 11:52:45', '2021-06-08 10:52:45'),
(5, 'CNSS', 100, '2021-06-17', 'carte bancaire', 9, 'C:\\xampp\\tmp\\phpBD1.tmp', '2021-06-08 12:17:15', '2021-06-08 12:47:56'),
(6, 'l\'eau', 1000, '2021-06-14', 'espéce', NULL, '1623662212.jpg', '2021-06-14 08:16:52', '2021-06-14 08:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `tele` varchar(30) DEFAULT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  `type` varchar(30) NOT NULL,
  `ice` varchar(30) DEFAULT NULL,
  `iff` varchar(30) DEFAULT NULL,
  `rc` varchar(30) DEFAULT NULL,
  `sexe` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `tele`, `adresse`, `type`, `ice`, `iff`, `rc`, `sexe`, `email`, `created_at`, `updated_at`) VALUES
(1, 'mechdoud', 'med', '06666666', 'fes wed fes', 'entreprise', 'ysys', 'jsu', 'usdu', 'homme', 'med@admin.com', '2021-05-04 14:50:35', '2021-06-19 15:32:34'),
(2, 'mechdoud', 'mohamed', '+212613419442', '17. rue lwifak', 'indepandent', '', '', '', 'homme', 'mohamedmechdoud2@gmail.com', '2021-06-01 14:02:48', '2021-06-08 12:17:29'),
(3, 'mechdoud', 'mohamed', '+212613419442', 'fes', 'entreprise', '1111111', '22222', '33333', 'homme', 'mohamedmechdoud2@gmail.com', '2021-06-25 13:50:41', '2021-06-12 16:52:18'),
(4, 'el ouzani', 'amina', '077868667', 'Casa', 'indepandant', NULL, NULL, NULL, 'femme', NULL, '2021-02-18 13:51:32', NULL),
(5, 'kholani', 'abdelkarim', '067838321', 'Fes', 'entreprise', '432534', '222346', '32123554', 'homme', 'med@med.com', '2021-04-08 13:52:20', NULL),
(6, 'dardikh', 'amine', '0764733993', 'Rabat', 'indepandant', NULL, NULL, NULL, NULL, NULL, '2021-02-10 13:53:36', NULL),
(7, 'Mechdoud', 'sara', '068439232', 'Fes', 'indepandant', NULL, NULL, NULL, 'femme', 'sara@gmail.com', '2021-04-14 14:54:12', NULL),
(8, 'el moumni', 'kamal', '0764733945', 'Fes', 'indepandant', NULL, NULL, NULL, NULL, NULL, '2021-06-10 13:54:59', NULL),
(9, 'dardikh', 'salima', '0764733993', 'Rabat', 'indepandant', NULL, NULL, NULL, NULL, 'salima@gmail.com', '2021-06-09 13:55:24', NULL),
(10, 'mechdoud', 'brahim', '0664423993', 'Casa', 'indepandant', NULL, NULL, NULL, 'homme', 'brahim@gmail.com', '2021-06-16 13:56:12', NULL),
(11, 'el moumni', 'samira', '0769933945', 'Casa', 'entreprise', '323213', '6655', '123465', 'homme', 'samira@gmail.com', '2021-04-14 14:58:51', '2021-06-12 17:03:17'),
(12, 'alami', 'omar', '0625361469', '2 hey saada fes', 'indepandent', NULL, NULL, NULL, 'homme', 'oussamaalaoui@hotmail.com', '2021-06-14 08:18:50', '2021-06-14 08:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `client` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `employe` int(11) DEFAULT NULL,
  `totale` int(11) NOT NULL,
  `credit` double(8,2) DEFAULT 0.00,
  `paye` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `date`, `client`, `created_at`, `updated_at`, `employe`, `totale`, `credit`, `paye`) VALUES
(5, '2021-06-12 17:09:11', 2, '2021-06-09 15:50:29', NULL, 7, 787, 7.00, 780.00),
(6, '2021-06-12 17:08:56', 2, '2021-06-10 15:50:33', NULL, 7, 12, 0.00, 12.00),
(7, '2021-06-12 17:08:26', 2, '2021-05-04 16:50:37', NULL, 7, 1000, 500.00, 500.00),
(8, '2021-06-12 17:08:34', 1, '2021-06-02 15:50:43', NULL, 7, 5555, 555.00, 5000.00),
(9, '2021-06-12 17:08:53', 2, '2021-04-05 23:00:00', NULL, 7, 12000, 1000.00, 11000.00),
(10, '2021-06-12 17:09:36', 2, '2021-05-06 00:00:00', NULL, 7, 4000, 350.00, 3250.00),
(11, '2021-06-12 17:09:20', 2, '2021-05-06 00:00:00', NULL, 8, 900, 0.00, 900.00),
(12, '2021-06-12 17:09:40', 4, '2021-06-11 12:15:14', NULL, 7, 1000, 0.00, 1000.00),
(13, '2021-06-12 17:09:46', 3, '2021-06-11 12:15:14', NULL, 8, 999, 99.00, 900.00),
(14, '2021-06-12 17:09:53', 9, '2021-06-11 12:15:46', NULL, 8, 890, 90.00, 800.00),
(15, '2021-06-20 22:30:41', 8, '2021-06-11 12:15:46', '2021-06-20 21:30:41', 8, 8100, 100.00, 8000.00);

-- --------------------------------------------------------

--
-- Table structure for table `detailcommandes`
--

CREATE TABLE `detailcommandes` (
  `id` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prix` double(8,2) DEFAULT NULL,
  `produit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `commande` int(11) NOT NULL,
  `remise` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailcommandes`
--

INSERT INTO `detailcommandes` (`id`, `quantite`, `prix`, `produit`, `created_at`, `updated_at`, `commande`, `remise`) VALUES
(16, 2, 2000.00, 8, NULL, '2021-06-18 08:42:43', 15, 0),
(17, 1, 12.00, 5, NULL, NULL, 6, NULL),
(18, 100, 12000.00, 4, NULL, NULL, 6, NULL),
(22, 980, 161994.50, 7, NULL, '2021-06-18 08:24:51', 15, 13);

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `cin` varchar(15) NOT NULL,
  `description` varchar(255) NOT NULL,
  `telephone` varchar(40) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `salaire` double NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `mot_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `nom`, `prenom`, `cin`, `description`, `telephone`, `adresse`, `email`, `role`, `salaire`, `image`, `created_at`, `updated_at`, `login`, `mot_passe`) VALUES
(1, 'mechdoud', 'mohammed', 'cd23123', 'desc', NULL, NULL, NULL, 'admin', 10000, NULL, NULL, NULL, 'admin@admin.com', '7b6050d6c82e35b819363b5c7f8013a1'),
(7, 'mechdoud', 'mohamed', 'cd23123', 'test', '+212613419442', 'Fes', 'mohamed@mechdoud.com', 'admin', 14000, '1623506734.jpg', '2021-06-07 02:33:41', '2021-06-12 15:30:17', 'mohamedmechdoud22@gmail.com', '7b6050d6c82e35b819363b5c7f8013a1'),
(9, 'mechdoud', 'mohamed', 'cd2232', 'desc', '+212613419442', 'fes', 'mohamedmechdoud2@gmail.com', 'employe', 5000, '1623506704.jpg', '2021-06-08 11:58:51', '2021-06-12 15:29:45', 'admin@admin.com', '7b6050d6c82e35b819363b5c7f8013a1'),
(10, 'alaoui', 'oussama', 'cd20121', 'admin', '0625987436', '2 hey saada fes', 'oussamaalaoui@hotmail.com', 'employe', 4000, '1623661553.jpg', '2021-06-14 08:05:53', '2021-06-14 08:05:53', 'zakariadrk', '7b6050d6c82e35b819363b5c7f8013a1');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `adresse` varchar(55) NOT NULL,
  `telephone` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom`, `adresse`, `telephone`, `email`, `updated_at`, `created_at`) VALUES
(1, 'Nivea', 'Rabat', '+212629319442', 'nivea@contact.com', '2021-06-12 15:37:56', '2021-05-28 12:47:46'),
(3, 'Oriflame', 'Fes', '+212613419442', 'oriflame@contact.com', '2021-06-12 15:36:44', '2021-06-08 12:12:17'),
(4, 'alaoui', '2 hey saada fes', '0625987436', 'oussamaalaoui@hotmail.com', '2021-06-14 08:06:49', '2021-06-14 08:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lire_le` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `nom`, `sujet`, `email`, `telephone`, `message`, `lire_le`, `created_at`, `updated_at`) VALUES
(17, 'alaoui oussama', 'avene', NULL, '0625987436', 'commende 2 produit', 0, '2021-06-14 08:33:41', '2021-06-14 08:36:28'),
(16, 'mohammed mechdoud', 'reclamation d\'un produit', NULL, '+212613419442', 'reclamation d\'un produit', 0, '2021-06-12 12:00:09', '2022-05-31 23:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_02_171942_create_medicines_table', 1),
(4, '2018_12_02_184541_create_companies_table', 1),
(5, '2018_12_02_184604_create_diseases_table', 1),
(6, '2018_12_03_150347_create_comdis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `prix` double NOT NULL,
  `quantite` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id`, `prix`, `quantite`, `date`) VALUES
(3, 360, 4, '0000-00-00'),
(10, 990, 1, '2021-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `parametres`
--

CREATE TABLE `parametres` (
  `id` int(11) NOT NULL,
  `propos` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parametres`
--

INSERT INTO `parametres` (`id`, `propos`, `facebook`, `twitter`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'Parapharmacie discount en ligne vous proposant des prix bas toute l\'année sur de très nombreux produits de soin, de santé, de beauté, et de bien-être ! Notre importante sélection de produits de grandes marques de parapharmacie permet à chacun de trouver le produit qu’il recherche à un prix discount et accessible au plus grand nombre. En effet, adhérant à la charte qualité et clarté OMNIPHAR, groupement de pharmacies et plateforme d’achat privé de plusieurs pharmaciens associés, Santédiscount met tout en œuvre pour vous faire bénéficier de petits prix, directement négociés auprès des laboratoires fabricants.', 'parapharmacie', 'parapharmacie', 'parapharmacie', '2021-06-11 16:10:13', '2021-06-17 10:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(90) NOT NULL,
  `marque` varchar(90) NOT NULL,
  `description` text NOT NULL,
  `prix_achat` float NOT NULL,
  `quantite` int(11) NOT NULL,
  `code_barre` varchar(90) NOT NULL,
  `image` varchar(90) DEFAULT NULL,
  `fournisseur` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employe` int(11) DEFAULT NULL,
  `prix_vente` double NOT NULL,
  `statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `marque`, `description`, `prix_achat`, `quantite`, `code_barre`, `image`, `fournisseur`, `categorie`, `created_at`, `updated_at`, `employe`, `prix_vente`, `statut`) VALUES
(4, 'creme oriflame', 'ttt', 'hello', 44, 123, '1234567', '1623518688.png', 3, 2, NULL, '2021-06-18 08:30:49', 7, 133, 0),
(5, 'nivea', 'nivea', 'dfsd', 34, 380, '654321', '1622630843.jpg', 1, 3, NULL, '2021-06-12 16:27:26', 7, 60, 0),
(6, 'creme', 'nivea', 'nivea', 100, 1200, '123456', '1623518725.jpg', 1, 2, '2021-06-08 12:15:00', '2021-06-18 08:40:31', 7, 150, 1),
(7, 'GPH SPIRULINE POUDRE', 'spiruline', 'Contient plus de 60 substances nutritives vitales', 100, 36, '99999', '1623166848.jpg', 1, 1, '2021-06-08 14:40:48', '2021-06-18 08:06:00', 7, 190, 0),
(8, 'mohamed mechdoud', 'gdfgdf', 'gdfgdf', 100, 53, '111111', '1623663457.png', 1, 1, '2021-06-14 08:37:37', '2021-06-18 08:44:05', 7, 1000, 1),
(10, 'mohamed mechdoud', 'gdfgdf', 'gdfgdfgdf', 5534, 1, '1234563', '1623663683.png', 1, 1, '2021-06-14 08:41:23', '2021-06-17 09:44:43', 7, 1000, 1),
(12, 'mohammed mechdoud', 'gdfgdf', 'gdfgdf', 100, 10, '122122', '1623664074.png', 1, 1, '2021-06-14 08:47:54', '2021-06-14 08:47:54', 1, 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohamed mechdoud', 'admin@admin.com', NULL, '$2y$10$3A6ZJjd5KQGWr.ISbej4f.eO4A.8DpU0j4hZ85Ro7A0kc5wxQneWC', '2yxK2mwb14azSrofjoFEps9fs6gMXnncicSopXTUP56OzLRSkm1OhSvkOQDB', '2021-05-28 07:37:51', '2021-05-28 07:37:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_employ` (`employe`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_client` (`client`),
  ADD KEY `fk_empl` (`employe`);

--
-- Indexes for table `detailcommandes`
--
ALTER TABLE `detailcommandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produit` (`produit`),
  ADD KEY `fk_comm` (`commande`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parametres`
--
ALTER TABLE `parametres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_four` (`fournisseur`),
  ADD KEY `fk_cat` (`categorie`),
  ADD KEY `fk_employe` (`employe`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detailcommandes`
--
ALTER TABLE `detailcommandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parametres`
--
ALTER TABLE `parametres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `charges`
--
ALTER TABLE `charges`
  ADD CONSTRAINT `fk_employ` FOREIGN KEY (`employe`) REFERENCES `employes` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`client`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailcommandes`
--
ALTER TABLE `detailcommandes`
  ADD CONSTRAINT `fk_comm` FOREIGN KEY (`commande`) REFERENCES `commandes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produit` FOREIGN KEY (`produit`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employe` FOREIGN KEY (`employe`) REFERENCES `employes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_four` FOREIGN KEY (`fournisseur`) REFERENCES `fournisseurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

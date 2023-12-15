-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Дек 15 2023 г., 10:08
-- Версия сервера: 8.2.0
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kr_dpss`
--

-- --------------------------------------------------------

--
-- Структура таблицы `announcement`
--

CREATE TABLE `announcement` (
  `id` bigint UNSIGNED NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `announcement_translatable`
--

CREATE TABLE `announcement_translatable` (
  `id` bigint UNSIGNED NOT NULL,
  `announcement_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Події', NULL, NULL),
(2, 'Відеосюжети', NULL, NULL),
(3, 'Анонси', NULL, NULL),
(4, 'Новини', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `content_editor`
--

CREATE TABLE `content_editor` (
  `id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `header`
--

CREATE TABLE `header` (
  `id` bigint UNSIGNED NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `header`
--

INSERT INTO `header` (`id`, `image_url`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'dsfdnjshbsfbhdsf.jpg', 'kjbsdfhbdshbfsd', 'jifhudsfhusdhufs', '2023-12-15 12:07:52', '2023-12-15 12:07:52');

-- --------------------------------------------------------

--
-- Структура таблицы `links`
--

CREATE TABLE `links` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `page_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_items`
--

INSERT INTO `menu_items` (`id`, `title`, `url`, `parent_id`, `created_at`, `updated_at`, `deleted_at`, `page_type`) VALUES
(1, 'Про управління', '/pro_upravlinnia', NULL, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(2, 'Про Головне управління', '/pro_golovne_upravlinnia', 1, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(3, 'Структура', '/struktura', 1, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(4, 'Розпорядок роботи', '/rozporiadok_roboti', 1, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(5, 'Профспілкова організація', '/profspilkova_organizaciia', 1, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(6, 'Колективний договір', '/kolektivnii_dogovir', 5, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(7, 'Бланк заяви для вступу', '/blank_zaiavi_dlia_vstupu', 5, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(8, 'Кадрова політика', '/kadrova_politika', 1, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(9, 'Вакансії', '/vakansiyi', 8, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(10, 'Конкурс - вакансії', '/konkurs_vakansiyi', 8, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(11, 'Зразки документів', '/zrazki_dokumentiv', 8, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(12, 'Інформація про втрачені посвідчення', '/informaciia_pro_vtraceni_posvidcennia', 8, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(13, 'Результати конкурсів', '/rezultati_konkursiv', 8, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(14, 'Очищення влади', '/ocishhennia_vladi', 1, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(15, 'Державні установи (лабораторії, лікарні) ветеринарної медицини', '/derzavni_ustanovi_laboratoriyi_likarni_veterinarnoyi_medicini', 1, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(16, 'Вартість послуг', 'http://zakon2.rada.gov.ua/laws/show/z0381-13/paran4#n4', 15, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'link'),
(17, 'Кіровоградська регіональна державналабораторія ветеринарної медицини', 'http://vetlabkr.pp.ua', 1, '2023-11-23 11:15:11', '2023-11-29 14:24:01', NULL, 'link'),
(18, 'Діяльність', '/diialnist', NULL, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(19, 'Суб\'єктам господарювання', '/subjektam_gospodariuvannia', 18, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(20, 'Декларації малих виробництв виноробної продукції', '/deklaraciyi_malix_virobnictv_vinorobnoyi_produkciyi', 19, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(21, 'Внутрішній аудит', '/vnutrisnii_audit', 18, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(22, 'Планування діяльності', '/planuvannia_diialnosti', 21, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(23, 'Оперативний план діяльності Держпродспоживслужби\nз внутрішнього аудиту на 2020 рік', '/operativnii_plan_diialnosti_derzprodspozivsluzbi_z_vnutrisnyogo_auditu_na_2020_rik', 22, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(24, 'Стратегічний план діяльності Держпродспоживслужби\n         з внутрішнього аудиту на 2019 - 2021 роки (із змінами)', '/strategicnii_plan_diialnosti_derzprodspozivsluzbi_z_vnutrisnyogo_auditu_na_2019_2021_roki_iz_zminami', 22, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(25, 'План діяльності з внутрішнього аудиту в\n        Держпродспоживслужби та її територіальних\n        органах на ІІ півріччя 2018 року', '/plan_diialnosti_z_vnutrisnyogo_auditu_v_derzprodspozivsluzbi_ta_yiyi_teritorialnix_organax_na_ii_pivriccia_2018_roku', 22, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(26, 'Основні напрямки діяльності', '/osnovni_napriamki_diialnosti', 21, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(27, 'Декларація внутрішнього аудиту', '/deklaraciia_vnutrisnyogo_auditu', 26, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(28, 'Перелік нормативно-правових актів', '/perelik_normativno_pravovix_aktiv', 21, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(29, 'Оцінювання службової діяльності посадових осіб', '/ociniuvannia_sluzbovoyi_diialnosti_posadovix_osib', 18, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(30, 'Закупівлі', '/zakupivli', 18, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(31, 'Плани та звіти про виконання', '/plani_ta_zviti_pro_vikonannia', 18, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(32, 'Система енергетичного менеджменту', '/sistema_energeticnogo_menedzmentu', 18, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(33, 'Публічна інформація', '/publicna_informaciia', NULL, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(34, 'Перелік відомостей, що містить службову інформацію', '/perelik_vidomostei_shho_mistit_sluzbovu_informaciiu', 33, '2023-11-23 11:15:11', '2023-11-23 11:15:11', NULL, 'post'),
(35, 'Інформація про використання бюджетних коштів', '/informaciia_pro_vikoristannia_biudzetnix_kostiv', 33, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(36, 'Про стан розгляду запитів на публічну інформацію', '/pro_stan_rozgliadu_zapitiv_na_publicnu_informaciiu', 33, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(37, 'Доступ до публічної інформації', '/dostup_do_publicnoyi_informaciyi', 33, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(38, 'Нормативно-правова база', '/normativno_pravova_baza', 37, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(39, 'Форма запиту на публічну інформацію', '/forma_zapitu_na_publicnu_informaciiu', 37, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(40, 'Зв\'язки з громадськістю', '/zviazki_z_gromadskistiu', NULL, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(41, 'Суб\'єктам господарювання', '/subjektam_gospodariuvannia', 40, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(42, 'Залишити звернення', '/zalisiti_zvernennia', 40, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(43, 'Аналіз звернень громадян', '/analiz_zvernen_gromadian', 40, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(44, 'СТОП корупція', '/stop_korupciia', NULL, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(45, 'Запобігання проявам корупції', '/zapobigannia_proiavam_korupciyi', 44, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(46, 'Нормативно-правова база', '/normativno_pravova_baza', 44, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(47, 'Планування діяльності', '/planuvannia_diialnosti', 44, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(48, 'Декларування', '/deklaruvannia', 44, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(49, 'Повідом про корупцію', '/povidom_pro_korupciiu', 44, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(50, 'У воєнний час', '/u_vojennii_cas', NULL, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(51, 'Напрямки', '/napriamki', NULL, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(52, 'Контроль за цінами', '/kontrol_za_cinami', 51, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(53, 'В умовах воєнного стану', '/v_umovax_vojennogo_stanu', 52, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(54, 'Заходи щодо стабілізації цін (COVID-19)', '/zaxodi_shhodo_stabilizaciyi_cin_covid_19', 52, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(55, 'Основні напрямки діяльністі', '/osnovni_napriamki_diialnisti', 52, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(56, 'Державний контроль за регульованими цінами', '/derzavnii_kontrol_za_regulyovanimi_cinami', 52, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(57, 'Актуальна інформація', '/aktualna_informaciia', 52, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(58, 'Фітосанітарна безпека, насінництво та розсадництво', '/fitosanitarna_bezpeka_nasinnictvo_ta_rozsadnictvo', 51, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(59, 'Основні напрямки діяльності', '/osnovni_napriamki_diialnosti', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(60, 'Пам\'ятки', '/pamiatki', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(61, 'Перелік нормативно-правових актів', '/perelik_normativno_pravovix_aktiv', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(62, 'Довідники', '/dovidniki', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(63, 'Наказ перелік регульованих шкідливих організмів', '/nakaz_perelik_regulyovanix_skidlivix_organizmiv', 62, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(64, 'Переліки шкідливих організмів А1 та А2 ЄОКЗР', '/pereliki_skidlivix_organizmiv_a1_ta_a2_jeokzr', 62, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(65, 'Фітосанітарний моніторинг і прогноз', '/fitosanitarnii_monitoring_i_prognoz', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(66, 'Фітосанітарні вимоги країн імпортерів', '/fitosanitarni_vimogi_krayin_importeriv', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(67, 'Адміністративні послуги', '/administrativni_poslugi', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(68, 'Перелік тестових питань та варіанти відповідей\n        для проходження тестування осіб, діяльність яких пов’язана з транспортуванням,\n        зберіганням, застосуванням, торгівлею пестицидами', '/perelik_testovix_pitan_ta_varianti_vidpovidei_dlia_proxodzennia_testuvannia_osib_diialnist_iakix_poviazana_z_transportuvanniam_zberiganniam_zastosuvanniam_torgivleiu_pesticidami', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(69, 'Фітосанітарний стан області', '/fitosanitarnii_stan_oblasti', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(70, 'Розпорядження про запровадження\n         або скасування карантинного режиму, у тому числі переліку територій,\n         на яких запроваджено карантинний режим', '/rozporiadzennia_pro_zaprovadzennia_abo_skasuvannia_karantinnogo_rezimu_u_tomu_cisli_pereliku_teritorii_na_iakix_zaprovadzeno_karantinnii_rezim', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(71, 'Бланки фітосанітарних документів та заяв', '/blanki_fitosanitarnix_dokumentiv_ta_zaiav', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(72, 'Заява на оформлення фітосанітарного сертифіката,\n        фітосанітарного сертифіката на реекспорт, карантинного сертифіката', '/zaiava_na_oformlennia_fitosanitarnogo_sertifikata_fitosanitarnogo_sertifikata_na_reeksport_karantinnogo_sertifikata', 71, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(73, 'Заява на обстеження КНР', '/zaiava_na_obstezennia_knr', 71, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(74, 'Фітосанітарний сертифікат', '/fitosanitarnii_sertifikat', 71, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(75, 'Заява про встановлення статусу вільних ділянок', '/zaiava_pro_vstanovlennia_statusu_vilnix_dilianok', 71, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(76, 'Карантинний сертифікат', '/karantinnii_sertifikat', 71, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(77, 'Заява про проведення перевірки та реєстрацію особи', '/zaiava_pro_provedennia_perevirki_ta_rejestraciiu_osobi', 71, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(78, 'Заява на проведення фітосанітарних процедур', '/zaiava_na_provedennia_fitosanitarnix_procedur', 71, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(79, 'Рекомендації щодо торгівлі насінням', '/rekomendaciyi_shhodo_torgivli_nasinniam', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(80, 'Перелік лабораторій з визначення посівних якостей насіння', '/perelik_laboratorii_z_viznacennia_posivnix_iakostei_nasinnia', 58, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(81, 'Харчові продукти та ветеринарна медицина', '/xarcovi_produkti_ta_veterinarna_medicina', 51, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(82, 'Основні напрямки діяльності', '/osnovni_napriamki_diialnosti', 81, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(83, 'Перелік нормативно-правових актів', '/perelik_normativno_pravovix_aktiv', 81, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(84, 'Пам\'ятки', '/pamiatki', 81, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(85, 'Реєстри', '/rejestri', 81, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(86, 'Заява про державну реєстрацію потужності з додатком', '/zaiava_pro_derzavnu_rejestraciiu_potuznosti_z_dodatkom', 85, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(87, 'Звіти', '/zviti', 81, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(88, 'Рішення щодо вжитих заходів за результатами державного нагляду', '/risennia_shhodo_vzitix_zaxodiv_za_rezultatami_derzavnogo_nagliadu', 81, '2023-11-23 11:15:12', '2023-11-23 11:15:12', NULL, 'post'),
(89, 'Повідомлення', '/povidomlennia', 81, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(90, 'Адміністративні послуги', '/administrativni_poslugi', 81, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(91, 'Повідомлення системи швидкого оповіщення\n        щодо харчових продуктів та кормів RASFF', '/povidomlennia_sistemi_svidkogo_opovishhennia_shhodo_xarcovix_produktiv_ta_kormiv_rasff', 81, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(92, 'Санітарно-епідеміологічний нагляд', '/sanitarno_epidemiologicnii_nagliad', 51, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(93, 'Основні напрямки діяльності', '/osnovni_napriamki_diialnosti', 92, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(94, 'Державний нагляд (контроль)', '/derzavnii_nagliad_kontrol', 92, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(95, 'Перелік нормативно-правових актів', '/perelik_normativno_pravovix_aktiv', 92, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(96, 'Адміністративні послуги', '/administrativni_poslugi', 92, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(97, 'Матеріали семінарів', '/materiali_seminariv', 92, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(98, 'Пам\'ятки', '/pamiatki', 92, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(99, 'Актуальна інформація щодо проведення державної\n        санітарно-епідеміологічної експертизи', '/aktualna_informaciia_shhodo_provedennia_derzavnoyi_sanitarno_epidemiologicnoyi_ekspertizi', 92, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(100, 'Захист прав споживачів', '/zaxist_prav_spozivaciv', 51, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(101, 'Анонси', '/anonsi', 100, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(102, 'Консультаційний центр', '/konsultaciinii_centr', 100, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(103, 'Основні напрямки діяльності', '/osnovni_napriamki_diialnosti', 100, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(104, 'Державний нагляд (контроль)', '/derzavnii_nagliad_kontrol', 100, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(105, 'Перелік нормативно-правових актів', '/perelik_normativno_pravovix_aktiv', 100, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(106, 'Бланки заяв', '/blanki_zaiav', 100, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(107, 'Судова практика', '/sudova_praktika', 100, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(108, 'Ринковий нагляд', '/rinkovii_nagliad', 100, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(109, 'Щодо здійснення державного ринкового нагляду', '/shhodo_zdiisnennia_derzavnogo_rinkovogo_nagliadu', 108, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(110, 'Перелік нормативно-правових актів', '/perelik_normativno_pravovix_aktiv', 108, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(111, 'Пам\'ятки', '/pamiatki', 108, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(112, 'Технічний регламент', '/texnicnii_reglament', 108, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(113, 'Метрологічний нагляд', '/metrologicnii_nagliad', 100, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(114, 'Презентаційний звіт управління захисту споживачів', '/prezentaciinii_zvit_upravlinnia_zaxistu_spozivaciv', 100, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(115, 'Реєстрація сільськогосподарської техніки', '/rejestraciia_silskogospodarskoyi_texniki', 51, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(116, 'Перелік нормативно-правових актів', '/perelik_normativno_pravovix_aktiv', 115, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(117, 'Прийом документів', '/priiom_dokumentiv', 115, '2023-11-23 11:15:13', '2023-11-23 11:15:13', NULL, 'post'),
(118, 'Новини', '/novini', 115, '2023-11-23 11:15:13', '2023-11-28 17:25:01', NULL, 'post');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_10_04_115514_create_moonshine_roles_table', 1),
(6, '2020_10_05_173148_create_moonshine_tables', 1),
(7, '2022_12_19_115549_create_moonshine_socialites_table', 1),
(8, '2023_01_19_171805_create_seo_table', 1),
(9, '2023_01_20_173629_create_moonshine_user_permissions_table', 1),
(10, '2023_11_17_141129_create_news_table', 1),
(11, '2023_11_17_141341_create_announcement_table', 1),
(12, '2023_11_17_141910_create_zviazky-z-hromadskistiu_table', 1),
(13, '2023_11_17_145140_create_menu_items_table', 1),
(14, '2023_11_17_191102_create_pages_table', 1),
(15, '2023_11_22_133449_create_events_table', 1),
(16, '2023_11_22_133502_create_video_stories_table', 1),
(17, '2023_11_22_134136_create_news_translatable_table', 1),
(18, '2023_11_23_100636_add_delete_column_for_menu', 1),
(19, '2023_11_23_131046_add_column_type_to_menu', 1),
(20, '2023_11_23_190842_create_links_table', 1),
(21, '2023_11_23_225335_create_translate_announcement_table', 1),
(22, '2023_11_24_171913_create_table_content_editor', 1),
(23, '2023_11_26_163009_create_tags_table', 1),
(24, '2023_11_26_165722_create_taggable_table', 1),
(25, '2023_11_26_170843_add_column_slug_to_events', 1),
(26, '2023_12_13_163242_create_categories_table', 1),
(27, '2023_12_13_164418_create_posts_table', 1),
(28, '2023_12_14_175248_create_header_table', 1),
(29, '9999_12_20_173629_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_socialites`
--

CREATE TABLE `moonshine_socialites` (
  `id` bigint UNSIGNED NOT NULL,
  `moonshine_user_id` bigint UNSIGNED NOT NULL,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_users`
--

CREATE TABLE `moonshine_users` (
  `id` bigint UNSIGNED NOT NULL,
  `moonshine_user_role_id` bigint UNSIGNED NOT NULL DEFAULT '1',
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `moonshine_users`
--

INSERT INTO `moonshine_users` (`id`, `moonshine_user_role_id`, `email`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'pasha@test.com', '$2y$12$RK8dwl66uwxebiVm/NCuVu5eQGia1sx0BZPEfIAXuVceR1PqneT0.', 'pasha@test.com', NULL, NULL, '2023-12-14 18:16:13', '2023-12-14 18:16:13');

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_user_permissions`
--

CREATE TABLE `moonshine_user_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `moonshine_user_id` bigint UNSIGNED NOT NULL,
  `permissions` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_user_roles`
--

CREATE TABLE `moonshine_user_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `moonshine_user_roles`
--

INSERT INTO `moonshine_user_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-12-14 18:14:17', '2023-12-14 18:14:17');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `news_translatable`
--

CREATE TABLE `news_translatable` (
  `id` bigint UNSIGNED NOT NULL,
  `news_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
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
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `seo`
--

CREATE TABLE `seo` (
  `id` bigint UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `taggables`
--

CREATE TABLE `taggables` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `taggable_id` bigint UNSIGNED NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `video_stories`
--

CREATE TABLE `video_stories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `zviazku_z_hromadskistu`
--

CREATE TABLE `zviazku_z_hromadskistu` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `announcement_translatable`
--
ALTER TABLE `announcement_translatable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `announcement_locale` (`announcement_id`,`locale`),
  ADD KEY `announcement_translatable_locale_index` (`locale`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `content_editor`
--
ALTER TABLE `content_editor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_parent_id_foreign` (`parent_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moonshine_socialites`
--
ALTER TABLE `moonshine_socialites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `moonshine_socialites_driver_identity_unique` (`driver`,`identity`);

--
-- Индексы таблицы `moonshine_users`
--
ALTER TABLE `moonshine_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `moonshine_users_email_unique` (`email`),
  ADD KEY `moonshine_users_moonshine_user_role_id_foreign` (`moonshine_user_role_id`);

--
-- Индексы таблицы `moonshine_user_permissions`
--
ALTER TABLE `moonshine_user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moonshine_user_roles`
--
ALTER TABLE `moonshine_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_translatable`
--
ALTER TABLE `news_translatable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_locale` (`news_id`,`locale`),
  ADD KEY `news_translatable_locale_index` (`locale`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seo_url_unique` (`url`);

--
-- Индексы таблицы `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taggables_tag_id_foreign` (`tag_id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `video_stories`
--
ALTER TABLE `video_stories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zviazku_z_hromadskistu`
--
ALTER TABLE `zviazku_z_hromadskistu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `announcement_translatable`
--
ALTER TABLE `announcement_translatable`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `content_editor`
--
ALTER TABLE `content_editor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `header`
--
ALTER TABLE `header`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `moonshine_socialites`
--
ALTER TABLE `moonshine_socialites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `moonshine_users`
--
ALTER TABLE `moonshine_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `moonshine_user_permissions`
--
ALTER TABLE `moonshine_user_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `moonshine_user_roles`
--
ALTER TABLE `moonshine_user_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `news_translatable`
--
ALTER TABLE `news_translatable`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `video_stories`
--
ALTER TABLE `video_stories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `zviazku_z_hromadskistu`
--
ALTER TABLE `zviazku_z_hromadskistu`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `announcement_translatable`
--
ALTER TABLE `announcement_translatable`
  ADD CONSTRAINT `announcement_translatable_announcement_id_foreign` FOREIGN KEY (`announcement_id`) REFERENCES `announcement` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `moonshine_users`
--
ALTER TABLE `moonshine_users`
  ADD CONSTRAINT `moonshine_users_moonshine_user_role_id_foreign` FOREIGN KEY (`moonshine_user_role_id`) REFERENCES `moonshine_user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news_translatable`
--
ALTER TABLE `news_translatable`
  ADD CONSTRAINT `news_translatable_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

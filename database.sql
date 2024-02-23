CREATE TABLE IF NOT EXISTS `users`
(
    `id`         smallint unsigned NOT NULL AUTO_INCREMENT,
    `name`       varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `email`      varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `password`   char(70) COLLATE utf8mb4_general_ci    DEFAULT NULL,
    `country`       varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `social_media_url` varchar(100) null,
    `state`      varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    unique (`email`)
);
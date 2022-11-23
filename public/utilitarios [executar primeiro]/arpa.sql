CREATE SCHEMA arpanet DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO `arpanet`.`users` (`name`, `email`, `password`, `tipo`, `created_at`, `updated_at`)
VALUES ('root', 'root@outlook.com', '$2y$10$IFRVH0.rUGzyKFPTX/z7kuSxbm4bq1eSQXh3GS20CEO7DN09oUVDm', 'admin', '2022-11-23 21:34:44', '2022-11-23 21:34:44');


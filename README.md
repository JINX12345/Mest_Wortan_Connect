Create users table: 

CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

Create staff_profiles Table:

CREATE TABLE `staff_profiles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `role` VARCHAR(255) NOT NULL,
  `interests` TEXT NOT NULL,
  `image_url` VARCHAR(255) NOT NULL,
  `upvotes` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
);

Create upvotes table:

CREATE TABLE `upvotes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `staff_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`staff_id`) REFERENCES `staff_profiles`(`id`)
);



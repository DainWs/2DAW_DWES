/**
 * This sql file create a user identified by 'tienda' and with password 'tienda'.
 * IMPORTANT!! this user is optional and not necessary.
 */
CREATE USER 'biblioteca' IDENTIFIED BY 'biblioteca';
GRANT ALL PRIVILEGES ON biblioteca.* TO 'biblioteca';
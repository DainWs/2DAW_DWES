/**
 * This sql file create a user identified by 'tienda' and with password 'tienda'.
 * IMPORTANT!! this user is optional and not necessary.
 */
CREATE USER 'tienda' IDENTIFIED BY 'tienda';
GRANT ALL PRIVILEGES ON tienda.* TO 'tienda';
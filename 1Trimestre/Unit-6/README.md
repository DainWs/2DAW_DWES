# Data Base Access - Unit 6

## Connection
Nos conectamos a la base de datos.
```php
$connection = mysqli_connect(DB_DOMAIN, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
```

## Execute SQL Sentences in PHP
Realizamos la consulta
```php
$result = mysqli_query($connection, "SELECT * FROM usuarios");
```

Creamos un array asociativo del resultado de la consulta
```php
$usuarios = mysqli_fetch_assoc($result);
```

## Insert SQL Sentences in PHP
The SQL Sentence
```php
$sql = "INSERT INTO USUARIOS(nombre, apellidos, email, password) VALUES ('Javier', 'Sanchez Rueda', 'javierSanchezRueda@gmail.com', '12345678')";
```

Execute SQL Sentence
```php
$insert = mysqli_query($connection, $sql);
```

If the SQL execution was successfull then
```php
if ($insert) {
    ...
}
```

## Delete SQL Sentences in PHP

The SQL Sentence
```php
$sql = "DELETE FROM USUARIOS WHERE nombre='Javier'";
```

Execute SQL Sentence
```php
$delete = mysqli_query($connection, $sql);
```

If the SQL execution was successfull then
```php
if ($delete) {
    ...
}
```
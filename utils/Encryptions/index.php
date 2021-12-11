<?php

// 'cost'=> 4 numero de veces que se repetira el proceso de incriptacion
$hash = password_hash("hola", PASSWORD_BCRYPT, ['cost'=> 4]);

echo (password_verify("hola", $hash)) ? 'true' : 'false';
echo (password_verify("h0la", $hash)) ? 'true' : 'false';
echo (password_verify("Hola", $hash)) ? 'true' : 'false';
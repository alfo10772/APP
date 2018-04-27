<?php

// juste pour se connecter à la base de donées

$pdo = new PDO('mysql:dbname=test; host=localhost','root','');

$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // quand on a une erreur, on a une exception dans PDO::

$pdo ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // change la mise en forme des exceptions ?
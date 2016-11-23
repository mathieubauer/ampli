<?php

$nbLogins = $bdd->query('SELECT count(*) FROM ampli_users WHERE username = "' . $_POST['username'] . '"')->fetchColumn();

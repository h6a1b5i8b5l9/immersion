<?php

function set_any_row($pdo, $id, ...$parameters) {
    foreach ($parameters as $key => $value) {
    $sql = "UPDATE users SET :key=:value WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['key'=>$key, 'value'=>$value, 'id' => $id]);
}
}
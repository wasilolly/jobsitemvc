<?php 

echo 'This is the index view';
foreach ($data['users'] as $user) {
    echo "Information: ".$user->name;
    echo "<br>";
}
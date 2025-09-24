<?php

function listGenres() {

    $genres = getAllGenres();

    include __DIR__ ."/../../templates/genres/list_genres.php";
}
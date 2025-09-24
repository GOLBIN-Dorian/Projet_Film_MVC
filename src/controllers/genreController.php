<?php

function listeGenres() {

    $genres = getAllGenres();

    include __DIR__ ."/../../templates/genres/liste_genres.php";
}


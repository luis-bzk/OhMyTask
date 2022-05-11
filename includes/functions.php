<?php

function debug($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// sintetize HTML
function sanitize($html): string
{
    return htmlspecialchars($html);
}

// authentification

function isAuth(): void
{
    if (!isset($_SESSION["login"])) {
        header('Location: /');
    }
}

function isSession(): void
{
    if (!isset($_SESSION)) {
        session_start();
    }
}
<?php
session_start();

/**
 * @return bool
 */
function checkUserLoggedIn(): bool {
    return isset($_SESSION['userId']) && $_SESSION['userId'];
}
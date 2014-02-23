<?php
/*
 * Application routes
 */

//A simple GET route
Soba\Route::get("users/:id", "users#show");
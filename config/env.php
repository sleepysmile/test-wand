<?php

// add env
$dotenv = new \Dotenv\Dotenv(dirname(__DIR__), '.env.dist');
$dotenv->load();
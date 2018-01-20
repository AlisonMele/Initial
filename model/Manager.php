<?php

class Manager
{
    protected function dbConnect()
    {    	
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
        
        return $db;
    }
}
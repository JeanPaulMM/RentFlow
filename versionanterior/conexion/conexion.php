<?php
class Conexion
{
	static function conectar()
	{
	   $link = new PDO("mysql:host=localhost;dbname=rentflow",
						"root",
						"");
	   $link->exec("set names utf8");
		return $link;
	}
}
<?php

require("model/Manager.php");

class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
		return $req;
	}
	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}
	public function addPost($title, $content)
	{
		$db = $this->dbConnect();
		$post = $db->prepare('INSERT INTO `posts`(`title`, `content`, `creation_date`) VALUES (?, ?, NOW())');
		$affectedLines = $post->execute(array($title, htmlspecialchars($content)));

		return $affectedLines;
	}
		public function draftCopy($title, $content)
	{
		$db = $this->dbConnect();
		$post = $db->prepare('INSERT INTO `draft`(`title`, `content`, `creation_date`) VALUES (?, ?, NOW())');
		$affectedLines = $post->execute(array($title, $content));

		return $affectedLines;
	}
	/*
		public function editPost()
	{
		$db = $this->dbConnect();
		$post = $db->prepare('UPDATE `posts` SET `title`=:title,`content`=:content,`creation_date`=NOW(),`statut`=[value-5] WHERE 1');
		$post -> bindParam(':title', $title, PDO::PARAM_STR);
		$post -> bindParam(':content', $content, PDO::PARAM_STR);
		$post -> execute();
    	return $post -> fetch();
	}
		public function removePost()
	{
		$db = $this->dbConnect();
		$post = $db->prepare('DELETE FROM `posts` WHERE 1');
		$post -> execute();
    	return $post;
	}
	*/
}

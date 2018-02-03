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
	public function editPost($postId)
	{
		$db = $this->dbConnect();
		$edit_post = $db->prepare('SELECT * FROM`posts`WHERE id = ?');
		$edit_post -> execute(array($postId));
		//$edit_post = $edit_post->fetch();
		return $edit_post;
	}
	public function newPost($title, $content, $id)
	{
		$db = $this->dbConnect();
		$newpost = $db->prepare('UPDATE `posts` SET `title` = ?, `content` = ? WHERE `id` = ?');
		//$newPost = $db->prepare('INSERT INTO `posts`(`id`, `title`, `content`, `creation_date`) VALUES ($postId, ?, NOW())');		//$savePost = $newPost->execute(array($title, htmlspecialchars($content)));	/	
     
		//$newpost -> bindParam(':title', $_POST['title'], PDO::PARAM_STR);
        //$newpost -> bindParam(':content', $_POST['content'], PDO::PARAM_STR);
        //$newPost -> bindParam(':id', $newpostId, PDO::PARAM_STR);
   		//$newpost -> bindParam(':id', $id, PDO::PARAM_STR);
		$newpost -> execute(array($title, $content, $id));
		
		return $newpost;

	}
		public function removePost($postId)
	{
		$db = $this->dbConnect();
		$remove = $db->prepare('DELETE FROM `posts` WHERE id = ?');
		$remove->execute(array($postId));
		
    	return $remove;
	}
}
<?php 

require_once("model/Manager.php");

class CommentManager extends Manager
{
	public function getComment()
	{
		$db = $this->dbConnect();
		$back = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE action = 0 ORDER BY comment_date DESC');
		return $back;
	}
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));
		return $comments;
	}
	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author, $comment));

		return $affectedLines;
	}
	public function removeComment($id)
	{
		$db = $this->dbConnect();
		$remove = $db->prepare('UPDATE `comments` SET `action`= 1 WHERE id= ?');
		$remove->execute(array($id));
		
    	return $remove;
	}
}


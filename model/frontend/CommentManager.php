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
	public function reportComment($id)
	{
		$db = $this->dbConnect();
		$report = $db->prepare('UPDATE `comments` SET `action` = 1 WHERE id= ?'); 
		//for (action >= 0; action <= 50; action++);
		$report->execute(array($id));

		
    	return $report;	
    }
	public function removeComment($id)
	{
		$db = $this->dbConnect();
		$remove = $db->prepare('DELETE FROM`comments` WHERE id= ?');
		$remove->execute(array($id));
		
    	return $remove;
	}
	public function keepComment($id)
	{
		$db = $this->dbConnect();
		$keep = $db->prepare('UPDATE `comments` SET `action`= 0 WHERE id= ?');
		$keep->execute(array($id));
		
    	return $keep;
	}
}


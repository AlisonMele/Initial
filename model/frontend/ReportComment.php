<?php 
require_once('model/Manager.php');

class ReportCommentmodel extends Manager
{


	public function getReport($commentId)
	{
	
		$db = $this->dbConnect();
		$reportComment = $db->query('SELECT `id`, `post_id`, `author`, `comment`, `comment_date` FROM comments WHERE id = commentId');
        $reportComment -> bindParam(':commentId', $commentId, PDO::PARAM_STR);
        $reportComment -> execute();

        return $reportComment->fetchObject('\Manager\ReportComment', array($commentId));
      
	}
	public function reportComment($peudo, $commentId)
	{
		$db = $this->dbConnect();
		$reportComment = $db->prepare('INSERT INTO reportcomments(pseudo, comment_id, report_date) VALUES (:pseudo, :commentId, NOW())');
        $reportComment -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $reportComment-> bindParam(':commentId', $commentId, PDO::PARAM_STR);
		$reportComment -> execute();
    	return $reportComment;
	}
	public function listReport($id)
	{
		$db = $this->dbConnect();
		$listReport = $db->prepare('SELECT `comment_id` FROM `reportcomments` GROUP BY `comment_id` HAVING COUNT(*) > 2');
		$listReport->execute(array($id));
		$listreport = $listReport->fetch();
		return $listreport;
	}
	public function listComment($commentId)
	{
		$db = $this->dbConnect();
		$listComment = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') FROM `comments` WHERE `id` = ? AND action = 0');
		$listComment->bindParam(':commentId', $commentId, PDO::PARAM_STR);  
		$listcomment=$listComment->execute(array($commentId));


		return $listcomment;
	}
	public function startReport($commentId)
	{
		$db = $this->dbConnect();
		$startReport = $db->prepare('UPDATE `reportcomments` SET `traitement`= 1 WHERE id = comment_id'); 
		$startreport=$startReport->execute(array($commentId));


		return $startreport;
	}

}

//SELECT `id` FROM `comments` WHERE EXISTS ( SELECT `comment_id` FROM `reportcomments` GROUP BY `comment_id` HAVING COUNT(*) > 2 )
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
    	return $reportComment -> fetch();
	}
	public function listReport()
	{
		$db = $this->dbConnect();
		$listReport = $db->prepare('SELECT * FROM `reportcomments` HAVING COUNT (`comment_id`) > 9');
		$listReport->execute();
		return $listReport ->fetch();
	}
}

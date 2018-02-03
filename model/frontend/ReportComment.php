<?php 
require_once('model/Manager.php');

class ReportCommentmodel extends Manager
{
		public function getReport()
	{
	
		$db = $this->dbConnect();
		$reportComment = $db->query('SELECT `id`, `post_id`, `author`, `comment`, `comment_date` FROM comments WHERE action = 1');
        $reportComment -> execute();
     
        return $reportComment;
      
	}

	public function startReport($commentId)
	{
		$db = $this->dbConnect();
		$startReport = $db->prepare('UPDATE `comments` SET `action`= 0 WHERE id = ?'); 
		$startreport=$startReport->execute(array($commentId));


		return $startreport;
	}
}

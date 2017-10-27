<?php
namespace src\Assignment;

require_once 'IAssignmentRepository.php';
require_once 'Assignment.php';
date_default_timezone_set('America/Chicago');

class SQLiteAssignmentRepo implements IAssignmentRepository {
	private $dbfile = 'assignment_db_pdo.sqlite';
	private $db;

	public function __construct(){
		$this->db = new \PDO('sqlite:' . $this->dbfile);
		$this->db->exec("
			CREATE TABLE IF NOT EXISTS Assignments (ID INTEGER PRIMARY KEY AUTOINCREMENT, ClassName TEXT, AssignmentName TEXT, DueDate TEXT)");
	}

	public function saveAssignment($assignment){
		if ($assignment->getID() != '') {
			// Update Assignment
			$stmh = $this->db->prepare('UPDATE Assignments 
				SET ClassName = :class, AssignmentName = :assignmentName, DueDate = :dueDate 
				WHERE ID = :id');
			$stmh->bindValue(':id', $assignment->getID());
			$stmh->bindValue(':class', $assignment->getClass());
			$stmh->bindValue(':dueDate', $assignment->getDueDate());
			$stmh->bindValue(':assignmentName', $assignment->getAssignmentName());
			$stmh->execute();
		} else {
			// Insert New Assignment
			$stmh = $this->db->prepare("INSERT INTO Assignments (ClassName, AssignmentName, DueDate)
				VALUES (:class, :assignmentName, :dueDate)"); 
			$stmh->bindValue(':class', $assignment->getClass());
			$stmh->bindValue(':assignmentName', $assignment->getAssignmentName());
			$stmh->bindValue(':dueDate', $assignment->getDueDate());
			$stmh->execute();
			var_dump($stmh);
		}
	}

	public function getAllAssignments(){
		$assignmentList = array();
		$result = $this->db->prepare('SELECT * FROM Assignments');
//		while ($result as $row) {
//			$anAssignment->getClass($row['ClassName']);
//			$anAssignment->getAssignmentName($row['AssignmentName']);
//			$anAssignment->getDueDate($row['DueDate']);
//			$assignmentList[$anAssignment->getID()] = $anAssignment;
//		}
		return $assignmentList;
	}

	public function getAssignmentByID(){
		$stmh = $this->db->prepare("SELECT * from Assignments WHERE ID = :id");
		$sid = intval($id);
		$stmh->bindParam(':id', $sid);
		$stmh->execute();
		$stmh->setFetchMode(\PDO::FETCH_ASSOC);

		if ($row = $stmh->fetch()) {
			$anAssignment = new Assignment();
			$anAssignment->getClass($row['ClassName']);
			$anAssignment->getAssignmentName($row['AssignmentName']);
			$anAssignment->getDueDate($row['DueDate']);
			return $anAssignment;
		} else {
			return new Assignment();
		}
		
	}

	public function deleteAssignment(){
		$stmh = $this->db->prepare("DELETE FROM Assignments WHERE  IS = :id");
		$stmh->bindValue(':id', intval($assignmentID));
		$stmh->execute();
	}
}
?>
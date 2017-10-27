<?php
namespace src\Assignment;

interface IAssignmentRepository{
	public function saveAssignment($assignment);
	public function getAllAssignments();
	public function getAssignmentByID();
	public function deleteAssignment();
}
?>
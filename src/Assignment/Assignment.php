<?php
namespace src\Assignment;

#Assignment Object
class Assignment{
	private $id = ''; // Integer/String
	private $class = ''; // String
	private $assignmentName = ''; // String
	private $dateDue = ''; // Date

	/**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass($title)
    {
        $this->class = $class;
    }

    /**
     * @return string
     */
    public function getAssignmentName()
    {
        return $this->assignmentName;
    }

    /**
     * @param string $assignment
     */
    public function setAssignmentName($title)
    {
        $this->assignmentName = $assignmentName;
    }

    /**
     * @return string
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param string $dueDate
     */
    public function setDueDate($title)
    {
        $this->dueDate = $dueDate;
    }
}
?>
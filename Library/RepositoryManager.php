<?php 
	
namespace Library;

class RepositoryManager
{
	private $pdo;
	private $repositories = array();

	public function setPDO(\PDO $pdo)
	{
		$this->pdo = $pdo;

		return $this;
	}

	public function getRepository($entity) //entity means object
	{
		if (empty($this->repositories[$entity])) {
			$repository = "\\Model\\Repository\\{$entity}Repository"; //'Book' => BookReposiory
			$repository = new $repository(); // new BookReposiory();
			$repository->setPDO($this->pdo);
			$this->repositories[$entity] = $repository;
		}

		return $this->repositories[$entity];
	}
}
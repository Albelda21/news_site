<?php 

namespace Model\Repository;

use Library\EntityRepository;
use Model\News; 


class NewsRepository extends EntityRepository
{
	
	public function findAllSport()
	{
		$sth = $this->pdo->query('Select * from news where type_id=2');
		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$sport = (new News())
				->setId($row['id'])
				->setTitle($row['title'])
				->setBody($row['body'])
				// ->setPrice($row['price'])
				// ->setIsActive($row['is_active'])
				// ->setStyle($row['style_id'])
				;
				$sports[] = $sport;


		}
		return $sports;
	}

	// public function findActive()
	// {
	// 	$pdo = DbConnection::getInstance()->getPdo();
	// 	$sth = $pdo->query('select * from book where is_active=1');
	// 	while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
	// 		$book = (new Book())
	// 			->setId($row['id'])
	// 			->setTitle($row['title'])
	// 			->setDescription($row['description'])
	// 			->setPrice($row['price'])
	// 			->setIsActive($row['is_active'])
	// 			->setStyle($row['style_id'])
	// 			;
	// 			$books[] = $book;

	// 	}
	// 	return $books;


	public function findAllPolitic()
	{
		$sth = $this->pdo->query('Select * from news where type_id=1');
		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$politic = (new News())
				->setId($row['id'])
				->setTitle($row['title'])
				->setBody($row['body'])
				// ->setPrice($row['price'])
				// ->setIsActive($row['is_active'])
				// ->setStyle($row['style_id'])
				;
				$politics[] = $politic;


		}
		return $politics;
	}

	public function findAllScience()
	{
		$sth = $this->pdo->query('Select * from news where type_id=3');
		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$science = (new News())
				->setId($row['id'])
				->setTitle($row['title'])
				->setBody($row['body'])
				// ->setPrice($row['price'])
				// ->setIsActive($row['is_active'])
				// ->setStyle($row['style_id'])
				;
				$sciences[] = $science;


		}
		return $sciences;
	}

	public function findNumb($limit, $type)
	{
		$sth = $this->pdo->query("Select * from news where type_id=$type order by created desc limit $limit");
		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$science = (new News())
				->setId($row['id'])
				->setTitle($row['title'])
				->setBody($row['body'])
				// ->setPrice($row['price'])
				// ->setIsActive($row['is_active'])
				// ->setStyle($row['style_id'])
				;
				$sciences[] = $science;


		}
		return $sciences;
	}




	}


 ?>
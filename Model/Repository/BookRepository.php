<?php 

namespace Model\Repository;

use Library\EntityRepository;
use Model\Book; 
use Model\Style;

class BookRepository extends EntityRepository
{
	
	public function findAll()
	{
		 //$style = (new Style());
		// $pdo = DbConnection::getInstance()->getPdo();
		$sth = $this->pdo->query('Select * from news');
		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$book = (new News())
				->setId($row['id'])
				->setTitle($row['title'])
				// ->setDescription($row['description'])
				// ->setPrice($row['price'])
				// ->setIsActive($row['is_active'])
				// ->setStyle($row['style_id'])
				//->setStyle((new Style)->setName($row['style_name']))

				;
				$books[] = $book;


		}
		return $books;
	}

	public function findActive()
	{
		$pdo = DbConnection::getInstance()->getPdo();
		$sth = $pdo->query('select * from book where is_active=1');
		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$book = (new Book())
				->setId($row['id'])
				->setTitle($row['title'])
				->setDescription($row['description'])
				->setPrice($row['price'])
				->setIsActive($row['is_active'])
				->setStyle($row['style_id'])
				;
				$books[] = $book;

		}
		return $books;

	}
}

 ?>
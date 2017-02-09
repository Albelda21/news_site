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
		$sth = $this->pdo->query('Select book.id as book_id, style.name as style_name from book join style on book.style_id=style.id ORDER BY `book`.`id` ASC');
		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$book = (new Book())
				->setId($row['book_id'])
				->setImage($row['title'])
				// ->setDescription($row['description'])
				// ->setPrice($row['price'])
				// ->setIsActive($row['is_active'])
				// ->setStyle($row['style_id'])
				->setStyle((new Style)->setName($row['style_name']))

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
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


	public function findNewsByPage($page, $perPage, $type)
	{

		$offset = ($page - 1) * $perPage;
		$sql = "SELECT * FROM news WHERE type_id = {$type} ORDER BY id LIMIT {$offset}, {$perPage}";
		$sth = $this->pdo->query($sql);

		$news = [];

		 while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
            
            $new = (new News())
                ->setId($row['id'])
                ->setTitle($row['title'])
                ->setBody($row['body'])
                // ->setPrice($row['price'])
                // ->setIsActive($row['is_active'])
                // ->setStyle($row['style_id'])
            ;
            
            $news[] = $new;
        }
        return $news;
    }


		// $sth = $this->pdo->query('Select * from news where type_id=1');
		// while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
		// 	$politic = (new News())
		// 		->setId($row['id'])
		// 		->setTitle($row['title'])
		// 		->setBody($row['body'])
		// 		// ->setPrice($row['price'])
		// 		// ->setIsActive($row['is_active'])
		// 		// ->setStyle($row['style_id'])
		// 		;
		// 		$politics[] = $politic;


	// 	}
	// 	return $politics;
	// }

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
				->setImage($row['image'])
				// ->setIsActive($row['is_active'])
				// ->setStyle($row['style_id'])
				;
				$sciences[] = $science;


		}
		return $sciences;
	}

	 public function count($news_type)
    {
        $sql = "SELECT count(*) FROM news WHERE type_id = {$news_type}";
		$sth = $this->pdo->query($sql);
        return (int)$sth->fetchColumn();
    }

      public function find($id)
    {
        $sth = $this->pdo->prepare('select * from news where id = :id');
        $sth->execute(compact('id'));
        $data = $sth->fetch(\PDO::FETCH_ASSOC);
        
        if (!$data) {
            throw new \Exception('not found');
        }
        
        return (new News())
            ->setId($data['id'])
            ->setTitle($data['title'])
            ->setBody($data['body'])
            ->setImage($data['image'])
            ->setCreated($data['created']);
            ;
    }




	}


 ?>
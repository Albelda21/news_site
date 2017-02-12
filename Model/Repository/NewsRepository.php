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
				->setTypeId($row['type_id'])
                ->setImage($row['image'])
				;
				$sports[] = $sport;


		}
		return $sports;
	}


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
                ->setTypeId($row['type_id'])
                ->setImage($row['image'])
               ;
            
            $news[] = $new;
        }
        return $news;
    }

	public function findAllScience()
	{
		$sth = $this->pdo->query('Select * from news where type_id=3');
		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$science = (new News())
				->setId($row['id'])
				->setTitle($row['title'])
				->setBody($row['body'])
				->setTypeId($row['type_id'])
				->setImage($row['image'])
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
				->setTypeId($row['type_id'])
				->setImage($row['image'])
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
            ->setTypeId($data['type_id'])
            
            ;
    }



public function findAll()
	{
		 //$style = (new Style());
		
		$sth = $this->pdo->query('Select * from news');
		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$book = (new News())
				->setId($row['id'])
				->setTitle($row['title'])
				->setBody($row['body'])
				->setTypeId($row['type_id']) // new Type class
				->setImage($row['image'])
				
				//->setStyle((new Style)->setName($row['style_name']))

				;
				$books[] = $book;


		}
		return $books;
	}

	public function findTitle()
	{
		 
		
		$sth = $this->pdo->query('Select title from news');
		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$new = (new News())
					;
				$newss[] = $news;


		}
		return $news;
	}



	}


 ?>
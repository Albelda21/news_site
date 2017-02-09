<?php 

namespace Model\Repository;

use Model\Feedback;
use Library\EntityRepository;

class FeedbackRepository extends EntityRepository
{
	
	public function save($object, $table = null)
	{
		if($table==null) {

			$class = explode('\\', get_class($object)); //Model\Feedback;
		$class = end($class);
		$table = strtolower($class);

		} 
		
		//$pdo = DbConnection::getInstance()->getPdo();
	$sql = "insert into {$table} (name, email, message, ip_address) values (:name, :email, :message, :ip_addres)";	
	$sth = $this->pdo->prepare($sql);
	$sth->execute(array(
		'name' => $object->getName(),
		'email' => $object->getEmail(),
		'message' => $object->getMessage(),
		'ip_addres' => $object->getIpAddress()

		));

	}
}


 ?>
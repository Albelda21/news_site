<?php 

namespace Model;

class Style
{
	private $id;
	private $name;

	/**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}




 ?>
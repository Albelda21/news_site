<?php 

namespace Library;


abstract class Controller 
{

	private $layout = 'default_layout.phtml';
	protected $container;

	public function setContainer(Container $container)
	{
		$this->container = $container;

		return $this;
	}

	protected function render($view, array $args = array())
	{
		extract($args); // ['form' => $form] ==> $form = form!
		$classname = str_replace (['Controller', '\\'],'', get_class($this));
		$file = VIEW_DIR . $classname . DS . $view;
		if (!file_exists($file)) {
			throw new \Exception("Template {$file} not found", 123);
		}
		ob_start();
		require $file;
		$content = ob_get_clean();

		ob_start();
		require VIEW_DIR . $this->layout;
		return ob_get_clean();
	}

	public static function renderError($message, $code)
	{
		ob_start();
		require VIEW_DIR . 'error.phtml';
		$content = ob_get_clean();

		ob_start();
		require VIEW_DIR . 'error.phtml';
		return ob_get_clean();
	}
}

 ?>
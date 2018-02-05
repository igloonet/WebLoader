<?php

namespace WebLoader\Nette;

use WebLoader\Compiler;
use Nette\Utils\Html;

/**
 * JavaScript loader
 *
 * @author Jan Marek
 * @license MIT
 */
class JavaScriptLoader extends WebLoader
{

	/** @var bool */
	private $async;

	/** @var bool */
	private $defer;

	public function __construct(Compiler $compiler, $tempPath, $async = false, $defer = false)
	{
		parent::__construct($compiler, $tempPath);
		$this->async = $async;
		$this->defer = $defer;
	}

	/**
	 * @return bool
	 */
	public function isAsync()
	{
			return $this->async;
	}

	/**
	 * @param bool $async
	 */
	public function setAsync($async)
	{
			$this->async = $async;
	}

	/**
	 * @return bool
	 */
	public function isDefer()
	{
			return $this->defer;
	}

	/**
	 * @param bool $defer
	 */
	public function setDefer($defer)
	{
			$this->defer = $defer;
	}


	/**
	 * Get script element
	 * @param string $source
		 * @return Html
	 */
	public function getElement($source)
	{
		return Html::el("script", ['async' => $this->isAsync(), 'defer' => $this->isDefer()])->type("text/javascript")->src($source);
	}

}

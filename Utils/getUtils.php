<?php
	/**
	 *	@Author: Jose Antonio Duarte Perez 
	 */

	class PostUtils{

		private $arguments = [];

		public function __construct(): void {
			array_push($arguments, ...$_POST);
		}

		public function get($key): String {
			$value = NIL;
			if (key_exists($key, $this->arguments)) {
				$value = $this->arguments[$key];
			}
			return $value;
		}

		function checkArgument($key, $func): object {
			$result = NIL;
			$argument = get($key);
			if ($argument != NIL) {
				$result = $func($argument);
			}
			return $result; ;
		}
 	}
	
	class GetUtils{
		private $arguments = [];

		public function __construct(): void {
			array_push($arguments, ...$_GET);
		}

		public function get($key): String {
			$value = NIL;
			if (key_exists($key, $this->arguments)) {
				$value = $this->arguments[$key];
			}
			return $value;
		}

		function checkArgument($key, $func): object {
			$result = NIL;
			$argument = get($key);
			if ($argument != NIL) {
				$result = $func($argument);
			}
			return $result; ;
		}
	}

	const POST_UTILS = new PostUtils();
	const GET_UTILS = new GetUtils();
?>
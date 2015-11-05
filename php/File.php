<?php
class File 
{
	private $path = '/home/danijel/Documents/www/OS-projekt/files';
	private $fileName;

	function __construct($fileName)
	{
		$this->fileName = $this->path . $fileName;
	}

	public function getFileName()
	{
	      return $this->fileName;
	}

	function WriteFile($string)
	{
		file_put_contents($this->fileName, $string);
	}

	function ReadFile()
	{
		return file_get_contents($this->fileName);
	}

	public static function CleanFiles($files)
	{
		$path = '/home/danijel/Documents/www/OS-projekt/files';
		foreach ($files as $file) 
		{
			fopen($path . $file, 'w');
		}
	}
}
?>
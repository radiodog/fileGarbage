<?php
	namespace App\Controllers;

	use Slim\Views\Twig as View;
	use Slim\Http\Request;
	use Slim\Http\Response;
	use Slim\Http\UploadedFile;

	/**
	* 
	*/
	class HomeController extends Controller
	{
		
		public function index($request,$response)
		{
			//$user = $this->db->table('files')->find(1);
			
			return $this->view->render($response,'home.twig');
		}

		public function upLoad($request,$response)
		{
		    $uploadedFiles = $request->getUploadedFiles();
			$directory = $this->container->get('upload_directory');
    		$uploadedFile = $uploadedFiles['uploadedFile'];
    		
    		if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
    		$filename = $this->moveUploadedFile($directory, $uploadedFile);	
        	$response->write('uploaded ' . $filename . '<br/>');
   			}
/*
			//$directory = $this->get('upload_directory');

    		// handle single input with single file upload
        	//$filename = $this->moveUploadedFile($directory, $uploadedFile);
*/
   		}
   			
   		function moveUploadedFile($directory, UploadedFile $uploadedFile)
		{
			/*


    		return $filename;
    		*/
    		$extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    		$basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
    		$filename = sprintf('%s.%0.8s', $basename, $extension);
    		$uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
    		var_dump($filename);
    		echo "cocy xyu";
    		return 'cocy xyu';
		} 
		
	}
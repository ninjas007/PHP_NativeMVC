<?php 

class App {

	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];

 
 	public function __construct()
 	{
 		$url = $this->parseUrl();

 		// controller
 		// cek file controller yang ada
 		if (file_exists('../app/controllers/'. ucfirst($url[0]). '.php'))
 		{
 			$this->controller = $url[0];
 			unset($url[0]);
 		}

 		require_once '../app/controllers/' . ucfirst($this->controller) . '.php';
 		$this->controller = new $this->controller; // controller udah diganti berdasarkan url

 		// method
 		if(isset($url[1]))
 		{
 			if (method_exists($this->controller, $url[1]))
 			{
 				$this->method = $url[1]; // timpa lagi kalo ada
 				unset($url[1]);
 		 	}

 		 		// params
 		 	if (!empty($url)) 
 		 	{
 		 		$this->params = array_values($url);
 		 	}
 		}

 		// jalankan controller dan method, serta kirimkan params
	 	call_user_func_array([$this->controller, $this->method], $this->params);
 	}

 	public function parseUrl()
 	{
 		
 		if (isset($_GET['url'])) {
 			$url = rtrim($_GET['url'], '/'); // rtrim menghapus tanda slash diakhir url sekali misal home/nama/ jadi home/nama
 			$url = filter_var($url, FILTER_SANITIZE_URL);
 			$url = explode('/', $url);
 			return $url;
 		}
 	}

}


// protected $contoller = 'Home';
// 	protected $method = 'index';
// 	protected $params = [];
 
//  	public function __construct()
//  	{
//  		$url = $this->parseUrl(); // ingat $url sudah jadi string

//  		// controllernya dibuat
//  		if (file_exists('../app/controllers/' . $url[0] . '.php')) {
//  			$this->controller = $url[0];
//  			var_dump($url[0]);
//  			unset($url[0]);
//  		}

//  		require_once '../app/controllers/' . $this->controller . '.php';
//  		$this->controller = new $this->controller; // controller udah diganti berdasarkan url

//  		// method
//  		if(isset($url[1])){
//  			if (method_exists($this->controller, $url[1])) {
//  					$this->method = $url[1]; // timpa lagi kalo ada
//  					unset($url[1]);
//  				}	
//  		}

//  		// params
//  		if (!empty($url)) {
//  			$this->params = array_values($url);
//  		}

//  		// jalankan controller dan method, serta kirimkan params
//  		call_user_func_array([$this->controller, $this->method], $this->params);
//  	}

//  	public function parseUrl()
//  	{
//  		if ($_GET['url']) {
//  			$url = rtrim($_GET['url'], '/'); // rtrim menghapus tanda slash diakhir url sekali misal home/nama/ jadi home/nama
//  			$url = filter_var($url, FILTER_SANITIZE_URL); // bersihkan semua url dari karakter aneh
//  			$url = explode('/', $url); // pecah string yg dihilangkan setiap slashnya.
//  			return $url;
//  		}
//  	}
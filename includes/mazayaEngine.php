<?
require_once("RestClient.class.php");

class mazayaEngine{
	
	private $version;
	private $user;
	private $password;
	private $html;
	
	private $incrementer;
	private $counter;
	
	private $arrayCounter = 0;
	private $array = array();
	
	private $URL;
	private $Language;
	private $oauth_token;
	private $collection;
	
	private $reservedKeywordsToRemove;
	
	function __construct($base_API_url = NULL , $version = NULL , $language = NULL , $oauth_token = NULL , $collection = NULL) {
		$this->oauth_token = $oauth_token;
		$this->version = $version;
		$this->URL = $base_API_url;
		$this->Language = $language;
		$this->oauth_token = $oauth_token;
		$this->collection = $collection;
		
		// remove fields from send object
		$this->reservedKeywordsToRemove = array("createdAt","lastModified","keywords","tanentIds");
	}
	
	function getBranch(){
		$url = "";
	}
	public function getJsonFromUrl($url)
	{
		// call the get REST
		$object = RestClient::get($url);
		// get the Response out from the result 
		$jsonString = $object->getResponse();
		// encode it to json format
		$obj = json_decode($jsonString);
		// return the result back
		return $obj;
	}
	// function used to get the collection name from the page URL
	public function extractDataFromUrl($url,$flag)
	{
		// explode the url by the '/'
		$url = explode('/', $url);
		// count the number of elements in the array
		$count = count($url);
		
		if($flag == "home")
		{
			// decrements the count by 1 to get the last element from the array
			$count--;
			// explode by the '?' to remove the variables from the url
			$url = explode('?', $url[$count]);
			// return the first element from the array which is the collectionName
			return $url[0];
		}
		else if($flag == "edit" || $flag == "delete")
		{
			$version = $url[$count-3];
			$collection = $url[$count-2];
			$lastElement = explode('?', $url[$count-1]);
			$id = $lastElement[0];
			return array($id,$collection,$version);
		}
		else if($flag == "new")
		{
			$lastElement = explode('?', $url[$count-1]);
			$collectionName = $lastElement[0];
			return $collectionName;
		}
	}
	// function to get the collection name from the given URL
	public function getCollectionFromUrl($url)
	{
		// explode by the '/'
		$uri = explode('/', $url);
		// count the number of elements in the array
		$counter = count($uri);
		// decrements the count by 1 to get the last element from the array
		$counter--;
		// return the last element in the array i.e. which is the collection name
		return $uri[$counter];
	}
	
}
?>
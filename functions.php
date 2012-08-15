<?
  /**
  * functions.php második ág - master ujabb modosítása
  */
  
  function setReporting() {
    if (DEVELOPMENT_ENVIRONMENT == true) {
      error_reporting(E_ALL);
      ini_set('display_errors','On');
    } else {
      error_reporting(E_ALL);
      ini_set('display_errors','Off');
      ini_set('log_errors', 'On');
      ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
    }
  }
  
  function unregisterGlobals() {
    $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
    foreach ($array as $value) {
      foreach ($GLOBALS[$value] as $key => $var) {
        if ($var === $GLOBALS[$key]) {
          unset($GLOBALS[$key]);
        }
      }
    }
  }

// Encodes a SQL array into a JSON formated string
function JEncode($arr){
    if (version_compare(PHP_VERSION,"5.2","<"))
    {    
        require_once("./JSON.php"); //if php<5.2 need JSON class
        $json = new Services_JSON();//instantiate new json object
        $data=$json->encode($arr);  //encode the data in json format
    } else
    {
        $data = json_encode($arr);  //encode the data in json format
    }
    return $data;
}

// Encodes a YYYY-MM-DD into a MM-DD-YYYY string
function codeDate ($date) {
	$tab = explode ("-", $date);
	$r = $tab[1]."/".$tab[2]."/".$tab[0];
	return $r;
}

?>
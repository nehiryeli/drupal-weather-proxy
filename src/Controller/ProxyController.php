<?php
namespace Drupal\weather_proxy\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;

/**
 * An example controller.
 */
class ProxyController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function content() {
  	$url = "https://api.darksky.net/forecast/c9124621e94d5d51beaec54e77f5123d/41.015137,%2028.979530/?units=si&exclude=minutely,hourly,alerts,flags";
  	//header("Access-Control-Allow-Origin: *");
  	//$data = file_get_contents($url);

  	$response = new Response();
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
      $response->setContent(file_get_contents($url));
    }else{
      $response->setContent("Error");
    }
  	
  	$response->headers->set('Content-Type', 'application/json');
  	return $response;
  }


  

}
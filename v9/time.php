<?php 

function dynamic_data(){
	
	include_once('db_connect.php');
	$dsqry29=$conn->query("select * from test");
      if($dsqry29->rowCount()>0)
      {//echo "xcz";
          $srowd=$dsqry29->fetch();
	}
	  
	  return $srowd;
}


	  
require_once("vendor/autoload.php");
use Devristo\Phpws\Server\WebSocketServer;

$loop = \React\EventLoop\Factory::create();


 


// Create a logger which writes everything to the STDOUT
$logger = new \Zend\Log\Logger();
$writer = new Zend\Log\Writer\Stream("php://output");
$logger->addWriter($writer);

// Create a WebSocket server using SSL
$server = new WebSocketServer("tcp://0.0.0.0:12345", $loop, $logger);

$loop->addPeriodicTimer(0.5, function() use($server, $logger){
	
	$res = dynamic_data();
	$time = new DateTime();
    $string = $time->format("Y-m-d H:i:s");
    $logger->notice("Broadcasting time to all clients: $string");
    foreach($server->getConnections() as $client)
        $client->sendString($res['bid']);
	   
});


// Bind the server
$server->bind();

// Start the event loop
$loop->run();
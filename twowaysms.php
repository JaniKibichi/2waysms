<?php
require_once('AfricasTalkingGateway.php');
//receive the POST from AT on your POST ROUTE
 $from = $_POST['from'];
 $to = $_POST['to'];
 $text = $_POST['text'];
 $date = $_POST['date'];
 $id = $_POST['id'];
 $linkId = $_POST['linkId']; 

 //Respond based on backend events
if(!empty($_POST['from'])){
  //3.can store as ENV variables
  $username   = "sandbox";
  $apikey     = "8cee2760d1c0579920dd1f47a45f5990dd9488ef58f84ce07378ffefc43482ca";
  $recipients = $from;

    switch ($text) {
        case '1':
        $message    = "Good day Dar! I'm a lumberjack and its ok, I sleep all night and I work all day. \n";
            break;
        case '2':
        $message    = "Hot and Cloudy guys, hot and cloudy. 28 Dec C to be precise! ";
            break;
        case '3':
        $message    = "All roads clear! If traffics builds at noon, take a daladala :-)";
            break;
        default:
        $message    = "Choose a topic we can SMS you about: 1. greeting 2. weather 3. traffic.";
        ;
    } 
  

   //4. Specify your AfricasTalking shortCode or sender id
   $from = "93945";//"20414"
   $gateway    = new AfricasTalkingGateway($username, $apikey, "sandbox");
    try {
       $results = $gateway->sendMessage($recipients, $message, $from);
    //5.Store to DB
    }catch ( AfricasTalkingGatewayException $e )
    {
      echo "Encountered an error while sending: ".$e->getMessage();
    }
  
}
//6. Other logic to send from a POST form.

//7. Subscription

?>

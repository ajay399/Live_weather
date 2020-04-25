<?php

date_default_timezone_set('Asia/Calcutta'); 

$apikey="5b5e9eb052f1656e0fb14d01170305d0";
$cityid="1279233";
$url = "http://api.openweathermap.org/data/2.5/weather?id=".$cityid."&lang=en&units=metric&APPID=".$apikey;
// Collection object

// Initializes a new cURL session
$curl = curl_init($url);
// Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_POST, true);
// Set the request data as JSON using json_encode function
// Set custom headers for RapidAPI Auth and Content-Type header
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'X-RapidAPI-Host: kvstore.p.rapidapi.com',
  'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
  'Content-Type: application/json'
]);
// Execute cURL request with all previous settings
$response = curl_exec($curl);
// Close cURL session
curl_close($curl);
$data=json_decode($response);

$currenttime=time();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajay Rabari | Live Weather Forecast</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>


.jumbotron {
    
    background-color: #070A20!important;
    color: white!important;

}

.col-sm-4{
    font-size:21px!important;
}

#ajaydev {
    width: 100vw;
   
    text-align: center;
    background-color: #070A20;
    color: #fff;
   
    display: table-cell;
    vertical-align: middle;
    font-size: 14px;
    position: fixed;
    bottom: 0px;
}
        #ajaydev a{
            text-decoration:none;
            color:#fff;
           
             font-size: 20px;
        }


</style>
<body>

<div class="container">
  <div class="jumbotron">
    <h1><?php echo $data->name; ?> Weather Status</h1>
    <p>Catch live Weather & More With US.</p> 
  </div>
  <div class="row">
    <div class="col-sm-4">
      <div><?php echo date("jS F, Y",$currenttime); ?></div>
<div><?php echo date("l g:i a",$currenttime); ?></div>
<div><?php echo ucwords($data->weather[0]->description)?></div>
    </div>
    <div class="col-sm-4">
      <div><img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather_icon"><b> <?php echo $data->main->temp_max; ?>&degC</b>
</div>
    </div>
    <div class="col-sm-4">
      <div>Humidity : <?php echo $data->main->humidity; ?> %</div>
<div>Wind : <?php echo $data->wind->speed; ?> Km/h</div>
    </div>
  </div>
</div>

<div id="ajaydev">An Effort By <a href="https://in.linkedin.com/in/ajayrabari">Ajay Rabari</a></div>

</body>
</html>


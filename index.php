<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Weather site</title>
</head>
<body>
<style>
.bg{
    background-image: url("images/background.jpg");
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    filter: blur(0px);
    -webkit-filter:blur(0px);
}
</style>
<div class="bg"></div> 
    <div class="container">
            <div class="outer">
                <?php
                if(isset($_GET['send'])){
                    $cityName = $_GET['city'];
                    $cityName = strtoupper($cityName);
                    $apiKey= 'e268a6aefaef2231349b8ca4a3b21145';
                    $apiUrl = 'http://api.openweathermap.org/data/2.5/weather?q='.$cityName.'&appid='.$apiKey;
                    $weatherData = json_decode (file_get_contents($apiUrl), true);
                    $temperature = $weatherData['main']['temp'];
                    $celcius = $temperature - 273.15;
                    $celcius = round($celcius, 2);
                    $currentWeather = $weatherData['weather'][0]['main'];
                    if($currentWeather==true){
                    $cwDescription = $weatherData['weather']['0']['description'];
                    $cwIcon = $weatherData['weather']['0']['icon'];
                    ?>
                    <div class="text-center">
                    <h5 class="city"><?= $cityName?></h5>
                    </div>
                    <div class="text-center">
                    <h5 class="degree"><?= $celcius?></h5>
                    </div>
                    <div class="text-center">
                    <?php
                    echo "<img src='http://openweathermap.org/img/wn/".$cwIcon."@2x.png'/>";          
                    ?>
                    </div>
                    <?php
                    }else{
                        echo "Enter an existing city";
                    }
                    }
                ?>
                <div class="text-center">
                <form action="" method="get">
                    <input type="text" name = "city" placeholder = "Location"><br>
                    <input type="submit" class ="search" name = "send" value = "Search"><br>
                </form>
                </div>
        </div>
    </div> 
</body>
</html>

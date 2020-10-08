<?php

use function PHPSTORM_META\type;

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_URL => "https://pokeapi.co/api/v2/pokemon",
  CURLOPT_USERAGENT => "pokemon api"  // mmandetory
]);

$response = json_decode(curl_exec($curl))->{'results'};


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>home</title>
  <link rel="stylesheet" href="bootstrap/bootstrap-4.5.2-dist/css/bootstrap.min.css">
</head>


<body class="text-center">
  <div class="container-fluid">
    <h1 class="text-center badge-primary">Welcome To Pokemeon Index</h1>

    <div class="row">
      <?php

      foreach ($response as $key) {
      ?>

        <div class="col-md-3 mt-5">


          <div class="card" style="width: 18rem;">
            <img src='<?php echo "https://pokeres.bastionbot.org/images/pokemon/" . chop(explode("https://pokeapi.co/api/v2/pokemon/", $key->{'url'})[1], '/') . ".png"; ?>' class="card-img-top" alt="...">
            <div class="card-body bg-info ">
              <h5 class="card-titl text-white" ><?php echo $key->{'name'}; ?></h5>             
            </div>
          </div>



        </div>
      <?php
      }

      ?>
    </div>

  </div>

</body>

</html>
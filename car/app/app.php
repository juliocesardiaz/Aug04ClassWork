<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/car.php';
    $app = new Silex\Application();
    $app->get("/", function() {
        return "
        <!DOCTYPE html>
        <html>
        <head>
          <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
          <title>CARS!</title>
        </head>
        <body>
            <div class='container'>
                <h1>Enter Dimensions and Weight</h1>
                <form action='/view_cars'>
                    <div class='form-group'>
                        <label for='max_mileage'>Maximum Mileage:</label>
                        <input id='max_mileage' name='max_mileage' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                        <label for='max_price'>Maximum Price:</label>
                        <input id='max_price' name='max_price' class='form-control' type='number'>
                    </div>
                    <button type='submit' class='btn'>Go!</button>
                </form>
            </div>
        </body>
        </html>"
        ;
    });
    $app->get("/view_cars",function(){
        $firstCar = new Car("Tesla X", 100000, 0, "pictures/tesla.jpg");
        $secondCar = new Car("Honda Accord", 10000, 50000, "pictures/honda.jpg");
        $thirdCar = new Car("Ferrari Enzo", 350000, 15000, "pictures/ferrari-enzo.jpg");
        $fourthCar = new Car("Toyota Corolla", 6000, 100000, "pictures/toyota-corolla.jpg");
        $fifthCar = new Car("Mitsubishi Lancer", 20000, 100, "pictures/mitsubishi-lancer.jpg");
        $allCars = array($firstCar, $secondCar, $thirdCar, $fourthCar, $fifthCar);
        function searchCar($maxPrice, $maxMileage, $cars)
        {
          $searchedCars = array();
          foreach ($cars as $car)
          {
            $price = $car->getPrice();
            $mileage = $car->getMiles();
            if(($price <= $maxPrice) && ($mileage <= $maxMileage)) {
              array_push($searchedCars, $car);
            }
          }
          return $searchedCars;
        }
        $matchingCars = searchCar($_GET["max_price"], $_GET["max_mileage"], $allCars);
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href= 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <title>Results</title>
        </head>
        <body>
            <div class='container'>
                <h1>Here are the Cars you searched for</h1>
                <ul>
                    <?php
                        if (empty($matchingCars)) {
                          echo '<h2>There ain't no cars here.</h2>';
                        } else {
                            foreach ($matchingCars as $result) {
                              echo '<img src=' .  $result->getImage() . '>';
                              echo '<ul>' . $result->getMake() .'</ul>';
                              setlocale(LC_MONETARY, 'en_US');
                              echo '<ul>Price: ' . money_format('%i', $result->getPrice()) . '</ul>';
                              echo '<ul>Mileage: ' . number_format($result->getMiles()) . '</ul>';
                            }
                          }
                    ?>
                </ul>
            </div>
        </body>
        </html>
        ";

    });
    return $app;
?>
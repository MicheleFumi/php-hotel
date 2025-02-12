<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>hotel</title>

</head>

<body>
    <?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],



    ];

    //var_dump($hotels)

    ?>

    <div class="container">
        <h1 class="my-4">Choose the hotel</h1>

        <div class="py-2  text-center">
            <form action="" method="get">

                <input type="checkbox" name="parking" id="">
                <label for="">want to park?</label>

                <button type="submit" class="btn btn-primary">Button</button>

            </form>

            <?php
            $checkmark = $_GET["parking"]

            ?>
        </div>

        <h2>Your Results:</h2>
        <hr>
        <div class="mt-3">
            <?php
            if (!$checkmark) {
                foreach ($hotels as $hotel) {

                    foreach ($hotel as $key => $value) {
                        if ($key == "parking") {
                            echo "parking: " . ($value ? "yes" : "no");
                        } else {
                            echo "$key : $value";
                        };

                        echo "<br>";
                    }
                    echo "<hr>";
                }
            } else {
                foreach ($hotels as $hotel) {

                    if ($hotel["parking"]) {

                        echo "
                        name: $hotel[name]  
                        description: $hotel[description] <br>
                        parking: yes <br>
                        vote: $hotel[vote] <br>
                        distance_to_center: $hotel[distance_to_center] <br>
                        <hr>
                        ";
                    }
                }
            }

            ?>
        </div>




    </div>

</body>

</html>
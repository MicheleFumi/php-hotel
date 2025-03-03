<?php

require_once './database.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Hotel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header>

    </header>
    <main>

        <div class="container">

            <form action="./index.php" method="get" class="mt-4 w-50 mx-auto p-3 border rounded ">


                <div class="mb-3">
                    <label for="rating" class="form-label">Quante stelle?</label>
                    <input class="form-control" type="number" name="rating" id="rating" min="1" max="5" />
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="parking" id="parking" />
                        <label class="form-check-label" for="parking">Vuoi parcheggiare?</label>
                    </div>
                </div>


                <button class="btn btn-primary" type="submit">Invia</button>
            </form>



            <div class="title my-5 text-center">
                <h2>tutti gli hotel</h2>
            </div>

            <?php
            $filteredHotel = [];


            if (!isset($_GET['parking']) && !isset($_GET['rating'])) {

                foreach ($hotels as $hotel) {
                    $filteredHotel[] = $hotel;
                }
            } elseif (!isset($_GET['parking']) && $_GET['rating'] != '') {
                foreach ($hotels as $hotel) {
                    if ($hotel['vote'] >= $_GET['rating']) {
                        $filteredHotel[] = $hotel;
                    }
                }
            } elseif (isset($_GET['parking']) && $_GET['parking'] == 'on' && $_GET['rating'] == '') {
                foreach ($hotels as $hotel) {
                    if ($hotel['parking'] == true) {
                        $filteredHotel[] = $hotel;
                    }
                }
            } elseif (isset($_GET['parking']) && $_GET['parking'] == 'on' && $_GET['rating'] != '') {
                foreach ($hotels as $hotel) {
                    if ($hotel['parking'] == true && $hotel['vote'] >= $_GET['rating']) {
                        $filteredHotel[] = $hotel;
                    }
                }
            }

            /* 1. controlla che tutto sia disattivato */
            /* 2. controlla che solo rating sia inserito e filtra */
            /* 3. controlla che solo il parcheggio sia inserito e filtra */
            /* 4. controlla che sia il parcheggio che il rating siano inserito e filtra */



            ?>








            <?php

            foreach ($filteredHotel as $hotel) {
            ?>
                <div class="card my-2">
                    <div class="card-header">
                        <strong>nome hotel:</strong> <?php echo $hotel['name'] ?>
                    </div>
                    <div class="card-body">
                        <div>
                            <strong>descrizione:</strong> <?php echo $hotel['description'] ?>
                        </div>
                        <div>
                            <strong>parcheggio:</strong>
                            <?php

                            echo $hotel['parking'] ? 'si' : 'no';

                            ?>
                        </div>
                        <div>
                            <strong> voto:</strong>
                            <?php
                            echo
                            $hotel['vote']
                            ?>
                        </div>

                        <div>
                            <strong>distanza dal centro:</strong> <?php echo $hotel['distance_to_center'] ?>
                        </div>
                    </div>
                </div>
            <?php

            }

            ?>


        </div>
    </main>
    <footer>

    </footer>

    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>
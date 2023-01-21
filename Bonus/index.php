<?php
/* TRACCIA

Stampare tutti i nostri hotel con tutti i dati disponibili.
FATTO - Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile.
FATTO - Dopo aggiungete Bootstrap
FATTO - mostrate le informazioni con una tabella.
 */

/* BONUS 
 
Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel.

*/


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

//var_dump($hotels);
//var_dump($_GET);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <!-- form ha bisogno di action (che putna qui) e method -->
    <div class="container filter">

        <form action="index.php" method="GET" class="py-5 d-flex justify-content-center">
            <!-- Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio. -->
            <!-- PARCHEGGIO - input con select con 1 voce disabled, per per parcheggio e 1 per no parcheggio -->
            <div class="px-2">
                <select name="pacheggio" id="parcheggio" class="p-2">
                    <label for="pacheggio">Parcheggio</label>
                    <!-- disabled="disabled" serve per inserire la voce in modo non selezionabile
                    selected invece serve per farla apparire di default-->
                    <option value="" disabled="disabled" selected>Scegli parcheggio</option>
                    <option value="presente">Presente</option>
                    <option value="assente">Assente</option>
                </select>
                
            </div>
            <!-- Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore) -->
            <!-- VALUTAZIONE -->
            <div class="px-2">
                <select name="valutazione" id="valutazione" class="p-2">
                    <label for="valutazione">Valutazione</label>
                    <option value="" disabled="disabled" selected>Scegli la valutazione</option>
                    <option value="una_stella">★</option>
                    <option value="due_stelle">★★</option>
                    <option value="tre_stelle">★★★</option>
                    <option value="quattro_stelle">★★★★</option>
                    <option value="cinque_stelle">★★★★★</option>
                    
                </select>
            </div>
            <!-- PULSANTI -->            
            <button type="submit" class="mx-2 px-2">Invia</button>
            <button type="reset" class="mx-2 px-2">Cancella</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            <?php foreach ($hotels as $hotel) : ?>
                <!-- nome hotel -->
                <h1 class="text-center text-black-75 bg-primary bg-gradient bg-opacity-50 p-3"><?php echo $hotel['name'] ?></h1>
                <!-- descrizione hotel -->
                <div class="col p-3 text-center bg-dark bg-opacity-25">
                    <div><strong>Descrizione dell'hotel</strong></div>
                    <?php echo $hotel['description'] ?>
                </div>
                <!-- parcheggio hotel -->
                <div class="col p-3 text-center bg-secondary bg-opacity-25">
                    <div><strong>Parcheggio</strong></div>

                    <?php
                    if ($hotel['parking'] === true) {
                        echo 'Presente';
                    } else {
                        echo 'Assente';
                    }
                    ?>
                </div>
                <!-- vautazione hotel -->
                <div class="col p-3 text-center bg-dark bg-opacity-25">
                    <div><strong>Valutazione dell'hotel</strong></div>
                    <?php
                    if ($hotel['vote'] === 1) {
                        echo '★';
                    } elseif ($hotel['vote'] === 2) {
                        echo '★★';
                    } elseif ($hotel['vote'] === 3) {
                        echo '★★★';
                    } elseif ($hotel['vote'] === 4) {
                        echo '★★★★';
                    } elseif ($hotel['vote'] === 5) {
                        echo '★★★★★';
                    }
                    ?>
                </div>
                <!-- distanza hotel dal centro-->
                <div class="col p-3 text-center bg-secondary bg-opacity-25">
                    <div><strong>Distanza dal centro</strong></div>
                    <?php echo $hotel['distance_to_center'] ?> km
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>
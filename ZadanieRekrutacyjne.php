<?php

function wydajReszte($reszty) {
    $nominaly = array(
        "5 zł" => 500,
        "2 zł" => 200,
        "1 zł" => 100,
        "50 gr" => 50,
        "20 gr" => 20,
        "10 gr" => 10,
        "5 gr" => 5,
        "2 gr" => 2,
        "1 gr" => 1
    );

    foreach ($reszty as $reszta) {
        echo "Dla reszty $reszta zł:\n";
        $reszta = round($reszta * 100); // zamiana na grosze

        foreach ($nominaly as $nominal => $wartosc) {
            if ($reszta >= $wartosc) {
                $wydaj = floor($reszta / $wartosc);
                $reszta -= $wydaj * $wartosc;

                if ($wydaj > 0) {
                    $wydajZl = $wydaj * $wartosc / 100;
                    echo "Wydaj $wydaj monet $nominal \n";
                }
            }

            if ($reszta == 0) {
                break;
            }
        }

        echo "\n";
    }
}

echo "Podaj reszty do wydania (oddzielone spacją): ";
$input = readline();
$reszty = array_map(function ($value) {
    return floatval(str_replace(',', '.', $value));
}, explode(' ', $input));

wydajReszte($reszty);

?>

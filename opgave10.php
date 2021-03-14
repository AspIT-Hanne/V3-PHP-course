<?php
    $elever = ["martin", "mogens", "victoria", "alexander", "line"];

    $find = "mogens";

    $maaneder = array(
        "januar" => 31,
        "februar" => 28,
        "marts" => 31,
        "april" => 30,
        "maj" => 31,
        "juni" => 30,
        "juli" => 31,
        "august" => 31,
        "september" => 30,
        "oktober" => 31,
        "november" => 30,
        "december" => 31
    );

    $MaanedLaengde = [];

    $laerere = array(
        array(
        "fornavn" => "Hanne",
        "efternavn" => "Lund",
        "fag" => "Visualisering"
        ),
        array(
        "fornavn" => "Jens",
        "efternavn" => "Clausen",
        "fag" => "Softwarekonstruktion"
        ),
        array(
        "fornavn" => "Ronni",
        "efternavn" => "Hansen",
        "fag" => "Teknik"
        ),
        array(
        "fornavn" => "Ulf",
        "efternavn" => "Skaaning",
        "fag" => "AspIT-Lab"
        )
    );


    function findElev($elever, $find)
    {
        for ($i = 0; $i < count($elever); $i++)
        {
            if ($elever[$i] === $find)
            {
                return $i;
            }
        }

        return $i;
    }

    function maaneder($maaneder, $MaanedLaengde)
    {
        foreach ($maaneder as $maaned => $dage)
        {
            if ($dage == 31)
            {
                $MaanedLaengde[0][] = $maaned;
            }
            else
            {
                $MaanedLaengde[1][] = $maaned;
            }
        }
        return $MaanedLaengde;
    }

    function printArray($laerere)
    {
        foreach ($laerere as $hverLaerer)
        {
            foreach ($hverLaerer as $index => $vaerdi)
            {
                echo $vaerdi . " ";

                if ($index == "fag")
                {
                    echo "<br>";
                }
            }
        }
    }
?>

<h2>Opgave 10 - arrays og loops</h2>

<p>Opgave 10.2</p>
<p>
    <?php 
        $result = findElev($elever, $find);

        $place = $result + 1;

        if ($result == count($elever))
        {
            echo ucfirst($find) . " findes ikke i arrayet!";
        }
        else
        {
           echo ucfirst($find) . " findes i arrayet på plads nr $place" . "!";
        }
    ?>
</p>
<p>Opgave 10.3</p>
<p>
    <?php
        if (in_array($find, $elever))
        {
            $result = array_search($find, $elever) + 1;
            echo ucfirst($find) . " findes i arrayet på plads nr $result" . "!";
        }
        else
        {
            echo ucfirst($find) . " findes ikke i arrayet!";
        }
    ?>
</p>

<p>Opgave 10.4</p>
<p>
    <?php
        $MaanedLaengde = maaneder($maaneder, $MaanedLaengde);

    ?>

    <div class="left">
    <h3>Korte måneder</h3>
    
    <?php    
        foreach ($MaanedLaengde[1] as $maaned)
        {
            echo "<p>$maaned : {$maaneder[$maaned]} dage</p>";
        }
    ?>

    </div>
    <div class="right">
    <h3>Lange måneder</h3>

    <?php    
        foreach ($MaanedLaengde[0] as $maaned)
        {
            echo "<p>$maaned : {$maaneder[$maaned]} dage</p>";
        }
    ?>
        
    </div>
</p>

<p>Opgave 10.5</p>

<?php printArray($laerere); ?>
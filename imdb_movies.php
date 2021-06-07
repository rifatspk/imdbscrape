<?php
$url = 'https://www.imdb.com/chart/top';
function fetch_URL($url = null)
{
    if ($url != null) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        if (curl_exec($ch) === false) {
            echo 'Curl Error: ' . curl_error($ch);
        } else {
            $output = curl_exec($ch);
        }
        curl_close($ch);
        return $output;
    }
}
function phpDefaultClass($url = null, $output = null)
{
    $output = fetch_URL($url);
    $dom = new DOMDocument();
    @$dom->loadHTML($output);
    $xpath = new DOMXPath($dom);
    return $xpath;
}

$moviePath = phpDefaultClass($url);
$allMovie = $moviePath->query("//tbody[@class='lister-list']/tr");
foreach ($allMovie as $movies) {
    $chMovies = new DOMDocument();
    $cloned = $movies->cloneNode(TRUE);
    $chMovies->appendChild($chMovies->importNode($cloned, True));
    $moviePath = new DOMXPath($chMovies);
    $serialNos = $moviePath->query("//td['posterColumn']/span");
    $moviePoster = $moviePath->query("//td['posterColumn']/a/img");
    $movieNames = $moviePath->query("td[@class='titleColumn']/a");
    $movieRelease = $moviePath->query("//td[@class='titleColumn']/span[@class='secondaryInfo']");
    $movieRating = $moviePath->query("//td[@class='ratingColumn imdbRating']/strong");

    $allMovies[] = array(
        "serialNo" => $serialNos->item(0)->getAttribute('data-value'),
        "movieName" => $movieNames->item(0)->nodeValue,
        "moviePoster" => $moviePoster->item(0)->getAttribute('src'),
        "movieRelease" => $movieRelease->item(0)->nodeValue,
        "movieRating" => $movieRating->item(0)->nodeValue,
    );
}


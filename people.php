<?php
/*
 * read csv of contacts
 */
$title = 'People Recommendations';
require 'inc/header.php';

/*echo '<pre>';
include 'data/csv/people.csv';
echo '</pre>';*/

if (($fh = fopen('data/csv/people.csv', 'r')) !== false) {
    $header = fgetcsv($fh);
    //var_dump($header);
    //exit;
    extract(array_flip($header));
    //echo $first;
    //exit;
echo '<div class="row">';
    while (($contact = fgetcsv($fh)) !== false) {
        echo '<div class="col-xs-6 col-md-3">';
        echo '<div class="thumbnail">';
        echo '<img src="' . $contact[$img] .'" />';
        echo '<div class="caption">';
        echo '<h4 class="media-heading">' . $contact[$first];
        echo $contact[$last] . '</h4>';
        echo '<a href="http://' . $contact[$website] . '" target="_blank">' . $contact[$website] . '</a>';
        echo '<br />';
        echo 'Twitter: <a href="https://twitter.com/';
        echo $contact[$twitter] . '" target="_blank">@';
        echo $contact[$twitter] . '</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
echo '</div>';
    fclose($fh);
}
require 'inc/footer.php';
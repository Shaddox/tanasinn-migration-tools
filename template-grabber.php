<?php

$baseText = file_get_contents('http://tanasinn.info/pagelist.html');

$parsedText = preg_grep('/Template:.*.html/', explode("\n", $baseText));
$templateList = [];
foreach ($parsedText as $lineEntry)
{
    array_push($templateList, str_replace('.html', '.txt', strip_tags($lineEntry)));
}

foreach ($templateList as $templateItem) {
    $linkItem = str_replace(' ', '%20', $templateItem);
    $link = 'http://tanasinn.info/wiki/' . $linkItem;
    $template = file_get_contents($link);
    file_put_contents('templates/' . $templateItem, $template);

}
print_r($templateList);
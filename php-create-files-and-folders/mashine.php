<?php

$html = file_get_contents('./list-block.html');

$dom = new domDocument;
libxml_use_internal_errors(true);
$dom->loadHTML($html);
$dom->preserveWhiteSpace = false;

$ext = '.html';

$files = $dom->getElementsByTagName('a');

$i = -1;
foreach ($files as $file) {
	$i++;
	if ($i === 0) continue;

	$f = ($i < 10 ? '0' : '').$i . '-' . str_replace(' ', '-', $file->nodeValue) . $ext;

  	fopen($f, "w");
}
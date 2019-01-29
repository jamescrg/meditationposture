<?php

function mpEmphasis($chapter, $link) {
	if ($chapter == $link) echo 'style="font-weight: bold;"';
}

$chapter = 'about';
if ( isset($_GET['chapter']) ) $chapter = $_GET['chapter'];

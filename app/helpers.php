<?php


function gravatar($email, $size = 100)
{
	return 'https://www.gravatar.com/avatar/'. md5($email) . '?s='. $size ;
}

function convertToHtml($value) {
	return Markdown::convertToHtml($value);
}
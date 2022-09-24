<?php

$testArray = array(
    'sub1.sub2.example.co.uk',
    'sub1.example.com',
    'example.com',
    'sub1.sub2.sub3.example.co.uk',
    'sub1.sub2.sub3.example.com',
    'sub1.sub2.example.com',
	'dinkes.malangkab.go.id',
	'www.google.hg',
	'www.google.hg',
	'ecole-poyat-trevoux.etab.ac-lyon.fr',
	'pdxmonthly.com',
	'www.subdomain.domain.com',
);

foreach($testArray as $k => $v)
{
	echo "Domain : ".extract_domain($v)."<br>";
	echo "Subdomain : ".extract_subdomains($v)."<hr>";
}

function extract_domain($domain)
{
    if(preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $domain, $matches))
    {
        return $matches['domain'];
    } else {
        return $domain;
    }
}

function extract_subdomains($domain)
{
    $subdomains = $domain;
    $domain = extract_domain($subdomains);

    $subdomains = rtrim(strstr($subdomains, $domain, true), '.');
	
	$subdomains = str_replace('www.', '', $subdomains);

	return $subdomains !== 'www' ? $subdomains : null;
}
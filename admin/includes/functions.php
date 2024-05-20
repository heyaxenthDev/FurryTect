<?php
function getPageTitle($page)
{
    $titles = [
        'dashboard' => 'Dashboard - FurryTect',
        'dogs' => 'Dogs - FurryTect',
        'cats' => 'Cats - FurryTect',
        'owners' => 'Owners - FurryTect',
        'vaccination' => 'Vaccination - FurryTect',
        'dog tagging' => 'Dog Tagging - FurryTect',
        'registration' => 'Registration - FurryTect',
        'vaccination report' => 'Vaccination Report - FurryTect',
        'dog tagging report' => 'Dog Tagging Report - FurryTect'
        // Add more pages and titles as needed
    ];

    return $titles[$page] ?? 'FurryTect';
}
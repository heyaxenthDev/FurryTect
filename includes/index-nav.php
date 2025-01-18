<?php 
$current_page = basename($_SERVER['PHP_SELF'], '.php');

$pages = [
    'report-incident' => 'report-incident',
    'my-pets' => 'my-pets',
    'awareness' => 'awareness',
    'resources' => 'resources',
];

function is_active($page)
{
    global $current_page;
    return $page === $current_page ? 'class="active"' : '';
}
?>

<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="index">Home</a></li>
        <li><a href="index#about">About</a></li>
        <?php foreach ($pages as $page => $label): ?>
        <li><a href="<?= $page ?>" <?= is_active($page) ?>><?= ucfirst(str_replace('-', ' ', $label)) ?></a></li>
        <?php endforeach; ?>
        <li><a href="index#contact">Contact</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
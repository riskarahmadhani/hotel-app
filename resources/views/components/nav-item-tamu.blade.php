@props(['label', 'link'])
<?php 
$active =$link == url()->current() ;
?>
<li class="nav-item{{ $active ? 'active':'' }}">
    <a href="<?= $link ?>" class="nav-link">{{ $label }}</a>
</li>
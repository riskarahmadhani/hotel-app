@props(['label','icon','link'])
<?php
$path = trim(str_replace(url('/'),'',$link),'/');
$wildchar = $path == 'admin' ? '' : '*';
$is = Request()->is($path.$wildchar);
?>
<li class="nav-item">
    <a href="<?= $link ?>" class="nav-link bg-primary{{ $is ? '':'active' }}">
        <p><i class="nav-icon {{ $icon }}"></i>
        {{ $label }}</p>
    </a>
</li>
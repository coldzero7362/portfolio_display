<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'cykim') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;700&family=Nanum+Gothic+Coding:wght@400;700&display=swap">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="container site-header__inner">
            <a class="site-logo" href="<?= site_url('/') ?>">▌cykim</a>
            <nav class="site-nav" aria-label="주요 메뉴">
                <a href="#profile">Profile</a>
                <a href="#works">Works</a>
                <a class="btn btn--primary" href="https://github.com/coldzero7362" target="_blank" rel="noopener">GitHub ↗</a>
            </nav>
        </div>
    </header>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="site-footer">
        <div class="container site-footer__inner">
            <span>©<?= date('Y') ?> cykim</span>
            <span>built with CodeIgniter 4</span>
        </div>
    </footer>
</body>
</html>

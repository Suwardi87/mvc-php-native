<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'E-Learning MVC', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="<?= htmlspecialchars(url('public/assets/css/style.css'), ENT_QUOTES, 'UTF-8') ?>">
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <h1 class="site-title"><a href="<?= htmlspecialchars(url(), ENT_QUOTES, 'UTF-8') ?>">E-Learning MVC</a></h1>
        <nav>
            <a href="<?= htmlspecialchars(url(), ENT_QUOTES, 'UTF-8') ?>">Beranda</a>
            <a href="<?= htmlspecialchars(url('kelas'), ENT_QUOTES, 'UTF-8') ?>">Kelas</a>
        </nav>
    </div>
</header>

<main class="container">
    <?= $content ?>
</main>
</body>
</html>
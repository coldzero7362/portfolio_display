<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<section id="profile" class="profile">
    <div class="container profile__inner">
        <div class="profile__avatar" aria-hidden="true"><?= esc($profile['initial']) ?></div>
        <div class="profile__body">
            <p class="profile__role"><?= esc($profile['role']) ?></p>
            <h1 class="profile__name"><?= esc($profile['name']) ?></h1>
            <p class="profile__bio"><?= esc($profile['bio']) ?></p>
            <ul class="profile__links">
                <?php foreach ($profile['links'] as $link): ?>
                    <li><a href="<?= esc($link['url'], 'attr') ?>" target="_blank" rel="noopener"><?= esc($link['label']) ?> ↗</a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</section>

<section id="works" class="showcase">
    <div class="container">
        <header class="showcase__header">
            <h2 class="showcase__title">Works</h2>
            <span class="showcase__count"><?= count($works) ?> pieces</span>
        </header>

        <div class="showcase__case">
            <ul class="showcase__grid">
                <?php foreach ($works as $i => $work): ?>
                    <li class="exhibit">
                        <article class="exhibit__item">
                            <div class="exhibit__object" aria-hidden="true">
                                <span><?= esc(mb_substr($work['title'], 0, 1)) ?></span>
                            </div>
                            <div class="exhibit__plate">
                                <p class="exhibit__meta">No.<?= sprintf('%02d', $i + 1) ?> · <?= esc($work['year']) ?></p>
                                <h3 class="exhibit__title"><?= esc($work['title']) ?></h3>
                                <p class="exhibit__summary"><?= esc($work['summary']) ?></p>
                                <ul class="exhibit__tags">
                                    <?php foreach ($work['tags'] as $tag): ?>
                                        <li><?= esc($tag) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </article>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

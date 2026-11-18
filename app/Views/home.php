<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<!-- 프로필: 페이지에 하나뿐인 다크 터미널 카드 -->
<section id="profile" class="section section--hero">
    <div class="container">
        <div class="tui">
            <div class="tui__head">
                <?php if ($profile['image']): ?>
                    <img class="tui__avatar" src="<?= base_url($profile['image']) ?>" alt="<?= esc($profile['name'], 'attr') ?> 프로필 사진">
                <?php else: ?>
                    <div class="tui__avatar tui__avatar--empty" aria-hidden="true"><?= esc($profile['initial']) ?></div>
                <?php endif ?>
                <?= pixel_wordmark($profile['wordmark'], 'tui__wordmark') ?>
            </div>

            <dl class="tui__prompt">
                <?php foreach ($profile['prompt'] as $line): ?>
                    <div class="tui__line">
                        <dt><span class="tui__pipe">│</span><span class="tui__cmd"><?= esc($line['cmd']) ?></span></dt>
                        <dd class="tui__token">[<?= esc($line['value']) ?>]</dd>
                    </div>
                <?php endforeach ?>
            </dl>

            <div class="tui__output">
                <h1 class="tui__name"><?= esc($profile['name']) ?></h1>
                <p><?= esc($profile['bio']) ?></p>
            </div>

            <ul class="tui__hints">
                <?php foreach ($profile['links'] as $link): ?>
                    <li><a href="<?= esc($link['url'], 'attr') ?>" target="_blank" rel="noopener"><?= esc(strtolower($link['label'])) ?> ↗</a></li>
                <?php endforeach ?>
                <li><a href="#works">works ↓</a></li>
            </ul>
        </div>
    </div>
</section>

<!-- 진열장 -->
<section id="works" class="section">
    <div class="container">
        <header class="section-label">
            <h2>[+] Works</h2>
            <span><?= count($works) ?> pieces</span>
        </header>

        <ul class="cabinet">
            <?php foreach ($works as $i => $work): ?>
                <li class="exhibit">
                    <div class="exhibit__object" aria-hidden="true"><?= esc(mb_substr($work['title'], 0, 1)) ?></div>
                    <p class="exhibit__meta">No.<?= sprintf('%02d', $i + 1) ?> · <?= esc($work['year']) ?></p>
                    <h3 class="exhibit__title"><?= esc($work['title']) ?></h3>
                    <p class="exhibit__summary"><?= esc($work['summary']) ?></p>
                    <p class="exhibit__tags">
                        <?php foreach ($work['tags'] as $tag): ?>
                            <span>[<?= esc($tag) ?>]</span>
                        <?php endforeach ?>
                    </p>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</section>

<?= $this->endSection() ?>

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
            <?php
            // 블록 픽셀 워드마크: 글꼴 렌더링 대신 SVG 사각형으로 그려 틈·번짐 방지
            $pixels = [
                ' ###  #   #  #  #  ###  #   #',
                '#      # #   # #    #   ## ##',
                '#       #    ##     #   # # #',
                '#       #    # #    #   #   #',
                ' ###    #    #  #  ###  #   #',
            ];
            $cw = 3; $ch = 5; // 셀 비율 = 고정폭 글자 비율(0.6 : 1)
            $cols = max(array_map('strlen', $pixels));
            ?>
            <svg class="tui__wordmark" viewBox="0 0 <?= $cols * $cw ?> <?= count($pixels) * $ch ?>" role="img" aria-label="<?= esc($profile['name'], 'attr') ?>" shape-rendering="crispEdges">
                <?php foreach ($pixels as $y => $row): ?>
                    <?php preg_match_all('/#+/', $row, $runs, PREG_OFFSET_CAPTURE) ?>
                    <?php foreach ($runs[0] as [$run, $x]): ?>
                        <rect x="<?= $x * $cw ?>" y="<?= $y * $ch ?>" width="<?= strlen($run) * $cw ?>" height="<?= $ch ?>"/>
                    <?php endforeach ?>
                <?php endforeach ?>
            </svg>
            </div>

            <div class="tui__prompt">
                <span class="tui__pipe">│</span>
                <span class="tui__cmd">whoami</span>
                <span class="tui__token">[<?= esc($profile['role']) ?>]</span>
            </div>

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

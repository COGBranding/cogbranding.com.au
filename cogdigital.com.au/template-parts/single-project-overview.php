<?php if (!empty($args['introduction_text']) || !empty($args['overview_text'])) : ?>
    <div class="section single-project__overview">
        <div class="row single-project__overview__row">
            <div class="single-project__overview__col">
                <?php if (!empty($args['introduction_text'])) : ?>
                    <div class="single-project__introduction">
                        <?php echo $args['introduction_text']; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="single-project__overview__col">
                <?php if (!empty($args['overview_text'])) : ?>
                    <div class="single-project__content-item">
                        <h2 class="single-project__content-item__heading text-uppercase text-uppercase--sm">
                            Overview
                        </h2>

                        <div class="single-project__content-item__content">
                            <?php echo $args['overview_text']; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($args['scope_item'])) : ?>
                    <div class="single-project__content-item">
                        <h2 class="single-project__content-item__heading text-uppercase text-uppercase--sm">
                            Scope
                        </h2>

                        <div class="single-project__content-item__content">
                            <ul>
                                <?php foreach ($args['scope_item'] as $scope_item) : ?>
                                    <li>
                                        <?php echo $scope_item['scope_item']; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($args['link_item'])) : ?>
                    <div class="single-project__btn--wrapper btn--wrapper">
                        <?php foreach ($args['link_item'] as $link_item) : ?>
                            <a href="<?php echo $link_item['link_item_url']; ?>" class="single-project__link">
                                <?php echo $link_item['link_item_text']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
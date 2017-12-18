<?php if (!empty($items)): ?>
    <?php foreach ($items as $item): ?>
        <div class="row">
            <div class="col-xs-3">
                <?php if (!empty($item->image)): ?>
                    <img src="<?= $item->image; ?>" alt=""/>
                <?php endif; ?>
            </div>
            <div class="col-xs-9">
                <h4>
                    <a href="https://vk.com/event<?= $item->api_id; ?>" target="_blank">
                        <?= $item->name; ?>
                    </a>
                </h4>

                <div>
                    <?= $item->description; ?>
                </div>
                <div>
                    <?php if (!empty($item->start_date)):?>
                        <p>Дата старта: <span style="color:red;"><b><?=date('d-m-Y H:i:s', strtotime($item->start_date));?></b></span></p>
                    <?php endif;?>
                    <?php if (!empty($item->finish_date)):?>
                        <p>Дата окончания: <span style="color:blue;"><b><?=date('d-m-Y H:i:s', strtotime($item->finish_date));?></b></span></p>

                    <?php endif;?>
                </div>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
<?php endif; ?>

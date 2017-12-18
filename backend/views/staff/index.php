<?php
$this->title = 'Персонал';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Логин</th>
            <th>Email</th>
            <th>Телефон</th>
            <th>Тип</th>
        </tr>
    </thead>
    <tbody>
        <?foreach($staff as $item):?>
            <tr>
                <td><?=$item->username;?></td>
                <td><?=$item->email;?></td>
                <td><?=$item->phone;?></td>
                <td><?=$item->roles;?></td>
            </tr>
        <?endforeach;?>
    </tbody>
</table>
</div>
<a href="<?=Yii::$app->homeUrl;?>/staff/add" class="btn btn-success">Добавить</a>
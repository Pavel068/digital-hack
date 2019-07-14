<?php
$this->title = 'Отзывы о портале';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1>Отзывы о портале</h1>

<?php foreach (\app\models\ParsedData::find()->all() as $review): ?>
    <div class="row">
        <div class="col-md-6">
            <div class="negative">
                <?= $review['negative'] ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="positive">
                <?= $review['positive'] ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
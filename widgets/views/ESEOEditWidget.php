<h3><?php echo $model->seoData->translator->translate('seo', 'SEO settings for model'); ?></h3>

<div class="row">
    <?php echo CHtml::activeLabel($model->seoData, 'title'); ?>
    <?php echo CHtml::activeTextArea($model->seoData, 'title', array('cols'=>60, 'rows'=>'1')); ?>
</div>

<div class="row">
    <?php echo CHtml::activeLabel($model->seoData, 'keywords'); ?>
    <?php echo CHtml::activeTextArea($model->seoData, 'keywords', array('cols'=>60, 'rows'=>'1')); ?>
</div>

<div class="row">
    <?php echo CHtml::activeLabel($model->seoData, 'description'); ?>
    <?php echo CHtml::activeTextArea($model->seoData, 'description', array('cols'=>60, 'rows'=>'1')); ?>
</div>
<h3><?php echo $translator->translate('seo', 'SEO settings for model'); ?></h3>
<div class="row">
    <?php echo CHtml::label($translator->translate('seo', 'Page title'), null); ?>
    <?php echo CHtml::textArea('SeoData[title]', $model->seoData->title, array('cols'=>60, 'rows'=>'1')); ?>
</div>

<div class="row">
    <?php echo CHtml::label($translator->translate('seo', 'Page meta keywords'), null); ?>
    <?php echo CHtml::textArea('SeoData[keywords]', $model->seoData->keywords, array('cols'=>60, 'rows'=>'1')); ?>
</div>

<div class="row">
    <?php echo CHtml::label($translator->translate('seo', 'Page meta description'), null); ?>
    <?php echo CHtml::textArea('SeoData[description]', $model->seoData->description, array('cols'=>60, 'rows'=>'1')); ?>
</div>
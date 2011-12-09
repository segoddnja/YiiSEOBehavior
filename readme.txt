This extension simplifies work with SEO. It allows you to easily add SEO data to DB models.

Unpack release in the protected/extensions folder.


First, create table for storage SEO data

CREATE TABLE IF NOT EXISTS `seo_data` (
  `model_name` varchar(50) NOT NULL,
  `model_id` int(12) NOT NULL,
  `title` text,
  `keywords` text,
  `description` text,
  PRIMARY KEY (`model_name`,`model_id`)
)


Then add behavior to model

public function behaviors() {
	return array(
              'SeoBehavior' => array(
                     'class' => 'ext.YiiSEOBehavior.ESEOModelBehavior'
              ),
              ...
	);
}

In _form view for this model, insert ESEOEditWidget

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sample-form',
)); ?>
...
        <?php $this->widget('ext.YiiSEOBehavior.widgets.ESEOEditWidget', array(
            'model' => $model
        )); ?>
...
<?php $this->endWidget(); ?>

Add ESEOControllerBehavior to controller

public function behaviors() {
	return array(
              'SeoBehavior' => array(
                     'class' => 'ext.YiiSEOBehavior.ESEOControllerBehavior'
              ),
              ...
	);
}

And last that you need to do - add folowing code to your controller in view action

public function actionView() {
	$model=$this->loadModel($id);
        $this->registerSEO($model);
}


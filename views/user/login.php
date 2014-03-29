<?php

$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Login");
$this->breadcrumbs = [
	UserModule::t("Login"),
];
?>

<?= BsHtml::pageHeader(UserModule::t("Login")) ?>

<p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>

<?php $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', [
    'id' => 'login-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => ['enctype' => 'multipart/form-data'],
]); ?>

    <p class="help-block"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

    <?= $form->errorSummary($model); ?>

    <?= $form->textFieldControlGroup($model, 'username', ['maxlength' => 20]); ?>
    <?= $form->passwordFieldControlGroup($model, 'password', ['maxlength' => 128]); ?>

	<div class="form-group">
		<?= CHtml::link(UserModule::t("Register"), Yii::app()->getModule('user')->registrationUrl); ?> | <?= CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
	</div>

    <?= $form->checkBoxControlGroup($model, 'rememberMe', ['maxlength' => 128]); ?> 

    <?= BsHtml::submitButton(UserModule::t("Login"), [
    	'color' => BsHtml::BUTTON_COLOR_PRIMARY]
    ); ?>

<?php $this->endWidget(); ?>
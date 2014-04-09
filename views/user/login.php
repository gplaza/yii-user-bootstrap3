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
    <div class="col-lg-5">
        <?= $form->errorSummary($model); ?>

        <?= $form->textFieldControlGroup($model, 'username', ['maxlength' => 20]); ?>
        <?= $form->passwordFieldControlGroup($model, 'password', ['maxlength' => 128]); ?>

        <?php if ($this->module->allowAutoRegistration || $this->module->allowRecoveryPassword): ?>
            <?php if ($this->module->allowAutoRegistration): ?>
                <?= CHtml::link(UserModule::t("Register"), Yii::app()->getModule('user')->registrationUrl); ?>
            <?php endif; ?>
            <?php if ($this->module->allowAutoRegistration && $this->module->allowRecoveryPassword): ?>
                <?= ' | ' ?>
            <?php endif; ?>
            <?php if ($this->module->allowRecoveryPassword): ?>
                <?= CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>                
            <?php endif; ?>
        <?php endif; ?>

        <?= $form->checkBoxControlGroup($model, 'rememberMe', ['maxlength' => 128]); ?> 

        <?= BsHtml::submitButton(UserModule::t("Login"), [
            'color' => BsHtml::BUTTON_COLOR_PRIMARY]
        ); ?>     
    </div>    
<?php $this->endWidget(); ?>
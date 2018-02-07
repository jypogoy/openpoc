
<?= $this->getContent() ?>

<div class="page-header">
    <h2>Register for OPENPOC PM</h2>
</div>

<?= $this->tag->form(['register', 'id' => 'registerForm', 'onbeforesubmit' => 'return false', 'class' => 'ui form']) ?>

    <div class="required field">
        <?= $form->label('name') ?>
        <?= $form->render('name', ['class' => 'required field']) ?>
        <div class="ui warning message" id="name_alert">
            <strong>Warning!</strong> Please enter your full name
        </div>
    </div>
    <div class="required field">
        <?= $form->label('username') ?>
        <?= $form->render('username', ['class' => 'form-control']) ?>
    </div>
    <div class="ui error message"></div>
    
    <?= $this->tag->submitButton(['Register', 'class' => 'ui primary submit button', 'onclick' => 'return SignUp.validate();']) ?>
    <p class="help-block">By signing up, you accept terms of use and privacy policy.</p>

</form>

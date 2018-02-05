
<?= $this->getContent() ?>

<div class="row">

    <div class="col-md-6">
        <div class="page-header">
            <h2>Log In</h2>
        </div>
        <?= $this->tag->form(['session/start', 'role' => 'form', 'class' => 'ui form']) ?>
            <fieldset>
                <div class="form-group">
                    <label for="email">Username/Email</label>
                    <div class="controls">
                        <?= $this->tag->textField(['email', 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="controls">
                        <?= $this->tag->passwordField(['password', 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= $this->tag->submitButton(['Login', 'class' => 'ui primary button']) ?>
                </div>
            </fieldset>
        </form>
    </div>

    <div class="col-md-6">

        <div class="page-header">
            <h2>Don't have an account yet?</h2>
        </div>

        <p>Create an account offers the following advantages:</p>
        <ul>
            <li>Create, track and export your projects online</li>
            <li>Gain critical insights into how your business is doing</li>
            <li>Stay informed about promotions and special packages</li>
        </ul>

        <div class="clearfix center">
            <?= $this->tag->linkTo(['register', 'Sign Up', 'class' => 'ui positive button']) ?>
        </div>
    </div>

</div>

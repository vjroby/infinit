<div class="row page-container">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Inregistrare cont nou.
            </div>
            <div class="panel-body">
                <?php $errors =validation_errors(); ?>
                <?php if (strlen($errors) != 0): ?>

                    <div class="alert alert-danger">
                        <?php echo validation_errors();  ?>
                    </div>
                <?php endif; ?>
                <form action="" method="POST" role="forn" class="form-horizontal">
                    <div class="form-group">
                        <label for="first_name" class="col-sm-4 control-label">Nume</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nume">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-sm-4 control-label">Prenume</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Prenume">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-4 control-label">Telefon</label>
                        <div class="col-sm-8">
                            <input type="tel" maxlength="10" name="phone" class="form-control" id="phone" placeholder="Telefon">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-4 control-label">Parola</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Parola">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passwordConf" class="col-sm-4 control-label">Confirmare parola</label>
                        <div class="col-sm-8">
                            <input type="password" name="passwordConf" class="form-control" id="passwordConf" placeholder="Confirma parola">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="regUser" value="1" class="btn btn-default">Trimite</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

 
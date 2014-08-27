<div class="row page-container">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Login
            </div>
            <div class="panel-body">
                <?php $errors =validation_errors(); ?>
                <?php if (strlen($errors) != 0): ?>

                <div class="alert alert-danger">
                    <?php echo validation_errors();  ?>
                </div>
                <?php endif; ?>

                <form action="" method="POST" role="forn" class="form-horizontal" id="loginForm">
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-4 control-label">Parola</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Parola">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Trimite" name="submitLogin" class="btn btn-default" />
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>js/bootstrapValidator.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function(){

                $('#loginForm').bootstrapValidator({
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },

                    fields: {

                        email: {
                            message: 'Email nu este valid',
                            validators: {
                                notEmpty: {
                                    message: 'Email trebuie completat'
                                }
                            }
                        },
                        password: {
                            message: 'Parola nu este valida',
                            validators: {
                                notEmpty: {
                                    message: 'Parola trebuie completat'
                                }

                            }
                        }
                    }
                });
            })

        </script>
    </div>
</div>

 
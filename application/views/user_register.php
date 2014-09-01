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
                <form action="" method="POST" role="forn" class="form-horizontal" id="registerForm">
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
                        <label for="passwordConf" class="col-sm-4 control-label"><?php echo $captcha['image']; ?></label>
                        <div class="col-sm-8">
                            <input type="password" name="captcha" class="form-control" id="passwordConf" placeholder="Introdu caracterele din imagine">
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
        <helper help="<?php echo($captcha['word']);?>" ></helper>
    </div>
    <script src="<?php echo base_url(); ?>js/bootstrapValidator.js" type="text/javascript"></script>

    <script type="text/javascript">
        var captcha = '<?php echo $captcha['word']; ?>';
        $(document).ready(function(){
           $('#registerForm').bootstrapValidator({
               feedbackIcons: {
                   valid: 'glyphicon glyphicon-ok',
                   invalid: 'glyphicon glyphicon-remove',
                   validating: 'glyphicon glyphicon-refresh'
               },

               fields: {
                   first_name: {
                       message: 'Numele nu este valid',
                       validators: {
                           notEmpty: {
                               message: 'Numele trebuie completat'
                           }
                       }
                   },
                   last_name: {
                       message: 'Prenumele nu este valid',
                       validators: {
                           notEmpty: {
                               message: 'Prenumele trebuie completat'
                           }
                       }
                   },
                   email: {
                       message: 'Email nu este valid',
                       validators: {
                           notEmpty: {
                               message: 'Email trebuie completat'
                           },
                           remote: {
                               message: 'Exista un cont cu acest email',
                               url: '<?php echo base_url(); ?>/user/check_email/'
                           }
                       }
                   },
                   phone: {
                       message: 'Telefonul nu este valid',
                       validators: {
                           notEmpty: {
                               message: 'Telefonul trebuie completat'
                           }
                       }
                   },
                   password: {
                       message: 'Parola nu este valida',
                       validators: {
                           notEmpty: {
                               message: 'Parola trebuie completat'
                           },
                           identical: {
                               field: 'passwordConf',
                               message: 'Parolele n coincid'
                           }
                       }
                   },
                   passwordConf: {
                       message: 'Parola nu este valid',
                       validators: {
                           notEmpty: {
                               message: 'Parola trebuie completat'
                           },
                           identical: {
                               field: 'password',
                               message: 'Parolele n coincid'
                           }
                       }
                   },
                   captcha: {
                       message: 'Captcha invalid',
                       validators: {
                           notEmpty: {
                               message: 'Introduceti caractele din imagine'
                           },
                           callback: {
                               callback: function(value, validator, $field){
//                                    if (value != captcha){
//                                        return false;
//                                    }else{
//                                        return true;
//                                    }
                                   return true;
                               }
                           }
                       }
                   }
               }
           });
        });
    </script>
</div>

 
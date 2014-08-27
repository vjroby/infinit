<div class="col-md-4 col-md-offset-4" style="margin-top: 10px;">
    <div class="panel panel-default">
        <?php if ($session): ?>
        <div class="panel-heading">
            <span>Esti logat</span>
        </div>
            <div class="panel-body">
                <p>Nume: <?php echo $session['first_name']; ?></p>
                <p>Nume: <?php echo $session['last_name']; ?></p>
                <a class="btn btn-danger" href="<?php echo base_url(); ?>/user/logout">Logout</a>
            </div>
        <?php endif; ?>
        <?php if (!$session): ?>
            <div class="panel-body">
                <span>Nu esti logat</span>
            </div>
        <?php endif; ?>
    </div>
</div>

 
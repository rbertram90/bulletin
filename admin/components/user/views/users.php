<div class="white-card">
    <h2>User Manager</h2>
    <div class="component-action-bar">
        <?php if (count($this->model->settings->fields) > 0) { ?><a href="index.php?component=settings&controller=settings&extension=user" class="button"><i class="fa fa-cog"></i> Settings</a><?php } ?><a href="index.php?component=user&controller=user" class="button green-button"><i class="fa fa-plus"></i> New User</a><a class="delete-by-ids button red-button"><i class="fa fa-trash"></i> Delete</a>
    </div>
    <?php $this->model->pagination->display($this->model->max); ?>
    <form action="index.php?component=user&controller=users&task=delete" method="post" class="admin-form">
        <div class="d-flex admin-header">
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-1 hidden-mobile"><strong>ID</strong></div>
            <div class="col-md-2 hidden-mobile"><strong>Name</strong></div>
            <div class="col-md-2"><strong>Username</strong></div>
            <div class="col-md-4 hidden-mobile"><strong>Email</strong></div>
            <div class="col-md-1 hidden-mobile" style="text-align: center;"><strong>Activated</strong></div>
            <div class="col-md-1 hidden-mobile" style="text-align: center;"><strong>Blocked</strong></div>
        </div>
        <?php foreach ($this->model->users as $user) { ?>
            <div class="d-flex admin-list align-items-center">
                <div class="col-md-1" style="text-align: center;">
                    <input type="checkbox" name="ids[]" value="<?php echo $user->id; ?>" />
                </div>
                <div class="col-md-1 hidden-mobile">
                    <?php echo $user->id; ?>
                </div>
                <div class="col-md-2 hidden-mobile">
                    <a href="index.php?component=user&controller=user&id=<?php echo $user->id; ?>"><?php echo $user->name; ?></a>
                </div>
                <div class="col-md-2">
                    <a href="index.php?component=user&controller=user&id=<?php echo $user->id; ?>"><?php echo $user->username; ?></a>
                </div>
                <div class="col-md-4 hidden-mobile">
                    <?php echo $user->email; ?>
                </div>
                <div class="col-md-1 hidden-mobile" style="text-align: center;">
                    <a href="index.php?component=user&controller=user&task=<?php echo ($user->activated == 1 ? "deactivate" : "activate"); ?>&id=<?php echo $user->id; ?>" class="btn btn-<?php echo ($user->activated == 1 ? "success" : "danger"); ?>">
                        <i class="fa fa-<?php echo ($user->activated == 1 ? "check" : "times"); ?>"></i>
                    </a>
                </div>
                <div class="col-md-1 hidden-mobile" style="text-align: center;">
                    <a href="index.php?component=user&controller=user&task=<?php echo ($user->blocked == 1 ? "unblock" : "block"); ?>&id=<?php echo $user->id; ?>" class="btn btn-<?php echo ($user->blocked == 1 ? "success" : "danger"); ?>">
                        <i class="fa fa-<?php echo ($user->blocked == 0 ? "times" : "check"); ?>"></i>
                    </a>
                </div>
            </div>
        <?php } ?>
    </form>
    <?php $this->model->pagination->display($this->model->max); ?>
</div>
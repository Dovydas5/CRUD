<?php
include_once '../includes/actions.php';

?>
<?php require '../includes/head.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Update person</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input value="<?php echo $person['name']; ?>" type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="project">project</label>
                        <input value="<?= $person['project']; ?>" name="project" id="project" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update person</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require '../includes/footer.php'; ?>
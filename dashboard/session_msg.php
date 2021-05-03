<?php
if ($_SESSION['success_message'] <> '') {
?>
    <div class="alert alert-success text-center" id="malert">
        <?php echo $_SESSION['success_message']; ?>
    </div>
<?php
    $_SESSION['success_message'] = '';
}
if ($_SESSION['fail_message'] <> '') {
?>
    <div class="alert alert-danger text-center" id="malert">
        <?php echo $_SESSION['fail_message']; ?>
    </div>
<?php
    $_SESSION['fail_message'] = '';
}
?>
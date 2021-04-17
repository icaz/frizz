<?php
if (isset($_SESSION['sucess_message']) && $_SESSION['sucess_message'] <> '') {
?>
    <div class="alert alert-success text-center" id="success-alert">
        <?php echo $_SESSION['sucess_message']; ?>
    </div>
<?php
    $_SESSION['sucess_message'] = '';
}
if (isset($_SESSION['fail_message']) && $_SESSION['fail_message'] <> '') {
?>
    <div class="alert alert-danger text-center" id="success-alert">
        <?php echo $_SESSION['fail_message']; ?>
    </div>
<?php
    $_SESSION['fail_message'] = '';
}
if (isset($_SESSION['warning_message']) && $_SESSION['warning_message'] <> '') {
?>
    <div class="alert alert-warning text-center" id="success-alert">
        <?php echo $_SESSION['warning_message']; ?>
    </div>
<?php
    $_SESSION['warning_message'] = '';
}
?>
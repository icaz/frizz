<?php
if ($_SESSION['sucess_message'] <> '') {
?>
    <div class="alert alert-success text-center" id="malert">
        <?php echo $_SESSION['sucess_message']; ?>
    </div>
<?php
    $_SESSION['sucess_message'] = '';
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
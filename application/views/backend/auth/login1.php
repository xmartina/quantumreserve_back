<?php $this->load->controller('backend/Auth');
?>
<form action="<?= base_url('backend/auth/login'); ?>" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>

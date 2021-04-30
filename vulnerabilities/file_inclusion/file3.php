<div>
    <h3>File 3</h3>
    <hr />
    Welcome <br />
    Your IP address is: <em><?php echo $_SERVER['REMOTE_ADDR']; ?></em><br />

    Your user-agent address is: <em><?php echo $_SERVER['HTTP_USER_AGENT']; ?></em><br />
    <?php
    if (array_key_exists('HTTP_REFERER', $_SERVER)) { ?>
        You came from: <em><?php echo $_SERVER['HTTP_REFERER']; ?></em><br />
    <?php } ?>
    I'm hosted at: <em><?php echo $_SERVER['HTTP_HOST']; ?></em><br /><br />
</div>
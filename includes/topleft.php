				<a href="./dashboard.php" class="simple-text">
                    <?php echo $user['name'] ?>
                </a>
                <?php if ($is_admin == 1)
                {
                ?>
                <center><h6>(admin)</h6></center>
                <?php } ?>
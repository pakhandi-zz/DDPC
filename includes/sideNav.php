
            <ul class="nav">
                <?php

                    if(! strcmp($currentTab, "dashboard"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";

                ?>
                    <a href="dashboard.php">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php

                    if(! strcmp($currentTab, "user"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";

                ?>
                    <a href="user.php">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <!-- <?php

                    if(!strcmp($currentTab, "table"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";

                ?>
                    <a href="table.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <?php

                    if(!strcmp($currentTab, "typography"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";

                ?>
                    <a href="typography.php">
                        <i class="ti-text"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <?php

                    if(!strcmp($currentTab, "icons"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";

                ?>
                    <a href="icons.php">
                        <i class="ti-pencil-alt2"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <?php

                    if(!strcmp($currentTab, "maps"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";

                ?>
                    <a href="maps.php">
                        <i class="ti-map"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <?php

                    if(!strcmp($currentTab, "notifications"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";

                ?>
                    <a href="notifications.php">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li> -->
            </ul>
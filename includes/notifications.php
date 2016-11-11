                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="removeNot()">
                                    <?php
                                        // session_start();
                                        $countNotifications = 0;
                                        $thisRole = $_SESSION['role'];
                                        $thisUniqueId = $_SESSION['reg_no'];
                                        // echo $thisRole."|".$thisUniqueId;
                                        $query = "SELECT * FROM notifications WHERE target_group='$thisRole' OR target_member='$thisUniqueId' ORDER BY issue_date DESC";
                                        // echo $query;
                                        // die();
                                        $allNotifications = mysqli_query($connection, $query);

                                        while( $notification = mysqli_fetch_array($allNotifications) )
                                        {
                                            if(isset($_COOKIE[(string)$_SESSION['reg_no'].(string)$notification['id']]))
                                                continue;
                                            $countNotifications++;
                                        }
                                    ?>
                                    <i class="ti-bell"></i>
                                    <p class="notification notificationAlert"><?php echo $countNotifications; ?></p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <?php
                                    $lastNot = 0;
                                    $thisRole = $_SESSION['role'];
                                    $thisUniqueId = $_SESSION['reg_no'];
                                    $query = "SELECT * FROM notifications WHERE target_group='$thisRole' OR target_member='$thisUniqueId' ORDER BY issue_date DESC";
                                    $allNotifications = mysqli_query($connection, $query);

                                    while( $notification = mysqli_fetch_array($allNotifications) )
                                    {
                                        if($lastNot < $notification['id'])
                                            $lastNot = $notification['id'];
                                        /*if(isset($_COOKIE[(string)$_SESSION['reg_no'].(string)$notification['id']]))
                                            continue;*/
                                        
                                ?>
                                    <li><a href="#"><?php echo $notification['description']; ?></a></li>
                                    
                                <?php } ?>
                                <span style="display: none;" id = "notid"><?php echo $lastNot; ?> </span>
                              </ul>
                        </li>
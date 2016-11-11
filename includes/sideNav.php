
            <ul class="nav">
            <?php
                if($is_admin == 1)
                {
                    if(!strcmp($currentTab, "adminDashboard"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";
                ?>
                            <a href="adminDashboard.php">
                                <i class="ti-view-list-alt"></i>
                                    <p>Dashboard</p>
                            </a>
                        </li>
                <?php
                    if(!strcmp($currentTab, "viewStudents"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";
                ?>
                            <a href="viewStudents.php">
                                <i class="ti-pencil-alt2"></i>
                                <p>View Students</p>
                            </a>
                        </li>
                <?php
                    if(!strcmp($currentTab, "makeNotification"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";
                ?>
                            <a href="makeNotification.php">
                                <i class="ti-pencil-alt2"></i>
                                <p>Make Notification</p>
                            </a>
                        </li>
                <?php
                    if(!strcmp($currentTab, "add"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";
                ?>
                            <a href="add.php">
                                <i class="ti-pencil-alt2"></i>
                                    <p>Add Functions</p>
                            </a>
                        </li>
                <?php
                    if(!strcmp($currentTab, "update"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";
                ?>
                           <a href="update.php">
                                <i class="ti-pencil-alt2"></i>
                                    <p>update Functions</p>
                            </a>
                        </li>
                <?php
                } 
                else
                {
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
                                    <p>Edit Profile</p>
                            </a>
                        </li>
                 <?php
                    if (!strcmp($_SESSION['role'], "student") OR !strcmp($_SESSION['role'], "Supervisor"))
                    {  
                        if(! strcmp($currentTab, "uploadDocument"))
                            echo "<li class=\"active\">";
                        else
                            echo "<li>";

                ?>
                                <a href="uploadDocument.php">
                                    <i class="ti-user"></i>
                                        <p>upload Document</p>
                                </a>
                            </li>
                <?php 
                        if(! strcmp($currentTab, "application"))
                               echo "<li class=\"active\">";
                        else
                                echo "<li>";
                        ?>
                                    <a href="application.php">
                                        <i class="ti-user"></i>
                                            <p>Application</p>
                                    </a>
                                </li>
                <?php
                    }
                    if (!strcmp($_SESSION['role'], "ConvenerDDPC"))
                    { 
                        if(! strcmp($currentTab, "createMeeting"))
                           echo "<li class=\"active\">";
                        else
                            echo "<li>";
                ?>
                                <a href="meeting.php">
                                    <i class="ti-user"></i>
                                    <p>Meeting</p>
                                </a>
                            </li>
                        <?php
                        if(!strcmp($currentTab, "makeNotification"))
                            echo "<li class=\"active\">";
                        else
                            echo "<li>";
                        ?>
                                <a href="makeNotification.php">
                                    <i class="ti-pencil-alt2"></i>
                                      <p>Make Notification</p>
                                </a>
                            </li>
                 <?php
                    }
                    if (!strcmp($_SESSION['role'], "student"))
                    { 
                        if(! strcmp($currentTab, "awardDistribution"))
                           echo "<li class=\"active\">";
                        else
                            echo "<li>";
                    ?>
                                <a href="awardDistribution.php">
                                    <i class="ti-user"></i>
                                        <p>Ph.D. Credit Award Distribution</p>
                                </a>
                            </li>
                        <?php
                        if(! strcmp($currentTab, "progRequirement"))
                           echo "<li class=\"active\">";
                        else
                            echo "<li>";
                        ?>
                                <a href="progRequirement.php">
                                    <i class="ti-user"></i>
                                    <p>Program Requirement Details</p>
                                </a>
                            </li>
                        <?php
                        if(! strcmp($currentTab, "viewStudents"))
                           echo "<li class=\"active\">";
                        else
                            echo "<li>";
                        $reg_no = $_SESSION['reg_no'];
                        ?>
                                <a href="viewStudent.php?qwStudent=<?php echo $reg_no; ?>">
                                    <i class="ti-user"></i>
                                    <p>View Complete Profile</p>
                                </a>
                            </li>
                        <?php
                        // echo "sdfghjkl".$_SESSION['in_ddpc'];
                        if( isset($_SESSION['in_ddpc']) && $_SESSION['in_ddpc'] )
                        {
                            if(! strcmp($currentTab, "meeting"))
                                echo "<li class=\"active\">";
                            else
                                echo "<li>";
                        ?>
                                    <a href="meeting.php">
                                        <i class="ti-user"></i>
                                            <p>Meeting</p>
                                    </a>
                                </li>
                        <?php
                        }
                        ?>
                <?php
                    }
                    if(!strcmp($_SESSION['role'], "Supervisor") OR !strcmp($_SESSION['role'], "ConvenerDDPC") OR !strcmp($_SESSION['role'], "HOD") OR !strcmp($_SESSION['role'], "ChairmanSDPC"))
                    {
                        if(!strcmp($currentTab, "approve"))
                            echo "<li class=\"active\">"; 
                        else
                            echo "<li>";
                        
                ?>
                            <a href="approve.php">
                                <i class="ti-layout-list-thumb"></i>
                                <p>Approve Applications</p>
                            </a>
                        </li>

                <?php
                    }
                    if(!strcmp($_SESSION['role'], "ConvenerDDPC") OR !strcmp($_SESSION['role'], "HOD") OR !strcmp($_SESSION['role'], "ChairmanSDPC"))
                    {
                        if(!strcmp($currentTab, "viewStudents"))
                            echo "<li class=\"active\">"; 
                        else
                            echo "<li>";
                        
                ?>
                        <a href="viewStudents.php">
                            <i class="ti-layout-list-thumb"></i>
                            <p>View Students</p>
                        </a>
                    </li>
                <?php
                    if(!strcmp($currentTab, "members"))
                            echo "<li class=\"active\">"; 
                        else
                            echo "<li>";
                        
                ?>
                        <a href="members.php">
                            <i class="ti-layout-list-thumb"></i>
                            <p>DDPC Members</p>
                        </a>
                    </li>
                <?php
                    }
                }
                ?>
            </ul>

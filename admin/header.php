<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item"> <a class="nav-link" href="home.php"> <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i> </a> </li>
        <?php if($role === "admin") { ?>
        <li class="nav-item"> <a class="nav-link" href="staff.php"> <span class="menu-title">Staff</span>
                <i class="mdi mdi-account-tie menu-icon"></i> </a> </li>
        <?php } ?>
        <li class="nav-item"> <a class="nav-link" href="user.php"> <span class="menu-title">Users</span>
                <i class="mdi mdi-account-tie menu-icon"></i> </a> </li>
        <?php if($role === "admin") { ?>
        <li class="nav-item"> <a class="nav-link" href="payment.php"> <span class="menu-title">Payment
                </span>
                <i class="mdi mdi-card menu-icon"></i> </a> </li>
        <?php } ?>
        <li class="nav-item"> <a class="nav-link" href="subscription.php"> <span class="menu-title">Subscription
                </span> <i class="mdi mdi-card menu-icon"></i> </a> </li>
        <li class="nav-item"> <a class="nav-link" href="send_interest.php"> <span class="menu-title">Send
                    Interest
                </span> <i class="mdi mdi-card menu-icon"></i> </a> </li>
        <li class="nav-item"> <a class="nav-link" href="change_password.php"> <span class="menu-title">Change Password
                </span> <i class="mdi mdi-card menu-icon"></i> </a> </li>
        <li class="nav-item"> <a class="nav-link" href="logout.php"> <span class="menu-title">Log Out</span>
                <i class="mdi mdi-logout menu-icon"></i> </a> </li>
    </ul>
</nav>
<!-- header.php -->

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="bi bi-compass"></i> DevNavigator
        </a>

        <!-- Button for small screens -->
        <div class="d-lg-none ms-auto me-4">
            <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                <a href="account_settings.php" class="btn custom-btn"><?php echo htmlspecialchars($_SESSION['LOGGED_USER']['user_name']); ?></a>
            <?php else : ?>
                <a href="login.php" class="btn custom-btn">Log in</a>
            <?php endif; ?>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_1">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_2">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link write-link" href="posts.php">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link write-link" href="write.php">Write</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_3">Contact</a>
                </li>
            </ul>

            <!-- Button for large screens -->
            <div class="d-none d-lg-block">
                <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                    <a href="account_settings.php" class="btn custom-btn"><?php echo htmlspecialchars($_SESSION['LOGGED_USER']['user_name']); ?></a>
                <?php else : ?>
                    <a href="login.php" class="btn custom-btn">Log in</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

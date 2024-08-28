<!-- If the user is not logged in, display the form -->
<?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
<section class="contact-section section-padding" id="login-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <h2 class="text-white mb-5 fs-0 text-center">Login Form</h2>
                <div class="shadow-lg mt-5">
                    <form class="custom-form contact-form mb-5 mb-lg-0" action="submit_login.php" method="POST" role="form">
                        <div class="contact-form-body">
                            <!-- Display error message if present -->
                            <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                                    unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <input type="email" name="email" id="email"
                                        class="form-control" placeholder="Email address" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <input type="password" name="password" id="password"
                                        class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-10 col-8 mx-auto mt-4">
                                <button type="submit" class="form-control">Submit</button>
                            </div>
                        </div>
                    </form>
					<br>
					<div class="text-center mt-3">
						<p class="text-white">Don't have an account yet? <a href="signup.php">Sign up!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else : ?>
    <div class="alert alert-success text-center" role="alert">
        Hello <?php echo htmlspecialchars($_SESSION['LOGGED_USER']['user_name']); ?> and welcome to DevNavigator!
    </div>
<?php endif; ?>
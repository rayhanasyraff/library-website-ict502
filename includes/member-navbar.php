<div class="container">
    <h3>Welcome, <?php 
        session_start();
        echo $_SESSION['user_data']['MEMBER_USERNAME'];
    ?>!</h3>
    <div class="button-groups">
        <button class="btn btn-lg btn-primary" onclick="document.location='member_home.php'">Home</button>
        <button class="btn btn-lg btn-primary" onclick="document.location='member_books.php'">My Books</button>
        <button class="btn btn-lg btn-primary" onclick="document.location='member_profile.php'">My Profile</button>
        <button class="btn btn-lg btn-primary" onclick="document.location='member_library.php'">Library Books</button>
        <button class="btn btn-lg btn-primary" onclick="document.location='member_fee.php'">Late Fine</button>
        <button class="btn btn-lg btn-primary" onclick="document.location='login.php'">Logout</button>
    </div>
</div>

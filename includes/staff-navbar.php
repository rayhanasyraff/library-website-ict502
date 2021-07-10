<div class="container">
    <h3>Welcome, <?php 
        session_start();
        echo $_SESSION['user_data']['STAFF_USERNAME'];
    ?>!</h3>
    <div class="button-groups">
        <button class="btn-edit btn btn-lg btn-primary" onclick="document.location='staff_home.php'">Home</button>
        <button class="btn-edit btn btn-lg btn-primary" onclick="document.location='staff_profile.php'">My Profile</button>
        <button class="btn-edit btn btn-lg btn-primary" onclick="document.location='staff_library.php'">Library Books</button>
        <button class="btn-edit btn btn-lg btn-primary" onclick="document.location='staff_books_assigned.php'">Books Assigned</button>
        <button class="btn-edit btn btn-lg btn-primary" onclick="document.location='staff_books_borrows.php'">Books Borrows</button>
        <button class="btn-edit btn btn-lg btn-primary" onclick="document.location='staff_books_returns.php'">Books Returns</button>
        <button class="btn-edit btn btn-lg btn-primary" onclick="document.location='staff_view_fee.php'">Late Fine</button>
        <button class="btn-edit btn btn-lg btn-primary" onclick="document.location='staff_view_member.php'">Member</button>
        <button class="btn-edit btn btn-lg btn-primary" onclick="document.location='staff_view_staff.php'">Staff</button>
        <button class="btn-edit btn btn-lg btn-primary" onclick="document.location='staff_view_authors.php'">Authors</button>
        <button class="btn-edit btn btn-lg btn-primary" onclick="document.location='staff_view_publisher.php'">Publisher</button>
        <button class="btn-edit btn btn-lg btn-primary" onclick="document.location='login.php'">Logout</button>
    </div>
</div>
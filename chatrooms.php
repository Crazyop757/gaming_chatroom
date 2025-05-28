<?php
session_start();

// Only allow access if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

// MySQL connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "chatroom";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get room_name and room_code for rooms the user has joined
$sql = "
    SELECT DISTINCT ri.room_name, ri.room_code 
    FROM room_players rp
    JOIN room_info ri ON rp.room_code = ri.room_code
    WHERE rp.username = ? AND rp.room_code IS NOT NULL
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$chatrooms = [];
while ($row = $result->fetch_assoc()) {
    $chatrooms[] = $row; // associative array with keys 'room_name' and 'room_code'
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Chatrooms | GameMatch</title>
    <link rel="stylesheet" href="chatrooms.css">
</head>
<body>
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">Game<span>Match</span></div>
        <div class="nav-links">
            <a href="gamewithchat_backup.php">Home</a>
            <a href="chatrooms.php">Chatrooms</a>
            <a href="about.php">About</a>
        </div>
        <a class="cta-button" href="logout.php">Logout</a>
    </nav>

    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">My Chatrooms</h1>
            <p class="page-subtitle">All the chatrooms you've joined and created, organized and ready for action</p>
        </div>

    

        <!-- Chatrooms Grid -->
        <div class="chatrooms-grid" id="chatroomsGrid">
        <?php if (empty($chatrooms)): ?>
            <p>You have not joined any chatrooms yet.</p>
        <?php else: ?>
            <?php foreach ($chatrooms as $room): ?>
                <div class="chatroom-card" data-status="active" data-type="joined" data-name="<?= htmlspecialchars($room['room_name']) ?>">
                    <div class="chatroom-header">
                        <div class="chatroom-info">
                            <h3 class="chatroom-name"><?= htmlspecialchars($room['room_name']) ?></h3>
                            <span class="chatroom-code"><?= htmlspecialchars($room['room_code']) ?></span>
                        </div>
                        <a href="game-platform-with-chat.php?room_code=<?= urlencode($room['room_code']) ?>&room_name=<?= urlencode($room['room_name']) ?>" class="join-btn">Enter</a>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

        <!-- Floating Action Button -->
        <button class="floating-action-btn" title="Create New Chatroom">+</button>
    </div>
</body>
</html>

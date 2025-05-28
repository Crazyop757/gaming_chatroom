<?php

// if (!isset($_SESSION['room_code']) || !isset($_SESSION['username'])) {
//     // Redirect to login or dashboard if session not set
//     header("Location: dashboard.php");
//     exit;
// }

session_start();

if (isset($_GET['room_code']) && isset($_GET['room_name'])) {
    $_SESSION['room_code'] = $_GET['room_code'];
    $_SESSION['room_name'] = $_GET['room_name'];
}

$room_code = $_SESSION['room_code'] ?? '';
$room_name = $_SESSION['room_name'] ?? 'Unknown Room';
$username = $_SESSION['username'];


// Connect to DB
$conn = new mysqli("localhost", "root", "", "chatroom");

// Store player in room_players if not already there
$stmt = $conn->prepare("INSERT IGNORE INTO room_players (room_code, username) VALUES (?, ?)");
$stmt->bind_param("ss", $room_code, $username);
$stmt->execute();
$stmt->close();

// Fetch all players in the room
$players = [];
$res = $conn->query("SELECT username FROM room_players WHERE room_code = '$room_code'");
while ($row = $res->fetch_assoc()) {
    $players[] = $row['username'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameMatch | Play & Chat</title>
    <link rel="stylesheet" href="game-platform-with-chat.css">
</head>

<body>
    <div class="navbar">
        <div class="logo">Game<span>Match</span></div>
        <div class="nav-links">
            <a href="gamewithchat_backup.php">Home</a>
            <a href="chatrooms.php">Chatrooms</a>
            <a href="about.php">About</a>
        </div>
    </div>

    <div class="main-container">
        <div class="animated-bg">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>

        <!-- Game Section -->
        <div class="game-container">
            <div class="game-header">
                <h3 id="game-title">Popular Games</h3>
            </div>

            <!-- Games Grid Section -->
            <div class="games-grid" id="games-grid">
                <!-- Game Card 1 -->
                <div class="game-card" data-game="smash-karts" data-url="https://smashkarts.io">
                    <div class="game-img">
                        <span>🚗</span>
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Smash Karts</h3>
                        <p class="game-description">Battle royale racing game with weapons and explosions!</p>
                        <div class="game-meta">
                            <div class="game-rating">★★★★☆</div>
                            <div class="game-players">1.2k players</div>
                        </div>
                        <button class="play-button">PLAY NOW</button>
                    </div>
                </div>

                <!-- Game Card 2 -->
                <div class="game-card" data-game="tetris" data-url="https://tetris.com/play-tetris">
                    <div class="game-img">
                        <span>🧩</span>
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Tetris</h3>
                        <p class="game-description">Classic block-stacking puzzle game with a modern twist.</p>
                        <div class="game-meta">
                            <div class="game-rating">★★★★★</div>
                            <div class="game-players">900 players</div>
                        </div>
                        <button class="play-button">PLAY NOW</button>
                    </div>
                </div>

                <!-- Game Card 3 -->
                <div class="game-card" data-game="flappy-bird" data-url="https://flappybird.io">
                    <div class="game-img">
                        <span>🐦</span>
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Flappy Bird</h3>
                        <p class="game-description">Navigate the bird through pipes without touching them.</p>
                        <div class="game-meta">
                            <div class="game-rating">★★★☆☆</div>
                            <div class="game-players">750 players</div>
                        </div>
                        <button class="play-button">PLAY NOW</button>
                    </div>
                </div>

                <!-- Game Card 4 -->
                <div class="game-card" data-game="snake" data-url="https://google.com/search?q=snake+game">
                    <div class="game-img">
                        <span>🐍</span>
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Snake</h3>
                        <p class="game-description">Eat the food, grow longer, and avoid hitting yourself!</p>
                        <div class="game-meta">
                            <div class="game-rating">★★★★☆</div>
                            <div class="game-players">620 players</div>
                        </div>
                        <button class="play-button">PLAY NOW</button>
                    </div>
                </div>

                <!-- Game Card 5 -->
                <div class="game-card" data-game="pac-man" data-url="https://pacman.com">
                    <div class="game-img">
                        <span>👻</span>
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Pac-Man</h3>
                        <p class="game-description">Munch dots and avoid ghosts in this arcade classic.</p>
                        <div class="game-meta">
                            <div class="game-rating">★★★★★</div>
                            <div class="game-players">800 players</div>
                        </div>
                        <button class="play-button">PLAY NOW</button>
                    </div>
                </div>

                <!-- Game Card 6 -->
                <div class="game-card" data-game="racing" data-url="https://example.com/racing">
                    <div class="game-img">
                        <span>🏎️</span>
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Racing</h3>
                        <p class="game-description">High-speed racing with customizable cars and tracks.</p>
                        <div class="game-meta">
                            <div class="game-rating">★★★★☆</div>
                            <div class="game-players">550 players</div>
                        </div>
                        <button class="play-button">PLAY NOW</button>
                    </div>
                </div>

                <!-- Game Card 7 -->
                <div class="game-card" data-game="puzzle" data-url="https://example.com/puzzle">
                    <div class="game-img">
                        <span>🎮</span>
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Puzzle</h3>
                        <p class="game-description">Brain-teasing puzzles that challenge your mind.</p>
                        <div class="game-meta">
                            <div class="game-rating">★★★★☆</div>
                            <div class="game-players">450 players</div>
                        </div>
                        <button class="play-button">PLAY NOW</button>
                    </div>
                </div>

                <!-- Game Card 8 -->
                <div class="game-card" data-game="chess" data-url="https://chess.com">
                    <div class="game-img">
                        <span>♟️</span>
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Chess</h3>
                        <p class="game-description">The classic strategy game with online multiplayer.</p>
                        <div class="game-meta">
                            <div class="game-rating">★★★★★</div>
                            <div class="game-players">700 players</div>
                        </div>
                        <button class="play-button">PLAY NOW</button>
                    </div>
                </div>
            </div>

            <!-- Game Iframe Container (Initially Hidden) -->
            <div class="game-iframe-container" id="game-iframe-container">
                <iframe class="game-iframe" id="game-iframe" src="" title="Game"></iframe>
            </div>
        </div>

        <!-- Chat Section -->
        <div class="chat-container">
            <div class="chat-header">
                <?php if (!empty($room_name)): ?>
                    <h3><?php echo htmlspecialchars($room_name); ?></h3>
                <?php else: ?>
                    <h3>Room name not found.</h3>
                <?php endif; ?>
                <span><span class="online-count"><?php echo count($players) ?></span> players online</span>
            </div>

            <div class="chat-messages">
                <!-- Chat messages will be dynamically added here -->
            </div>

            <div class="chat-input-container">
                <button class="emoji-btn">😊</button>
                <input type="text" class="chat-input" placeholder="Send a message...">
                <button class="send-btn">➤</button>
            </div>

            <div class="online-users">
                <h4>Online Players <span class="online-count"><?php echo count($players) ?></span></h4>
                <div class="user-list">
                    <?php foreach ($players as $player): ?>
                        <div class="user-item">
                            <div class="status-indicator"></div>
                            <span><?php echo htmlspecialchars($player); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
    let ws;
    const room = "<?php echo $room_name ?>";
    const username = "<?php echo $username ?>";

    document.addEventListener('DOMContentLoaded', () => {
        const chatInput = document.querySelector('.chat-input');
        const sendBtn = document.querySelector('.send-btn');
        const chatMessages = document.querySelector('.chat-messages');
        const gamesGrid = document.getElementById('games-grid');
        const gameIframeContainer = document.getElementById('game-iframe-container');
        const gameIframe = document.getElementById('game-iframe');
        const gameTitle = document.getElementById('game-title');
        const actionButton = document.getElementById('action-button');

        // Initialize WebSocket
        ws = new WebSocket('ws://localhost:8080');

        ws.onopen = () => {
            // Send join message ONCE when connection opens
            ws.send(JSON.stringify({ type: 'join', room: room, user: username }));
        };

        ws.onmessage = (event) => {
            const msg = JSON.parse(event.data);
            const newMessage = document.createElement('div');
            newMessage.className = 'message';
            newMessage.innerHTML = `
                <div class="message-avatar">GM</div>
                <div class="message-content">
                    <div class="message-header">
                        <span class="message-author">${msg.user}</span>
                        <span class="message-time">Just now</span>
                    </div>
                    <div class="message-text">${escapeHtml(msg.text)}</div>
                </div>`;
            chatMessages.appendChild(newMessage);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        };

        // Send message
        const sendWebSocketMessage = () => {
    const text = chatInput.value.trim();
    if (text && ws.readyState === WebSocket.OPEN) {
        ws.send(JSON.stringify({ type: 'chat', room: room, user: username ,text: text }));
        chatInput.value = '';
    }
};

        // Escape HTML (prevent XSS)
        const escapeHtml = (unsafe) => {
            return unsafe
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        };

        sendBtn.addEventListener('click', sendWebSocketMessage);
        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendWebSocketMessage();
        });

        // Game iframe display logic
        const showGameInIframe = (gameUrl, gameName) => {
            gamesGrid.style.display = 'none';
            gameIframeContainer.classList.add('active');
            gameIframe.src = gameUrl;
            gameTitle.textContent = gameName;
            actionButton.textContent = 'Back to Games';
            actionButton.onclick = showGamesGrid;
        };

        const showGamesGrid = () => {
            gamesGrid.style.display = 'grid';
            gameIframeContainer.classList.remove('active');
            gameIframe.src = '';
            gameTitle.textContent = 'Popular Games';
            actionButton.textContent = 'Filter';
            actionButton.onclick = null;
        };

        const toggleFullscreen = () => {
            if (gameIframe.requestFullscreen) {
                gameIframe.requestFullscreen();
            } else if (gameIframe.webkitRequestFullscreen) {
                gameIframe.webkitRequestFullscreen();
            } else if (gameIframe.mozRequestFullScreen) {
                gameIframe.mozRequestFullScreen();
            } else if (gameIframe.msRequestFullscreen) {
                gameIframe.msRequestFullscreen();
            }
        };

        document.querySelectorAll('.game-card').forEach(card => {
            card.addEventListener('click', (e) => {
                if (e.target.classList.contains('play-button')) return;
                const gameUrl = card.dataset.url;
                const gameName = card.querySelector('.game-title').textContent;
                showGameInIframe(gameUrl, gameName);
            });

            const playButton = card.querySelector('.play-button');
            playButton.addEventListener('click', (e) => {
                e.stopPropagation();
                const gameUrl = card.dataset.url;
                const gameName = card.querySelector('.game-title').textContent;
                showGameInIframe(gameUrl, gameName);
            });
        });

        actionButton.addEventListener('click', () => {
            if (actionButton.textContent === 'Back to Games') {
                showGamesGrid();
            } else if (gameIframeContainer.classList.contains('active')) {
                toggleFullscreen();
            }
        });
    });
</script>

</body>

</html>
<?php
session_start();

// if (!isset($_SESSION['room_code']) || !isset($_SESSION['username'])) {
//     // Redirect to login or dashboard if session not set
//     header("Location: dashboard.php");
//     exit;
// }

// $room_name = $_SESSION['room_name'] ?? 'Unknown Room';
// $room_code = $_SESSION['room_code'] ?? '';

// $username = $_SESSION['username'];

// Connect to DB
// $conn = new mysqli("localhost", "root", "", "chatroom");

// Store player in room_players if not already there
// $stmt = $conn->prepare("INSERT IGNORE INTO room_players (room_code, username) VALUES (?, ?)");
// $stmt->bind_param("ss", $room_code, $username);
// $stmt->execute();
// $stmt->close();

// Fetch all players in the room
// $players = [];
// $res = $conn->query("SELECT username FROM room_players WHERE room_code = '$room_code'");
// while ($row = $res->fetch_assoc()) {
//     $players[] = $row['username'];
// }
// ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameMatch | Play & Chat</title>
    <style>
        :root {
            --primary: #8a2be2;
            --secondary: #ff3e9d;
            --dark: #121212;
            --medium-dark: #1a1a2e;
            --light: #f0f0f0;
            --accent: #00c2ff;
            --dark-accent: #0a0a0a;
            --online: #4caf50;
            --away: #ff9800;
            --text-muted: #a0a0a0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--dark);
            color: var(--light);
            overflow-x: hidden;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            z-index: 100;
            backdrop-filter: blur(10px);
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: var(--light);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .cta-button {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(138, 43, 226, 0.3);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            cursor: pointer;
        }

        .main-container {
            display: flex;
            flex: 1;
            overflow: hidden;
            position: relative;
        }

        /* Animated background */
        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, var(--primary), transparent);
            opacity: 0.05;
            animation: float 15s infinite ease-in-out;
        }

        .circle:nth-child(1) {
            width: 300px;
            height: 300px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            width: 400px;
            height: 400px;
            top: 40%;
            right: 10%;
            background: radial-gradient(circle, var(--secondary), transparent);
            animation-delay: 5s;
        }

        .circle:nth-child(3) {
            width: 200px;
            height: 200px;
            bottom: 10%;
            left: 30%;
            background: radial-gradient(circle, var(--accent), transparent);
            animation-delay: 10s;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(30px, 20px);
            }

            100% {
                transform: translate(0, 0);
            }
        }

        /* Game container styles */
        .game-container {
            flex: 2;
            display: flex;
            flex-direction: column;
            background-color: var(--medium-dark);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
        }

        .game-header {
            padding: 1rem;
            background-color: rgba(10, 10, 10, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .game-header h3 {
            color: var(--accent);
            font-size: 1.3rem;
        }

        /* Games grid styles */
        .games-grid {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
            overflow-y: auto;
        }

        .game-card {
            background: linear-gradient(145deg, rgba(26, 26, 46, 0.8), rgba(15, 15, 30, 0.8));
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .game-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(138, 43, 226, 0.3);
        }

        .game-img {
            width: 100%;
            height: 120px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .game-img span {
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .game-info {
            padding: 15px;
        }

        .game-title {
            font-size: 1.2rem;
            margin-bottom: 5px;
            color: var(--light);
        }

        .game-description {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 10px;
        }

        .game-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
        }

        .game-rating {
            display: flex;
            align-items: center;
            color: gold;
        }

        .game-players {
            color: var(--accent);
        }

        .play-button {
            width: 100%;
            padding: 8px 0;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.3s;
            margin-top: 10px;
        }

        .play-button:hover {
            opacity: 0.9;
        }

         /* Game iframe styles */
        .game-iframe-container {
            flex: 1;
            padding: 20px;
            display: none; /* Initially hidden */
            flex-direction: column;
        }

        .game-iframe-container.active {
            display: flex; /* Show when active */
        }

        .game-iframe {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        .secondary-button {
            background: transparent;
            color: var(--light);
            border: 2px solid var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        .secondary-button:hover {
            background: var(--primary);
            color: white;
        }

        /* Chat container styles */
        .chat-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 300px;
            background-color: rgba(18, 18, 18, 0.9);
            position: relative;
            z-index: 1;
        }

        .chat-header {
            padding: 1rem;
            background-color: rgba(10, 10, 10, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-header h3 {
            color: var(--accent);
            font-size: 1.3rem;
        }

        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .message {
            display: flex;
            gap: 10px;
        }

        .message-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            flex-shrink: 0;
        }

        .message-content {
            flex: 1;
        }

        .message-header {
            display: flex;
            align-items: baseline;
            gap: 8px;
            margin-bottom: 5px;
        }

        .message-author {
            font-weight: bold;
            background: linear-gradient(90deg, var(--light), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .message-time {
            font-size: 12px;
            color: var(--text-muted);
        }

        .message-text {
            line-height: 1.4;
            background-color: rgba(26, 26, 46, 0.5);
            padding: 10px;
            border-radius: 0 10px 10px 10px;
            border-left: 3px solid var(--primary);
        }

        .chat-input-container {
            padding: 1rem;
            background-color: rgba(10, 10, 10, 0.7);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .chat-input {
            flex: 1;
            background-color: rgba(26, 26, 46, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            padding: 12px 15px;
            color: var(--light);
            font-size: 14px;
            outline: none;
            transition: all 0.3s;
        }

        .chat-input:focus {
            box-shadow: 0 0 0 3px rgba(138, 43, 226, 0.3);
            border-color: var(--primary);
        }

        .emoji-btn,
        .send-btn {
            background-color: transparent;
            border: none;
            color: var(--text-muted);
            font-size: 20px;
            cursor: pointer;
            transition: color 0.2s;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .emoji-btn:hover,
        .send-btn:hover {
            color: var(--accent);
        }

        .send-btn {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 50%;
        }

        .online-users {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem;
            max-height: 200px;
            overflow-y: auto;
            background-color: rgba(18, 18, 18, 0.8);
        }

        .user-list {
            margin-top: 10px;
        }

        .user-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px;
            border-radius: 5px;
            transition: background-color 0.2s;
        }

        .user-item:hover {
            background-color: rgba(26, 26, 46, 0.5);
        }

        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--online);
        }

        .status-away {
            background-color: var(--away);
        }

        .online-count {
            display: inline-block;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            padding: 2px 8px;
            border-radius: 50px;
            font-size: 0.8rem;
            margin-left: 5px;
        }

        .chat-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        min-width: 300px;
        background-color: rgba(18, 18, 18, 0.9);
        position: relative;
        z-index: 1;
        border-radius: 10px;
        overflow: hidden;
    }

    .chat-header {
        padding: 1rem;
        background-color: rgba(10, 10, 10, 0.7);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .chat-header h3 {
        color: var(--accent);
        font-size: 1.3rem;
    }

    .button-section {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 20px;
        padding: 2rem;
        background-color: rgba(18, 18, 18, 0.8);
    }

    .action-btn {
        padding: 12px 20px;
        font-size: 16px;
        color: white;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        border: none;
        border-radius: 30px;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
        min-width: 200px;
    }

    .action-btn:hover {
        background: linear-gradient(90deg, var(--secondary), var(--primary));
        transform: scale(1.05);
    }

        /* Mobile responsiveness */
        @media (max-width: 992px) {
            .main-container {
                flex-direction: column;
            }

            .game-container,
            .chat-container {
                flex: none;
            }

            .game-container {
                height: 50vh;
            }

            .chat-container {
                height: calc(50vh - 69px);
            }

            .online-users {
                display: none;
            }

            .games-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .nav-links {
                display: none;
            }

            .game-header h3 {
                font-size: 1rem;
            }

            .games-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">Game<span>Match</span></div>
        <div class="nav-links">
            <a href="dashboard.php">Home</a>
            <a href="#">Games</a>
            <a href="#">Chatrooms</a>
            <a href="#">About</a>
        </div>
        <?php if (isset($_SESSION['username'])): ?>
            <div class="user-avatar"><?= strtoupper(substr($_SESSION['username'], 0, 2)) ?></div>
            <a class="cta-button" href="logout.php">Logout</a>
        <?php else: ?>
            <a class="cta-button" href="login.php">Login</a>
        <?php endif; ?>
    </nav>

    <div class="main-container">
        <!-- Animated Background -->
        <div class="animated-bg">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>

        <!-- Games Section -->
        <div class="game-container">
            
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

            <div class="game-iframe-container" id="game-iframe-container" style="display:none; position: relative;">
    <button id="back-button" style="position: absolute; top: 10px; left: 10px; z-index: 10; padding: 8px 12px; font-size: 16px; cursor: pointer;">
        ← Back to Games
    </button>
    <iframe class="game-iframe" id="game-iframe" src="" title="Game" style="width: 100%; height: 80vh; border: none;"></iframe>
</div>
        </div>

        <!-- Chatroom Section -->
        <div class="chat-container">
            <div class="chat-header"><h3>Welcome to Chatroom</h3></div>
            <div class="button-section">
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="create-chatroom-popup.php" class="action-btn">Create Chatroom</a>
                    <a href="join-chatroom-popup.php" class="action-btn">Join Chatroom</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const gamesGrid = document.getElementById('games-grid');
        const gameIframeContainer = document.getElementById('game-iframe-container');
        const gameIframe = document.getElementById('game-iframe');
        const backButton = document.getElementById('back-button');

        const showGameInIframe = (gameUrl) => {
            gamesGrid.style.display = 'none';
            gameIframeContainer.style.display = 'block';
            gameIframe.src = gameUrl;
        };

        const showGamesGrid = () => {
            gameIframe.src = '';
            gameIframeContainer.style.display = 'none';
            gamesGrid.style.display = 'grid';
        };

        document.querySelectorAll('.game-card').forEach(card => {
            const playButton = card.querySelector('.play-button');
            playButton.addEventListener('click', (e) => {
                e.stopPropagation();
                const gameUrl = card.dataset.url;
                showGameInIframe(gameUrl);
            });
        });

        backButton.addEventListener('click', () => {
            showGamesGrid();
        });
    });
</script>


</body>


</html>
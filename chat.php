<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameChat - Play Free Games Online</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            min-height: 100vh;
        }

        .navbar {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(139, 92, 246, 0.1);
            padding: 1rem 1.5rem;
        }

        .navbar-content {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo-icon {
            width: 2rem;
            height: 2rem;
            color: #a855f7;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: bold;
            background: linear-gradient(to right, #a855f7, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-link {
            color: #9ca3af;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #a855f7;
        }

        .login-btn {
            background: #7c3aed;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background: #6d28d9;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        .main-content {
            display: flex;
            gap: 2rem;
        }

        .games-section {
            flex: 1;
        }

        .hero {
            text-align: center;
            margin-bottom: 3rem;
        }

        .hero h2 {
            font-size: 2.25rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .hero-emoji {
            color: #a855f7;
        }

        .hero p {
            color: #6b7280;
            font-size: 1.125rem;
        }

        .game-filter {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .filter-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn.active {
            background: #3b82f6;
            color: white;
            box-shadow: 0 4px 14px -2px rgba(59, 130, 246, 0.4);
        }

        .filter-btn:not(.active) {
            background: #e5e7eb;
            color: #374151;
        }

        .filter-btn:not(.active):hover {
            background: #d1d5db;
        }

        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .game-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .game-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .game-header {
            height: 10rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .game-icon {
            font-size: 2.5rem;
            opacity: 0.9;
            transition: transform 0.3s ease;
        }

        .game-card:hover .game-icon {
            transform: scale(1.1);
        }

        .play-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            padding: 0.5rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .play-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .game-content {
            padding: 1rem;
        }

        .game-title {
            font-size: 1.125rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .game-stats {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .star-icon {
            width: 1rem;
            height: 1rem;
            color: #fbbf24;
            fill: currentColor;
        }

        .rating-text {
            font-size: 0.875rem;
            font-weight: 500;
            color: #6b7280;
        }

        .players {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            color: #10b981;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .players-dot {
            width: 0.5rem;
            height: 0.5rem;
            background: #10b981;
            border-radius: 50%;
        }

        .chat-section {
            width: 20rem;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            height: calc(100vh - 200px);
        }

        .online-users {
            background: white;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1rem;
        }

        .online-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .online-title {
            color: #1f2937;
            font-weight: 600;
        }

        .online-count {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .online-dot {
            width: 0.75rem;
            height: 0.75rem;
            color: #10b981;
            fill: currentColor;
        }

        .online-number {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .users-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .user-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-avatar {
            position: relative;
        }

        .avatar-circle {
            width: 2rem;
            height: 2rem;
            background: linear-gradient(to right, #a855f7, #ec4899);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .status-dot {
            position: absolute;
            bottom: -2px;
            right: -2px;
            width: 0.75rem;
            height: 0.75rem;
            border: 2px solid white;
            border-radius: 50%;
        }

        .status-online {
            color: #10b981;
            fill: currentColor;
        }

        .status-away {
            color: #f59e0b;
            fill: currentColor;
        }

        .user-name {
            color: #374151;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .chat-room {
            flex: 1;
            background: white;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            display: flex;
            flex-direction: column;
            min-height: 0;
        }

        .chat-header {
            color: #1f2937;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .messages-container {
            flex: 1;
            overflow-y: auto;
            margin-bottom: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            min-height: 0;
        }

        .message {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .message-avatar {
            width: 2rem;
            height: 2rem;
            background: linear-gradient(to right, #a855f7, #ec4899);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.875rem;
            font-weight: 600;
            flex-shrink: 0;
        }

        .message-content {
            flex: 1;
            min-width: 0;
        }

        .message-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.25rem;
        }

        .message-user {
            color: #7c3aed;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .message-time {
            color: #9ca3af;
            font-size: 0.75rem;
        }

        .message-text {
            color: #374151;
            font-size: 0.875rem;
            background: #f9fafb;
            padding: 0.75rem;
            border-radius: 0.5rem;
            word-break: break-words;
        }

        .message-input {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-top: 1px solid #e5e7eb;
            padding-top: 1rem;
        }

        .input-container {
            flex: 1;
            display: flex;
            align-items: center;
            background: #f3f4f6;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .input-container:focus-within {
            border-color: #a855f7;
            box-shadow: 0 0 0 2px rgba(168, 85, 247, 0.1);
        }

        .message-input-field {
            flex: 1;
            background: transparent;
            color: #374151;
            padding: 0.75rem 1rem;
            border: none;
            outline: none;
        }

        .message-input-field::placeholder {
            color: #9ca3af;
        }

        .emoji-btn {
            padding: 0.5rem;
            color: #9ca3af;
            border: none;
            background: none;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .emoji-btn:hover {
            color: #a855f7;
        }

        .send-btn {
            background: linear-gradient(to right, #a855f7, #ec4899);
            color: white;
            padding: 0.75rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(168, 85, 247, 0.2);
        }

        .send-btn:hover {
            box-shadow: 0 4px 8px rgba(168, 85, 247, 0.3);
            transform: translateY(-1px);
        }

        .icon {
            width: 1.25rem;
            height: 1.25rem;
        }

        /* Custom scrollbar */
        .messages-container::-webkit-scrollbar {
            width: 6px;
        }

        .messages-container::-webkit-scrollbar-track {
            background: rgba(209, 213, 219, 0.3);
            border-radius: 3px;
        }

        .messages-container::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #a855f7, #ec4899);
            border-radius: 3px;
        }

        .messages-container::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #9333ea, #db2777);
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .main-content {
                flex-direction: column;
            }
            
            .chat-section {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-content">
            <div class="logo">
                <svg class="logo-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-7 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                </svg>
                <h1 class="logo-text">GameChat</h1>
            </div>
            
            <div class="nav-links">
                <a href="#" class="nav-link active">Home</a>
                <a href="#" class="nav-link">All Games</a>
                <a href="#" class="nav-link">Chatrooms</a>
                <a href="#" class="nav-link">About</a>
                <a href="#" class="nav-link">Contact</a>
            </div>
            
            <a href="#" class="login-btn">Login</a>
        </div>
    </nav>

    <div class="container">
        <div class="main-content">
            <!-- Games Section -->
            <div class="games-section">
                <div class="hero">
                    <h2>
                        <span class="hero-emoji">🎮</span>
                        <span>Play Free Games Online</span>
                    </h2>
                    <p>Instant play, no downloads required!</p>
                </div>
                
                <div class="game-filter">
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">Action</button>
                    <button class="filter-btn">Puzzle</button>
                    <button class="filter-btn">Multiplayer</button>
                    <button class="filter-btn">Racing</button>
                    <button class="filter-btn">Strategy</button>
                    <button class="filter-btn">Adventure</button>
                </div>
                
                <div class="games-grid">
                    <div class="game-card">
                        <div class="game-header" style="background: linear-gradient(135deg, #fb923c, #ef4444);">
                            <div class="game-icon">🏎️</div>
                            <button class="play-btn">
                                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-7 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                </svg>
                                Play
                            </button>
                        </div>
                        <div class="game-content">
                            <h3 class="game-title">Smash Karts</h3>
                            <div class="game-stats">
                                <div class="rating">
                                    <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span class="rating-text">4.8</span>
                                </div>
                                <div class="players">
                                    <div class="players-dot"></div>
                                    <span>2.3K</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="game-card">
                        <div class="game-header" style="background: linear-gradient(135deg, #f87171, #ec4899);">
                            <div class="game-icon">🚀</div>
                            <button class="play-btn">
                                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-7 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                </svg>
                                Play
                            </button>
                        </div>
                        <div class="game-content">
                            <h3 class="game-title">Among Us</h3>
                            <div class="game-stats">
                                <div class="rating">
                                    <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span class="rating-text">4.9</span>
                                </div>
                                <div class="players">
                                    <div class="players-dot"></div>
                                    <span>5.2K</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="game-card">
                        <div class="game-header" style="background: linear-gradient(135deg, #4ade80, #10b981);">
                            <div class="game-icon">⛏️</div>
                            <button class="play-btn">
                                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-7 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                </svg>
                                Play
                            </button>
                        </div>
                        <div class="game-content">
                            <h3 class="game-title">Minecraft Classic</h3>
                            <div class="game-stats">
                                <div class="rating">
                                    <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span class="rating-text">4.7</span>
                                </div>
                                <div class="players">
                                    <div class="players-dot"></div>
                                    <span>3.1K</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Chat Section -->
            <div class="chat-section">
                <!-- Online Users -->
                <div class="online-users">
                    <div class="online-header">
                        <h3 class="online-title">Online Players</h3>
                        <div class="online-count">
                            <svg class="online-dot" fill="currentColor" viewBox="0 0 20 20">
                                <circle cx="10" cy="10" r="10"/>
                            </svg>
                            <span class="online-number">4</span>
                        </div>
                    </div>
                    
                    <div class="users-list">
                        <div class="user-item">
                            <div class="user-avatar">
                                <div class="avatar-circle">J</div>
                                <svg class="status-dot status-online" fill="currentColor" viewBox="0 0 20 20">
                                    <circle cx="10" cy="10" r="10"/>
                                </svg>
                            </div>
                            <span class="user-name">jaya</span>
                        </div>
                        
                        <div class="user-item">
                            <div class="user-avatar">
                                <div class="avatar-circle">A</div>
                                <svg class="status-dot status-online" fill="currentColor" viewBox="0 0 20 20">
                                    <circle cx="10" cy="10" r="10"/>
                                </svg>
                            </div>
                            <span class="user-name">alex_gamer</span>
                        </div>
                        
                        <div class="user-item">
                            <div class="user-avatar">
                                <div class="avatar-circle">P</div>
                                <svg class="status-dot status-away" fill="currentColor" viewBox="0 0 20 20">
                                    <circle cx="10" cy="10" r="10"/>
                                </svg>
                            </div>
                            <span class="user-name">pro_player</span>
                        </div>
                    </div>
                </div>
                
                <!-- Chat Room -->
                <div class="chat-room">
                    <h3 class="chat-header">Chat Room</h3>
                    
                    <div class="messages-container">
                        <div class="message">
                            <div class="message-avatar">J</div>
                            <div class="message-content">
                                <div class="message-header">
                                    <span class="message-user">jaya</span>
                                    <span class="message-time">2:30 PM</span>
                                </div>
                                <div class="message-text">Anyone up for a game of Snake?</div>
                            </div>
                        </div>
                        
                        <div class="message">
                            <div class="message-avatar">A</div>
                            <div class="message-content">
                                <div class="message-header">
                                    <span class="message-user">alex_gamer</span>
                                    <span class="message-time">2:28 PM</span>
                                </div>
                                <div class="message-text">I just beat the high score in Tetris! 🎉</div>
                            </div>
                        </div>
                        
                        <div class="message">
                            <div class="message-avatar">P</div>
                            <div class="message-content">
                                <div class="message-header">
                                    <span class="message-user">pro_player</span>
                                    <span class="message-time">2:25 PM</span>
                                </div>
                                <div class="message-text">New racing tournament starting soon!</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="message-input">
                        <div class="input-container">
                            <input type="text" class="message-input-field" placeholder="Type your message...">
                            <button class="emoji-btn">
                                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="m9 9 1.5 1.5L15 6"/>
                                </svg>
                            </button>
                        </div>
                        <button class="send-btn">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
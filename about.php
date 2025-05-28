<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | GameMatch - Where Gaming Meets Connection</title>
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
            line-height: 1.6;
        }

        /* Animated Background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.03;
            animation: float 20s infinite ease-in-out;
        }

        .floating-shape:nth-child(1) {
            width: 400px;
            height: 400px;
            top: 10%;
            left: 10%;
            background: radial-gradient(circle, var(--primary), transparent);
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            width: 300px;
            height: 300px;
            top: 60%;
            right: 15%;
            background: radial-gradient(circle, var(--secondary), transparent);
            animation-delay: 7s;
        }

        .floating-shape:nth-child(3) {
            width: 500px;
            height: 500px;
            bottom: 20%;
            left: 50%;
            background: radial-gradient(circle, var(--accent), transparent);
            animation-delay: 14s;
        }

        .floating-shape:nth-child(4) {
            width: 200px;
            height: 200px;
            top: 30%;
            left: 70%;
            background: radial-gradient(circle, var(--primary), transparent);
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(30px, -20px) rotate(90deg); }
            50% { transform: translate(-20px, 30px) rotate(180deg); }
            75% { transform: translate(20px, 10px) rotate(270deg); }
        }

        /* Navigation */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(15px);
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .back-button {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .back-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(138, 43, 226, 0.4);
        }

        /* Hero Section */
        .hero-section {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem 5%;
            position: relative;
        }

        .hero-content {
            max-width: 800px;
            animation: fadeInUp 1s ease-out;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--primary), var(--secondary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(138, 43, 226, 0.5);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        .hero-description {
            font-size: 1.2rem;
            line-height: 1.8;
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        /* Stats Section */
        .stats-section {
            padding: 4rem 5%;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.5), rgba(18, 18, 18, 0.8));
            backdrop-filter: blur(10px);
            margin: 2rem 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
            background: rgba(26, 26, 46, 0.3);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
            cursor: pointer;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(138, 43, 226, 0.2);
            border-color: var(--primary);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Features Section */
        .features-section {
            padding: 4rem 5%;
        }

        .section-title {
            text-align: center;
            font-size: 3rem;
            margin-bottom: 3rem;
            background: linear-gradient(90deg, var(--light), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: linear-gradient(145deg, rgba(26, 26, 46, 0.6), rgba(15, 15, 30, 0.8));
            padding: 2rem;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .feature-card:hover::before {
            left: 100%;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(138, 43, 226, 0.3);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }

        .feature-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--accent);
        }

        .feature-description {
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* Team Section */
        .team-section {
            padding: 4rem 5%;
            background: linear-gradient(135deg, rgba(18, 18, 18, 0.8), rgba(26, 26, 46, 0.5));
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .team-card {
            text-align: center;
            padding: 2rem;
            background: rgba(26, 26, 46, 0.4);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 194, 255, 0.2);
        }

        .team-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
        }

        .team-name {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: var(--light);
        }

        .team-role {
            color: var(--accent);
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .team-description {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* CTA Section */
        .cta-section {
            padding: 4rem 5%;
            text-align: center;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            margin: 2rem 0;
        }

        .cta-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: white;
        }

        .cta-description {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .cta-button {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .cta-button:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .hero-description {
                font-size: 1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .features-grid,
            .team-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 1rem 3%;
            }

            .logo {
                font-size: 1.5rem;
            }

            .hero-section {
                padding: 1rem 3%;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
    </div>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="logo">Game<span>Match</span></div>
        <a href="javascript:history.back()" class="back-button">
            ← Go Back
        </a>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">About GameMatch</h1>
            <p class="hero-subtitle">Where Gaming Meets Connection</p>
            <p class="hero-description">
                We're revolutionizing the way gamers connect, play, and build communities. 
                GameMatch isn't just a platform – it's your gateway to endless gaming adventures 
                and meaningful connections with players worldwide.
            </p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section animate-on-scroll">
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-number" data-target="222">0</span>
                <span class="stat-label">Active Players</span>
            </div>
            <div class="stat-card">
                <span class="stat-number" data-target="222">0</span>
                <span class="stat-label">Games Available</span>
            </div>
            <div class="stat-card">
                <span class="stat-number" data-target="222">0</span>
                <span class="stat-label">Chatrooms Created</span>
            </div>
            <div class="stat-card">
                <span class="stat-number" data-target="222">0</span>
                <span class="stat-label">Hours Online Daily</span>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <h2 class="section-title animate-on-scroll">What Makes Us Special</h2>
        <div class="features-grid">
            <div class="feature-card animate-on-scroll">
                <span class="feature-icon">🎮</span>
                <h3 class="feature-title">Instant Gaming</h3>
                <p class="feature-description">
                    Jump into your favorite games instantly without downloads or installations. 
                    Our cloud-based platform ensures smooth gameplay across all devices.
                </p>
            </div>
            <div class="feature-card animate-on-scroll">
                <span class="feature-icon">💬</span>
                <h3 class="feature-title">Real-time Chat</h3>
                <p class="feature-description">
                    Connect with fellow gamers through our advanced chat system. 
                    Share strategies, make friends, and build lasting gaming communities.
                </p>
            </div>
            <div class="feature-card animate-on-scroll">
                <span class="feature-icon">🏆</span>
                <h3 class="feature-title">Competitive Spirit</h3>
                <p class="feature-description">
                    Participate in tournaments, climb leaderboards, and showcase your skills. 
                    Every game is a chance to prove your worth and earn recognition.
                </p>
            </div>
            <div class="feature-card animate-on-scroll">
                <span class="feature-icon">🌍</span>
                <h3 class="feature-title">Global Community</h3>
                <p class="feature-description">
                    Join a worldwide network of passionate gamers. Language barriers? 
                    We've got built-in translation to keep the conversation flowing.
                </p>
            </div>
            <div class="feature-card animate-on-scroll">
                <span class="feature-icon">🔒</span>
                <h3 class="feature-title">Safe & Secure</h3>
                <p class="feature-description">
                    Your privacy and security are our top priorities. Advanced moderation 
                    and encryption ensure a safe gaming environment for everyone.
                </p>
            </div>
            <div class="feature-card animate-on-scroll">
                <span class="feature-icon">📱</span>
                <h3 class="feature-title">Cross-Platform</h3>
                <p class="feature-description">
                    Play seamlessly across desktop, mobile, and tablet. Your progress 
                    and connections sync automatically across all your devices.
                </p>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <h2 class="section-title animate-on-scroll">Meet Our Team</h2>
        <div class="team-grid">
            <div class="team-card animate-on-scroll">
                <div class="team-avatar">🛡️</div>
                <h3 class="team-name">Kya Bee</h3>
                <p class="team-role">hehe</p>
                <p class="team-description">
                    haha hehe haha hehe haha hehe haha hehe
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section animate-on-scroll">
        <h2 class="cta-title">Ready to Level Up?</h2>
        <p class="cta-description">
            Join thousands of gamers who've already discovered the future of online gaming.
        </p>
    </section>

    <script>
        // Animated counter for stats
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);
            
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start).toLocaleString();
                }
            }, 16);
        }

        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    
                    // Animate counters when stats section becomes visible
                    if (entry.target.classList.contains('stats-section')) {
                        const counters = entry.target.querySelectorAll('.stat-number');
                        counters.forEach(counter => {
                            const target = parseInt(counter.dataset.target);
                            animateCounter(counter, target);
                        });
                    }
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // Add some interactive hover effects to stat cards
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(-10px) scale(1)';
            });
        });

        // Add click effect to feature cards
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('click', () => {
                card.style.transform = 'translateY(-5px) scale(1.02)';
                setTimeout(() => {
                    card.style.transform = 'translateY(-5px) scale(1)';
                }, 150);
            });
        });

        // Smooth scrolling for better UX
        document.documentElement.style.scrollBehavior = 'smooth';

        // Add some sparkle effect on team card hover
        document.querySelectorAll('.team-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                const avatar = card.querySelector('.team-avatar');
                avatar.style.transform = 'scale(1.1) rotateY(10deg)';
                avatar.style.boxShadow = '0 15px 30px rgba(138, 43, 226, 0.4)';
            });
            
            card.addEventListener('mouseleave', () => {
                const avatar = card.querySelector('.team-avatar');
                avatar.style.transform = 'scale(1) rotateY(0deg)';
                avatar.style.boxShadow = 'none';
            });
        });
    </script>
</body>

</html>
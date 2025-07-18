🎮 Chatroom Game Platform
A real-time chatroom website built out of pure frustration during lab sessions — now turned into something fun and functional!

💡 About the Project
Ever tried playing browser games with your friends during lab sessions but ended up in chaos sharing game links and room codes?

This project solves that problem.

You can now log in, create or join chatrooms, and jump straight into multiplayer browser games — no mess, no confusion.

🚀 Features
🔐 User Login & Signup

🗨️ Real-time Chat (powered by WebSockets)

🎮 Game Interface with Embedded Browser Games

🏠 Create / Join Private Rooms

📜 Chatroom History (previous rooms listed after login)

🎯 Smooth UX for quick gaming with friends

🛠️ Tech Stack
Frontend: HTML, CSS, JavaScript

Backend: PHP, MySQL

WebSocket Server: Node.js + WebSocket

Database: MySQL

Hosting/Local Dev: XAMPP (Apache + MySQL)

📂 Folder Structure
bash
Copy
Edit
myproject/
├── htdocs/                 # Frontend + PHP backend
│   ├── index.html
│   ├── login.php
│   ├── chatroom.php
│   └── ...
└── websocket-server/       # Node.js WebSocket server
    └── server.js
🧑‍💻 How to Run Locally
1. Clone the repository
bash
Copy
Edit
git clone https://github.com/your-username/your-chatroom-repo.git
2. Start XAMPP
Launch Apache and MySQL

Import the SQL file (if provided) into phpMyAdmin

3. Run WebSocket Server
bash
Copy
Edit
cd websocket-server
npm install
node server.js
4. Access the app
Navigate to http://localhost/myproject/ in your browser.

⚠️ Notes
Make sure ports (e.g., 3306 for MySQL, 3000 for WebSockets) are not blocked.

WebSocket server must be running before starting chatroom communication.

Tested primarily on desktop browsers.

🧠 Behind the Scenes
This was born during college lab hours — not breaks 😉. We just wanted to play some simple games together, but even that was a hassle. So we built this.

Now everyone can create their own mini gaming lounge!

📩 Feedback or Contributions
Feel free to open an issue or submit a pull request. Collaboration and feedback are welcome!

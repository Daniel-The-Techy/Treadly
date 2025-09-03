
📝 Treadly

A modern microblogging platform that connects writers and readers. Share your thoughts, follow your favorite authors, and engage in meaningful conversations — all in a clean and interactive environment.

✨ Features

👤 User Profiles

Modern profile page

Shows number of posts, followers, and following

Editable profile details with image upload

📝 Content Creation

Create posts with ease

Edit or delete posts anytime

Rich interactions: likes, comments, real-time reactions

🔔 Social Features

Follow authors to build your personal feed

Threaded comments for structured conversations

Collections and hashtags to organize content

📊 Dynamic Dashboard

Customize your profile settings

Create and update posts from one place

Track your activity and engagement stats

🚀 Tech Stack

Frontend: Vue.js + Tailwind CSS

Backend: Laravel (or your backend framework here)

Database: MySQL/PostgreSQL

Auth: Laravel Breeze / Sanctum (or your auth package)

📂 Project Structure

\nproject-root/\n├── frontend/ # Vue + Tailwind UI\n├── backend/ # Laravel API\n├── database/ # Migrations & seeders\n└── README.md\n\n\n---

🛠️ Getting Started
Prerequisites

Node.js & npm

PHP & Composer

MySQL/PostgreSQL

Installation

bash\n# Clone the repository\ngit clone https://github.com/your-username/Treadly.git\n\ncd microblogger\n\n# Install backend dependencies\ncd backend\ncomposer install\ncp .env.example .env\nphp artisan key:generate\nphp artisan migrate --seed\n\n# Install frontend dependencies\ncd ../frontend\nnpm install\nnpm run dev\n\n\n---



🤝 Contributing

Contributions are welcome! Please fork the repository and submit a pull request for review.

📜 License

This project is licensed under the MIT License.

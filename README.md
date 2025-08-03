<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

🔹 Laravel AI Chat Application
This is a simple web-based chat application built using Laravel, Blade, Tailwind CSS, and the OpenAI GPT-3.5-turbo model. It allows users to chat with an AI assistant and stores the conversation history in the session.

✅ Features
Chat interface with user/assistant message alignment.

Session-based chat history persistence.

Uses either:

Raw HTTP API call with Http::withToken(...) (in store1() method).

Official OpenAI PHP client (in store() method — recommended).

Includes /chatapp/reset route to clear the conversation.

📦 Tech Stack
Backend: Laravel 10+

Frontend: Blade, Tailwind CSS

AI: OpenAI GPT-3.5-turbo API

Session: Laravel session for temporary chat storage



# CarNexus Virtual Showroom

This project is a web-based showroom application for buying, exploring, and servicing cars. Designed for a fictional dealership called *CarNexus*, the platform provides both customer-facing pages and an admin backend to manage services and test drives.

## 🚗 Features

- **Home Page** with navigation to all sections.
- **Car Listing** (`2CARS.html`) showcasing available models with details pages.
- **Service Booking** (`3Service.html`) for scheduling car services.
- **Test Drive Scheduling** (`4Testdrive.html`) so customers can book test drives.
- **Car Comparison** (`5Compare.html`) to compare multiple models.
- **Offers Page** (`6Offers.html`) listing current promotions.
- **EMI Calculator** (`7EMI.html`) to estimate monthly payments.
- **Customer Reviews** (`8Review.html`) section.
- **Location Information** (`9Location.html`) to find showrooms.
- **Authentication** pages: `Login.html`, `Signup.html`, `forgetpassword.html`.
- **Admin Panel** (`AdminPanel.html`) and associated backend PHP scripts for login, logout, dashboard, and CRUD operations on services and test drives.
- **Data Storage**: MySQL Tables.
- **Frontend assets**: HTML, CSS (`style.css`, `cars.css`), JavaScript (`web.js`), images in `/photo` and videos.

# live : https://carnexus.netlify.app
## 🛠 Backend (PHP)

Located in the `Backend/` directory:

- `database.php` – database connection helper.
- Scripts for adding, updating, deleting services/test drives (`addService.php`, `update_service.php`, `delete_service.php`, etc.).
- `admin_Login.php`, `admin_logout.php`, and `admin_dashboard.php` manage admin authentication and dashboard.
- `Signup.php` handles user registration.
- `insertTxt.php`, `sAc.php` perform file operations for storing user data.

## 📁 Database 

The `Mysql DB/`  contains:

- `SignupData.txt` – stores user signups.
- `TestdriveData.txt` – stores test drive booking information.
- `check.php` and `fail.php` – utility scripts for data validation (if used).

## 📁 Frontend

All customer-facing HTML in `Frontend/` along with:

- `style.css`, `cars.css` for styling.
- `web.js` for interactive behavior.
- Car-specific pages under `Frontend/Cars/`.
- `Frontend/models/` for 3D models of specific cars.

## 📂 Additional Assets

- **Photos**: `/photo` directory for images used across site.
- **Videos**: `/Video` for testdrive page's video.



Thanks for checking out *CarNexus*! Feel free to extend or refactor according to your needs. Happy coding! ✨

[![devlogo.png](https://i.postimg.cc/V6rHJyWn/devlogo.png)](https://postimg.cc/phvBS67L)

## Table of Contents
1. [Concept](#concept)
2. [Installation](#installation)
    - [Installing XAMPP](#installing-xampp)
    - [Running the Project](#running-the-project)
3. [Stack](#stack)
4. [Features](#features)
5. [License](#license)
6. [Contributing](#contributing)
7. [Contact](#contact)
<br><br>
[![Capture-d-cran-2024-08-29-105121.png](https://i.postimg.cc/4NV7npJq/Capture-d-cran-2024-08-29-105121.png)](https://postimg.cc/kBMXp6Rv)

## Concept

DevNavigator is a web application designed to allow developers to share development-related content and could even serve as an information monitoring tool.<br><br>It offers user accounts, content management and a contact form for easy communication.<br><br>The app is designed with a focus on simplicity and user experience, providing a platform where users can manage their account settings, edit their profile and write blog posts about the technologies that support them. interested.<br><br>A simple and efficient CRUD system allows instinctive use.
DevNavigator is a side-project designed with the idea of ​​offering an information monitoring tool to beginners and experts alike, while respecting current expectations in terms of functionality.<br><br>The user can therefore also like or comment on publications, like a social network!

## Installation

### Installing XAMPP

To run DevNavigator on your local machine, you'll need XAMPP. Follow these steps to install XAMPP on a Linux system:

1. **Download XAMPP:**
   Visit the [XAMPP website](https://www.apachefriends.org/index.html) and download the Linux version of XAMPP.

2. **Install XAMPP:**
   Open a terminal and navigate to the directory where you downloaded the XAMPP installer. Run the following command to install XAMPP:
   ```bash
   sudo chmod +x xampp-linux-x64-<version>-installer.run
   sudo ./xampp-linux-x64-<version>-installer.run
    ```

3. **Start XAMPP: After installation, start the XAMPP control panel with:**
   ```bash
   sudo /opt/lampp/lampp start
    ```
### Running the Project

1. **Place the Project in the XAMPP Directory: Copy your project folder to the XAMPP htdocs directory:**
   ```bash
   sudo cp -r /path/to/your/project /opt/lampp/htdocs/
    ```

2. **Set Up the Database:**
- Open phpMyAdmin by navigating to http://localhost/phpmyadmin in your web browser.
- Create a new database and import the required SQL files if applicable.

3. **Configure Your Database Connection:**
Edit the config/mysql.php file to match your database credentials. Ensure that the database name, username, and password are correctly configured.

4. **Access the Project:**
Open your web browser and navigate to http://localhost/your_project_folder to view the application.

## Stack

- **PHP**: Server-side scripting language for dynamic content.
- **HTML**: Markup language for structuring web content.
- **CSS**: Styling language for design and layout.
- **Bootstrap**: Front-end framework for responsive design.
- **JavaScript**: Scripting language for interactive features.
- **MySQL**: Database management system for storing data.
- **phpMyAdmin**: Web-based interface for managing MySQL databases.

## Features

**User Account Management:**

- View and edit account settings.
- Change password securely.
- Delete account functionality.

<br>

[![Capture-d-cran-2024-08-29-105419.png](https://i.postimg.cc/HLxk0Mgp/Capture-d-cran-2024-08-29-105419.png)](https://postimg.cc/zysN8VvM)

<br>

[![Capture-d-cran-2024-08-29-105519.png](https://i.postimg.cc/k5zqxhsc/Capture-d-cran-2024-08-29-105519.png)](https://postimg.cc/67rkKcD2)

<br>

[![Capture-d-cran-2024-08-29-105726.png](https://i.postimg.cc/c1QtLQ1j/Capture-d-cran-2024-08-29-105726.png)](https://postimg.cc/F1HHPkLg)

<br>

[![Capture-d-cran-2024-08-29-105745.png](https://i.postimg.cc/PqpPsDFS/Capture-d-cran-2024-08-29-105745.png)](https://postimg.cc/XZWV9rW5)

<br>

**Contact Form:**

- Submit inquiries with validation and data handling.
- Confirmation of received messages.
<br>

[![Capture-d-cran-2024-08-29-105327.png](https://i.postimg.cc/PrsNGNm4/Capture-d-cran-2024-08-29-105327.png)](https://postimg.cc/RqdvKSp6)

<br>

[![Capture-d-cran-2024-08-29-110532.png](https://i.postimg.cc/hPBxL23c/Capture-d-cran-2024-08-29-110532.png)](https://postimg.cc/5js61SVR)

<br>

**Content Management:**

- Manage and view articles (depending on your implementation).

<br>

[![Capture-d-cran-2024-08-29-105601.png](https://i.postimg.cc/7ZQkkQFk/Capture-d-cran-2024-08-29-105601.png)](https://postimg.cc/5XvG5p97)

<br>

[![Capture-d-cran-2024-08-29-105634.png](https://i.postimg.cc/qqGPZmsW/Capture-d-cran-2024-08-29-105634.png)](https://postimg.cc/2LV917Xx)

<br>

[![Capture-d-cran-2024-08-29-105706.png](https://i.postimg.cc/t4F30LZ1/Capture-d-cran-2024-08-29-105706.png)](https://postimg.cc/Js4DZYQm)

<br>

**Responsive Design:**

- Mobile-friendly interface using Bootstrap.

<br>

[![devscreenmobile.png](https://i.postimg.cc/jjKkB65b/devscreenmobile.png)](https://postimg.cc/68j0vvnj)

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Contributing

If you'd like to contribute to DevNavigator, please follow these steps:

1. Fork the repository.
2. Create a new branch (git checkout -b feature-branch).
3. Make your changes and commit them (git commit -am 'Add new feature').
4. Push to the branch (git push origin feature-branch).
5. Create a new Pull Request.

## Contact

For any questions or issues, please reach out to deferclement59@gmail.com


Feel free to customize the content further based on your specific project details and preferences.
<br><hr><br>

**AUTHOR:** Clément DEFER
# BIM Model Viewer Application

## Overview
This PHP application is designed for Building Information Modeling (BIM) model viewing, measuring, and clash detection. It allows users to manage projects, upload BIM models in .IFC format, and generate clash detection reports. The application utilizes Bootstrap for responsive design and Three.js for 3D model viewing.

## Features
- User authentication (registration and login)
- Company management (adding users to companies)
- Project management (creating and viewing projects)
- BIM model upload and viewing
- Clash detection reports with CRUD functionality
- Filterable and sortable model and clash logs
- Responsive design using Bootstrap

## Technology Stack
- PHP
- Bootstrap
- Three.js
- Supabase (for database and authentication)
- JavaScript (for client-side functionality)

## Project Structure
```
phpBIM
├── public
│   ├── css
│   │   └── style.css
│   ├── js
│   │   ├── viewer.js
│   │   ├── apiClient.js
│   │   ├── forms.js
│   │   ├── clashLog.js
│   │   └── modelLog.js
│   └── index.php
├── src
│   ├── Controllers
│   │   ├── AuthController.php
│   │   ├── ProjectController.php
│   │   ├── ModelController.php
│   │   ├── ClashController.php
│   │   ├── UserController.php
│   │   └── CompanyController.php
│   ├── Models
│   │   ├── User.php
│   │   ├── Company.php
│   │   ├── Project.php
│   │   ├── IfcModel.php
│   │   ├── Clash.php
│   │   └── Comment.php
│   ├── Services
│   │   ├── AuthService.php
│   │   ├── DatabaseService.php
│   │   ├── StorageService.php
│   │   ├── ProjectService.php
│   │   └── ClashService.php
│   ├── Views
│   │   ├── layouts
│   │   │   └── main.php
│   │   ├── auth
│   │   │   ├── login.php
│   │   │   └── register.php
│   │   ├── projects
│   │   │   ├── index.php
│   │   │   ├── create.php
│   │   │   └── show.php
│   │   ├── models
│   │   │   ├── upload.php
│   │   │   └── log.php
│   │   ├── clashes
│   │   │   ├── index.php
│   │   │   ├── create.php
│   │   │   ├── show.php
│   │   │   └── edit.php
│   │   └── partials
│   │       ├── _clashForm.php
│   │       ├── _modelForm.php
│   │       └── _commentForm.php
│   └── Core
│       ├── Router.php
│       └── Request.php
├── config
│   └── config.php
├── composer.json
└── README.md
```

## Installation
1. Clone the repository:
   ```
   git clone [<repository-url>](https://github.com/ibuilder/phpBIM.git)
   cd php-bim-viewer-app
   ```

2. Install dependencies using Composer:
   ```
   composer install
   ```

3. Configure your database settings in `config/config.php`.

4. Set up your Supabase project and update the API keys in the configuration file.

5. Start a local PHP server:
   ```
   php -S localhost:8000 -t public
   ```

6. Access the application at `http://localhost:8000`.

## Usage
- Register a new account or log in to an existing account.
- Create a company and add users to it.
- Create projects and upload BIM models.
- View clash detection reports and manage them through the CRUD interface.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License
This project is licensed under the MIT License. See the LICENSE file for details.

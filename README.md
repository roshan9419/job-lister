# Job Lister

[![Made By](https://img.shields.io/badge/Made%20by-Roshan-blue.svg)](https://github.com/roshan9419) [![Made With Love](https://img.shields.io/badge/Made%20With-Love-orange.svg)](https://github.com/roshan9419) [![Awesome](https://cdn.rawgit.com/sindresorhus/awesome/d7305f38d29fed78fa85652e3a63e154dd8e8829/media/badge.svg)](https://github.com/roshan9419) [![Open Source Love](https://badges.frapsoft.com/os/v2/open-source.svg?v=103)](https://github.com/roshan9419) [![Stars](https://img.shields.io/github/stars/roshan9419/job-lister.svg?style=flat&color=orange)](https://github.com/roshan9419) [![Top Language](https://img.shields.io/github/languages/top/roshan9419/job-lister.svg?style=flat&color=informational)](https://github.com/roshan9419) [![Issues](https://img.shields.io/github/issues/roshan9419/job-lister.svg)](https://github.com/roshan9419) [![PR](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat)](https://github.com/roshan9419)

<br>

## About

Job lister is developed using Laravel framework and MySQL for database. It shows job listings which helps candidates to find their perfect jobs. Here, company can create job posts and candidates can filter and search them out and can direct apply to it.

<br>

## Some screenshots
<img src="readme_images/home.jpg" width="100%" title="Home Page">
<img src="readme_images/recent_jobs.jpg" width="100%" title="Recent Jobs">
<img src="readme_images/jobs.jpg" width="100%" title="Jobs">
<img src="readme_images/job_detail.jpg" width="100%" title="Job Detail">
<img src="readme_images/company_profile.jpg" width="100%" title="Company dashboard">
<img src="readme_images/create_job.jpg" width="100%" title="Create New Job">
<img src="readme_images/jobs_posted.jpg" width="100%" title="Company Posted Jobs">
<img src="readme_images/my_applications.jpg" width="100%" title="Candidate applied applications">
<img src="readme_images/responsive.png" width="100%" title="Responsiveness">  

<br>

## Setup Project

1. Clone or download the project
```sh
git clone https://github.com/roshan9419/job-lister.git
```

2. Install and build the dependencies in the project directory
```sh
cd job-lister
composer install
npm install
npm run dev
```

3. Create .env file from .env.example file
```sh
copy .env.example .env
```

4. Generate the key of your project
```sh
php artisan key:generate
```

5. Migrate the tables into database (Make sure you have done below Environment > Database configurations)
```sh
php artisan migrate
```

6. Run / Serve the project locally
```sh
php aritsan serve
````

## Environment

1. Database configurations
```sh
DB_DATABASE=job_lister  # database name (create or use your own)
DB_USERNAME=root        # database username (default is root)
DB_PASSWORD=123456      # database password if any
```

2. Google Client configurations for Sign In  
- Create or use existing Google project https://console.cloud.google.com/
- Goto **APIs and Service > Credentials** https://console.cloud.google.com/apis/credentials
- Click on **Create Credentials** button and choose **OAuth client ID** option
- Select *Web application* in **Application Type**
- Give the name e.g., *web-client-local*
- Click on **ADD URI** button under **Authorised JavaScript origins** section and paste the localhost url http://127.0.0.1:8000
- Click on **ADD URI** button under **Authorised redirect URIs** section and paste the redirect url http://127.0.0.1:8000/auth/google/callback (it will be used when user Sign In successfully)
- Finally create by clicking on **Save** button
- Copy the **Client ID** and **Client Secret** and update the below variables
```sh
GOOGLE_CLIENT_ID="Client ID"
GOOGLE_CLIENT_SECRET="Client Secret"
```

## Authors

**roshan9419** 🧐 

See also the list of [contributors](https://github.com/roshan9419/job-lister/graphs/contributors) who have participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details

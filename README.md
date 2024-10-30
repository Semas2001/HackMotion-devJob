Prerequisites

First, ensure Docker and Docker Compose are installed on your computer. You can download Docker from the official Docker website and follow their instructions to install Docker Compose as well.
Steps to Set Up WordPress with Your Custom Theme

Step 1: Download and Access the Project

    Clone the project repository to your computer.
    Navigate to the project directory where the files are located.

In your project folder, make sure you have a directory structure that looks like this:  
    docker-compose.yaml
    wp-content/themes/custom-landing-page

Step 3: Configure Docker Compose

    in VS  Code, open the terminal and run the following command to build the Docker image and start the containers: 
    docker-compose up -d

Step 4: Start WordPress with Docker

    Now, start the Docker environment. This will run both the WordPress and database containers, and you should be able to open a browser and go to http://localhost:8000 to access WordPress.

Step 5: Install and Activate the Theme in WordPress

    Open http://localhost:8000 in your browser.
    Complete the initial WordPress setup by following the on-screen instructions.
    Once WordPress is set up, go to the Appearance > Themes section.
    Activate your custom theme to see it in action.

Step 6: Activate the theme plugins
    in http://localhost:8000/wordpress/wp-amdin go to plugins  and activate the analytics plugin to track what the user does on the website.        (P.s to test, you must use Postman) .

Step  7: Test the Website
    Open a new browser tab and navigate to http://localhost:8000 to see your custom theme
    you can test the dynamic title of the page by  changing the url to http://localhost:8000/90 or /100.
    test the video progress bar and accordion by watching the video. the video is set to autoplay and loop.

Step 6: Shut Down Docker

When you’re done, you can stop WordPress by running the Docker shutdown command, which will stop and remove the containers.
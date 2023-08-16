# Twitter_Clone

## Project Overview: 
I want to attempt to create at the very least the homepage of twitter. Reason why is because I already have some creative projects, so instead I want to really hone in on my front end skills so I figured what better site to try to replicate then one of the most widely known social media tech sites - Twitter.  
The objective for this project is to give the user the ability to login to a unique account which will be stored in a MySQL database and once the user is logged in he can post whatever he would like to the main twitter page, as well edit or delete previous tweets by using CRUD operations.
![](https://github.com/eitancohen77/Twitter_Clone/assets/98838116/e2e6425a-510a-4b13-b1f0-09ca84910131)


With this being a social media site, its audience would be everyone but I can understand that my guess is mostly millennials and gen Zs would use this so around the ages 17-40 would be the majority of people on such site.

## Project Timeline:
I want to have the functionality of the site up by August 9th. This would include creating the schema for the database, creating the structure, the login pages, the homepages as well as configuring all the http requests. 
Then I want to spend the rest of the time, from the 10th until the 15-16 to work on primarily CSS and HTML in order to make the site feel and look like twitter.


## Project Architecture
The web application I have developed is a Twitter clone that provides users with the ability to create accounts, log in, post tweets, view a feed of tweets, and interact with the posted content. The architecture involves the integration of different components to ensure smooth navigation and data handling.
The navigation begins with the user arriving at the login page (login.php). Here, users can authenticate using their username and password. If the users don't have an account, they have the ability to register and create an account by using the signup page (signup.php). Upon successful authentication, they are redirected to the homepage (home.php), where they can interact with tweets and access their user-specific content. 
Data is stored and retrieved from a MySQL database. User authentication data, including id, username, and password, is stored in the userLogin table. User profile information, such as id, firstName, lastName, and dob (date of birth), is managed in the userInfo table. Tweet data, comprising id, tweet, and user_id, is stored in the tweets table. Relationships are established through user IDs, creating a connection between authentication, profile, and tweet data.
An example of a diagram of the project architecture can be visualized as follows:

User Interaction
    |
    v
Login/Signup ----> Homepage ----> Tweet Posting
    |                                  |
    v                                 v
MySQL Database <--- User Data <--- Tweet Data

## User Interface (UI) Design
The UI design of the Twitter clone focuses on simplicity and functionality. The layout includes a navigation bar for seamless movement between pages, a tweet posting form for sharing content, a tweet feed for browsing, and a sidebar suggesting users to follow.
The color scheme is minimalist, with shades of white and blue, creating a visually pleasing atmosphere. Profile pictures and images contribute to branding. Typography is clean and easy to read.
Interactive elements include buttons for submitting forms, deleting tweets, and editing content. Forms for posting, deleting, and editing tweets provide users with immediate interaction feedback.

## Database Design
The database design encompasses three main tables:
userLogin: Stores user authentication data, including id, username, and password.
userInfo: Manages user profile information, such as id, firstName, lastName, and dob.
tweets: Organizes tweet data, comprising id, tweet, and user_id.
userLogin and userInfo share an id field to link authentication and profile data.
tweets uses the user_id field to associate tweets with the user who posted them.
![](https://github.com/eitancohen77/Twitter_Clone/assets/98838116/b6524790-ba3e-4aa5-9973-7ab40771ce15)

## Functionality & Features
Key functionalities of the Twitter clone include:
User Authentication: Allows users to sign up and log in securely.
Homepage Feed: Displays a feed of tweets for the logged-in user.
Tweet Posting: Enables users to post new tweets.
Tweet Interaction: Users can delete their own tweets and potentially edit them.
Suggested Users: The sidebar suggests users to follow, fostering engagement.

## Technology Stack
Front-end: HTML, CSS, JavaScript for interactivity.
Back-end: PHP scripts for server-side logic.
Database: MySQL for data storage.
Challenges & Mitigation
Challenges brought up were regarding sessions and a way in which I can keep a user signed in and have access to the homepage. At first I thought a good way to implement this was to have a value in the userLogin table called loggedIn. If this value is set to true, then that means the user has logged in, and false if the user is not currently logged in. Then I decided I would learn how to use the built in sessions settings in php called $_SESSIONS. This worked so much easier because now I can store simple small values every time a session starts and now I don't need to access the database just to pull data.

## References
While specific references were not provided, resources like PHP and MySQL documentation, web development tutorials, and online communities have influenced the concept and development of the project. An example of this is the usage of sessions and  understanding how to authorize users to access the site. 
https://www.youtube.com/watch?v=3CS-eQdcMLU 

In conclusion, the Twitter clone web application encompasses a well-structured architecture that enables user authentication, tweet posting, and interaction. The UI design prioritizes user experience, while the database design ensures efficient data management. Challenges were addressed with security measures and optimization techniques, resulting in a functional and engaging platform.

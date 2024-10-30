# HackMotion-devJob


Create a local WordPress setup on Docker, with a custom theme. In this theme set a new page template in which you have to create the following design - Figma

You can choose the front-end technology of your choice, just keep in mind that the majority of the content should be rendered on the server for SEO purposes. It is important that the front end is responsive and adjusts when scaling. 

You will find all the assets in this folder - Full-Stack e-commerce Developer Test Task 

Font can be accessed here - https://fonts.google.com/specimen/IBM+Plex+Sans

Dynamic content 

As this is a dynamic landing page we would display it after the user has finished a quiz, we want to adjust the content accordingly. In the hero section of the page, you'll see a dynamic string - “We have put together a swing improvement solution to help you [break 80]”. The part in brackets is dynamic, there are 4 possible options: 
Break Par 
Break 80 
Break 90 
Break 100
This parameter should be passed as a URL parameter. 

Interactive Video 

The second section of the website includes a video with 3 timestamps. Your goal is to create a dynamic video progress line on the side. We also have 3 collapsable cards that open and close according to the timestamps. Our goal with this section is to get the person to watch the video, by providing an easy to digest content on the side. 

Timestamps: 
5 seconds (Static top drill)
14 seconds (Dynamic top drill)
24 seconds (Top full swing challenge)

Analytics 

A big part of improving our sales page effectiveness is data gathering. We want to collect two events on this page. One should be the page view event registered in the backend, the other is a front-end interaction event on the front-end. Both events should share a user ID, and include other relevant parameters like page URL, timestamp, browser information, device information, and User IP. For some parameters, it could be easier to collect this information in the back-end for others on the front-end. Structure the event data so that user parameters can be later combined from the elements to create a full user overview. 

For the scope of this task, it is up to you to choose where and how to store the data. 

Track and store these two events: 
Page View
Full video watch event 

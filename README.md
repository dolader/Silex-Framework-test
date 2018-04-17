# Silex-Framework-test
Exploring the Silex framework.

Enter your database details in App/config/settings.yml

    driver: pdo_mysql
    user: root
    password: ***
    dbname: ""
    host : localhost
    port :  ***
    charset:  UTF8 
    
Create a database-schema with doctrine cli

Functionality:
  showing posts
  creating post
  creating authors

Menu:
  Home (berichten)
  Nieuw bericht
  Nieuwe auteur
 
Views:
  All posts - Showing all posts from all authors in a listview, with a link per post to the author about page 
              and a link to all posts of this author by displaying a badge with the number of posts.
            - Showing a excerpt from the post and a readmore button.
        
  Nieuw bericht:
             - Showing a form to create a new post. (send via AJAX).
  
  Nieuwe auteur:
             - Showing a form to create a new author (send via AJAX).
        
  Single-post: 
             - Showing the single post by ID, with post-date en link to the author aboutpage.
             
  Single-author: 
             - Showing the about page for the author, with a link to the All posts from this author.
             
  All posts from single author: 
             - Showing all the posts from the selected author in listview
  
        
  
  

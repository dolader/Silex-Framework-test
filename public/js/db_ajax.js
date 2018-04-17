document.getElementById("form_save").addEventListener('click', addPost);

// Adding a new Post via AJAX
function addPost(e){
    
    e.preventDefault();
    
    let title = document.getElementById("form_title").value;
    let author_name = document.getElementById("form_author_name").value;
    let message = document.getElementById("form_message").value;
    let formData = {
        title : 'title',
        author_name :' authorName',
        message : 'message'
    }
    let  formData = new FormData();
    formData.append('key1', 'value1');
    formData.append('key2', 'value2');
    formData.append('key3', 'value3');
    let newPost = JSON.stringify(formData);

     fetch("/post-new",{
         method: 'POST',
         headers:{
            'content-type': 'application/json',
            'content-access': 'application/json'
         },
         body: newPost
        })
     .then( (res) => res.json()) 
     .catch(function(error) {
        console.log(JSON.stringify(error));
      });               
     
}
// Adding a new author via AJAX
function addAuthor(e){
    "use strict";
    e.preventDefault();

    let name = document.getElementById("form_name").value;
    let email = document.getElementById("form_email").value;
    let website = document.getElementById("form_website").value;
    let biografie = document.getElementById("form_biografie").value;
    let formData = {
        name : 'name',
        email:'email',
        website : 'website',
        biografie : 'biografie'
    }
    let  formData = new FormData();
    formData.append('key1', 'value1');
    formData.append('key2', 'value2');
    formData.append('key3', 'value3');
    formData.append('key4', 'value4');
    let newPost = JSON.stringify(formData);

     fetch("/authur-new",{
         method: 'POST',
         headers:{
            'content-type': 'application/json',
            'content-access': 'application/json'
         },
         body: newPost
        })
     .then( (res) => res.json()) 
     .catch(function(error) {
        console.log(JSON.stringify(error));
      });               
     
}


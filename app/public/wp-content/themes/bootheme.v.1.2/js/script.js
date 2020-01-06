var portfolioPostsBtn = document.getElementById("portfolio-posts-btn");
var portfolioPostsContainer = document.getElementById("portfolio-posts-container");

if (portfolioPostsBtn) {
    portfolioPostsBtn.addEventListener("click", function(){
        var ourRequest = new XMLHttpRequest();
        ourRequest.open('GET', 'http://wordtheme.local/wp-json/wp/v2/posts?categories=4&order=asc');
        ourRequest.onload = function() {
            if (ourRequest.status >= 200 && ourRequest.status < 400) {
                var data = JSON.parse(ourRequest.responseText);
                createHTML(data);
                portfolioPostsBtn.remove();
            }else{
                console.log("WE CONNECT TO THE SERVER, BUT IT RUTOURNED ERROR");
            }
        };

        ourRequest.onerror = function() {
            console.log("connection error");
        };
        ourRequest.send();


    });
}

function createHTML(postsDATA) {
        var ourHTMLString ='';
        for (i=0; i < postsDATA.length; i++){
            ourHTMLString += '<h2>'+postsDATA[i].title.rendered+'</h2>';
            ourHTMLString += postsDATA[i].content.rendered;
        }

        portfolioPostsContainer.innerHTML = ourHTMLString;



}



// Quick Add Post AJAX
var quickAddButton = document.querySelector("#quick-add-button");

if (quickAddButton) {
  quickAddButton.addEventListener("click", function() {
    var ourPostData = {
      "title": document.querySelector('.admin-quick-add [name="title"]').value,
      "content": document.querySelector('.admin-quick-add [name="content"]').value,
      "status": "publish"
    }

    var createPost = new XMLHttpRequest();
    createPost.open("POST", magicalData.siteURL + "/wp-json/wp/v2/posts");
    createPost.setRequestHeader("X-WP-Nonce", magicalData.nonce);
    createPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    createPost.send(JSON.stringify(ourPostData));
    createPost.onreadystatechange = function() {
      if (createPost.readyState == 4) {
        if (createPost.status == 201) {
          document.querySelector('.admin-quick-add [name="title"]').value = '';
          document.querySelector('.admin-quick-add [name="content"]').value = '';
        } else {
          alert("Error - try again.");
        }
      }
    }
  });
}
async function fetchPostById() {
  try {
    document.querySelector("#loading").className = "loader";
    const url = "/codebox/controllers/fetch.php";
    const response = await fetch(url, {
      method: "POST",
      body: JSON.stringify({ id: postId }),
      headers: { "Content-type": "application/json; charset=UTF-8" },
    });

    let data = await response.json();

    const code = document.querySelector("#code-input-copy");
    code.value = data.body;
    if (data.status === "OK") {
      const id = data.id;
      const author = data.name;
      const date = data.date;
      const description = data.description;
      const title = data.title;
      document.querySelector("#title-text").innerText = title;
      const append = `

 //Author : ${author}
 //Title: ${title}
//Description : ${description}
//Date Created : ${date}
//Link:${location.href}`;
      flask.updateCode(
        `${append} 
                
${data.body}`
      );
    }
    document.querySelector("#loading").className = "loader hide";
  } catch (error) {
    document.querySelector("#loading").className = "loader hide";
    console.log(error);
  }
}

let params = new URL(document.location).searchParams;
let postId = params.get("postid");

fetchPostById();

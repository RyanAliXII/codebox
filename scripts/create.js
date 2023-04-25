let formData = {};

handleFormData = (input) => {
  formData = Object.assign(formData, {
    [input.name]: input.value,
  });
};

submitPost = async (form) => {
  form.reset();
  const code = flask.getCode();
  const date = moment()
    .tz("Asia/Shanghai")
    .format("MMMM Do YYYY, h:mm:a")
    .valueOf();

  formData = Object.assign(formData, {
    body: code,
    date: date,
  });

  document.querySelector("#loading").className = "loader";
  const url = "/controllers/create.php";
  try {
    const response = await fetch(url, {
      method: "POST",
      body: JSON.stringify(formData),
      headers: { "Content-type": "application/json; charset=UTF-8" },
    });
    document.querySelector("#loading").className = "loader hide";
    let json = await response.json();

    if (json.status === "OK") {
      console.log("REDIRECTING");
      window.location.replace(`/views/code.html?postid=${json.postId}`);
    }
  } catch (error) {
    console.log(error);
    document.querySelector("#loading").className = "loader hide";
  }
};

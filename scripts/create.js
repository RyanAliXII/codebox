
let formData = {};

handleFormData = (input)=>{

    formData = Object.assign(formData,{
        [input.name]:input.value
    })

}



submitPost = async(form) =>{
   const code = flask.getCode();
    const date  = moment().tz('Asia/Shanghai').format('MMMM Do YYYY, h:mm:a').valueOf();
    
   formData = Object.assign(formData,{
       body : code,
       date:date
   })

    const url = 'http://project2.test/controllers/create.php'
     const response = await fetch(url,{
         method: 'POST',
        body:JSON.stringify(formData),
         headers: {"Content-type": "application/json; charset=UTF-8"}
     })
     
     const text = await response.text();
     if(text === "OK"){
         
     }
}
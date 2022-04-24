function callSendedFile(u,r)
{

  var data = new FormData() ;
  data.append('idU', u);
  data.append('receiver', r) ;
  data.append('type','') ;
  var xhr = new XMLHttpRequest() ;
  xhr.onreadystatechange = function()
  {
    if(xhr.readyState == 4 && xhr.status == 200)
    {
      var response = (xhr.responseText).split('@@&&') ;
      document.querySelector('.labelAll').innerHTML = 'sended' ;
      document.querySelector('.mySended').innerHTML = response[0] ;
      document.querySelector('.compteSend').innerHTML = JSON.parse(response[1])[0].nbr ;
      // downloadFile()
    }
  }
  xhr.open('POST','../back/showSendedFile.php') ;
  xhr.send(data) ;
}
var send = document.querySelector('.send');
if (send !== null)
{
  send.addEventListener("click", function(e)
  {
    e.preventDefault();
    var xhttp = new XMLHttpRequest();
    var idU = document.querySelector('.idU').value;
    var receiver = document.querySelector('.receiver').value;
    var message = document.querySelector('.message').value;
    var corps = document.querySelector('.corps');
    xhttp.onreadystatechange = function()
    {
      if (xhttp.readyState == 4 && xhttp.status == 200)
      {
        corps.innerHTML = xhttp.responseText;
      }
    }
    let formData = new FormData();
    formData.append('idU', idU);
    formData.append('receiver', receiver);
    formData.append('message', message);
    xhttp.open("POST", "../back/insertion.php");
    xhttp.send(formData);
  })

}

let formLogin = document.querySelector('#formLogin')
if (formLogin !== null)
{
  formLogin.addEventListener("submit", function(e)
  {

    e.preventDefault()
    let formData = new FormData(formLogin)
    formData.append("type", "login")
    let xhttp = new XMLHttpRequest()

    xhttp.onreadystatechange = function()
    {
      if (xhttp.readyState == 4 && xhttp.status == 200)
      {
        if (xhttp.responseText == 'unlogged')
        {
          $.alert('Try sign up');
        }
        else
        {
          location.assign('content/home.php');
        }
      }
    }

    xhttp.open("POST", "back/login.php")
    xhttp.send(formData)
  })

}


let formSignUp = document.querySelector("#formSignUp")
if (formSignUp !== null)
{
  formSignUp.addEventListener("submit", function(e)
  {

    e.preventDefault()
    let formData = new FormData(formSignUp)
    formData.append("type", "signup")
    let xhttp = new XMLHttpRequest()

    xhttp.onreadystatechange = function()
    {
      if (xhttp.readyState == 4 && xhttp.status == 200)
      {
        location.assign('../index.php');
      }
    }

    xhttp.open("POST", "../back/login.php")
    xhttp.send(formData)
  })
}


let logout = document.querySelector(".logout");
if(logout !== null)
{
  logout.addEventListener("click", function(e)
  {
    e.preventDefault()
    let formData = new FormData()
    formData.append("type", "logout")
    let xhttp = new XMLHttpRequest()

    xhttp.onreadystatechange = function()
    {
      if (xhttp.readyState == 4 && xhttp.status == 200)
      {

        location.assign('../index.php');

      }
    }

    xhttp.open("POST", "../back/login.php")
    xhttp.send(formData)
  })
}

var sendFile = document.querySelector('.sendFile') ;
if(sendFile !== null)
{
  sendFile.addEventListener('click', function(e){
    e.preventDefault() ;
    document.getElementById('selectedFile').click() ;
  })
}

var selectedFile =  document.getElementById('selectedFile');

if(selectedFile !== null)
{
  selectedFile.addEventListener('change', function(e){
    e.preventDefault() ;
    var idU = document.querySelector('.idU').value;
    var receiver = document.querySelector('.receiver').value;
    if(receiver == "")
    {
    	$.alert("Please select receiver");
    }else{
      console.log(selectedFile.files[0].size) ;
      var totalFile = selectedFile.files.length ;
      let formData = new FormData(); 
      for (var i = 0; i < totalFile; i++) {
        if(selectedFile.files[i].size < 41943040 )
        {
          formData.append("files[]", selectedFile.files[i]);
          formData.append("idU", idU);
          formData.append("receiver", receiver);
        }
        else
        {
         $.alert(selectedFile.files[i].name+' is too big !! ') ;
         location.reload() ;
       }

     }

     var xhr = new XMLHttpRequest() ;
     xhr.onreadystatechange = function()
     {
       if(xhr.readyState == 4 && xhr.status == 200)
       {
        $.alert('<span class="text-success">The file has been uploaded successfully</span>') ;
        callSendedFile(idU, receiver) ;
      }
    }
    xhr.open('POST','../back/upload.php') ;
    xhr.send(formData) ;

  }
})

}

var linkSended = document.querySelector('.linkSended') ;
if(linkSended !== null)
{
  linkSended.addEventListener('click', function(e){
    e.preventDefault() ;
    var idU = document.querySelector('.idU').value;
    var receiver = document.querySelector('.receiver').value;
    if(receiver !== '')
    {
      callSendedFile(idU, receiver) ;
    }
    else
    {
      $.alert('Please select receiver')
    }
    
  })
}

function callReceiverFile(u,r,t)
{
  var data = new FormData() ;
  data.append('idU', u)
  data.append('receiver', r)
  data.append('type',t) ;
  var xhr = new XMLHttpRequest() ;
  xhr.onreadystatechange = function()
  {
    if(xhr.readyState == 4 && xhr.status == 200)
    {
      var response = (xhr.responseText).split('@@&&') ;
      document.querySelector('.labelAll').innerHTML = 'received' ;
      document.querySelector('.mySended').innerHTML = response[0] ;
      document.querySelector('.compteSend').innerHTML = JSON.parse(response[1])[0].nbr ;
      // downloadFile()
    }
  }
  xhr.open('POST','../back/showReceivedFile.php') ;
  xhr.send(data) ;
}
var linkReceived = document.querySelector('.linkReceived') ;
if(linkReceived !== null)
{
  linkReceived.addEventListener('click', function(e){
    e.preventDefault() ;
    var idU = document.querySelector('.idU').value;
    var receiver = document.querySelector('.receiver').value;
    if(receiver !== '')
    {
      callReceiverFile(idU, receiver,'') ;
    }
    else
    {
      $.alert('Please select receiver')
    }
  })
}

var receiver = document.querySelector('.receiver')
if(receiver !== null)
{
  receiver.addEventListener('change', function(e){
    e.preventDefault() ;
    var receive = this.options[this.selectedIndex].value ;
    var idU = document.querySelector('.idU').value;
    callSendedFile(idU, receive) ;
  })
}

// function downloadFile()
// {
//   var download = document.querySelectorAll('.download')

// if (download !== null)
// {
//   for (var i = 0; i < download.length; i++) {
//     download[i].addEventListener('click', function(e){
//       e.preventDefault() ;
//       filedownload = this.getAttribute('value')
//       location.assign(filedownload) ;
//     })
//   }
 
// }
// }





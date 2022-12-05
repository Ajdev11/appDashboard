let targetUrl;
function getAges(){
let dateString = document.getElementById('dat').value;

if(dateString != " " || dateString == null){
    let today = new Date();
    let birthDate = new Date(dateString);
    let age = today.getFullYear() - birthDate.getFullYear();
   // let targetUrl = "http://127.0.0.1:5500/Reg2.html?";
    if(age > 18 || age < 14){
        alert("Age above the limit")
     }
    // else{
    //     targetUrl = "http://127.0.0.1:5500/Reg2.html?"
    // }
}
}





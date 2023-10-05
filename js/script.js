function getQuote(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(xhttp.responseText);
            document.getElementById("paragrapheCitationDiv").innerHTML = xhttp.responseText;
        }
    }
    xhttp.open("GET", "../php/getQuoteFromApi.php?site=localhost/php/theQuoteAPI.php&cmd=getQuote");
    xhttp.send();
}
getQuote();
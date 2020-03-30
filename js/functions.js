 
    function changeSecond(){
   //   alert('I am second');
        var table = document.getElementById('dates');
    if(document.getElementById('period').value == 'intraday')
     {
         alert('We are sorry to inform that currently for this interval  real time data for today only is available.');
       table.style.display = 'none';
  // or      link.style.visibility = 'hidden';
    }
    if(document.getElementById('period').value == 'day'|| document.getElementById('period').value == 'week'||document.getElementById('period').value == 'month' )
     {
          document.getElementById("start_date").focus();
    }
       }
    function changer(){
    
         document.getElementById('period').attributes.onchange.nodeValue = "changeSecond()";
    }


   function convertCurrency()
    {
      var from = document.getElementById("from").value;
      var to = document.getElementById("to").value;
      var xmlhttp = new XMLHttpRequest();
      var url = "https://api.exchangeratesapi.io/latest?symbols="+ from +","+to;
      xmlhttp.open("GET",url,true);
      xmlhttp.send();
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          var result = xmlhttp.responseText;
          var jsResult = JSON.parse(result);
          var oneUnit = jsResult.rates[to]/jsResult.rates[from];
          var amt = document.getElementById("fromAmount").value;
          document.getElementById("toAmount").value = (oneUnit * amt).toFixed(2);
        }
      }

  }
function start(){
    changer();
    convertCurrency();
  
}
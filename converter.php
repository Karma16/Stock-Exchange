<html>
<?php include('inc.php');?>
    

    <body>
<div id="box">
        <h5>Currency Converter</h5>
        <table>
          <tr>
            <td><input id="fromAmount" type="text" size="15" value="1" onkeyup="convertCurrency();"/></td>
            <td>
              <select id="from" onchange="convertCurrency();">
                <option value="AUD" selected>AUD</option>
                <option value="USD" >USD</option>
                <option value="INR" >INR</option>
                </select>
            </td>
          </tr>
          <tr>
            <td><input id="toAmount" type="text" size="15" disabled/></td>
            <td>
              <select id="to" onchange="convertCurrency();">
                <option value="AUD">AUD</option>
                <option value="USD" selected>USD</option>
                <option value="INR" >INR</option>
                </select>
              </td>
          </tr>
        </table>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
   include_once 'store-data.php';
   $suc = '';
   $first = $second = $third = $fourth = $fifth = $sixth = $seventh = $eighth = 0; 
   if(!empty($_GET['suc'])) {
	   $suc = $_GET['suc'];
   }
   if(!empty($_GET['first'])) {
	   $first =  $_GET['first'];
   }
   if(!empty($_GET['second'])) {
	   $second =  $_GET['second'];
   }
   if(!empty($_GET['third'])) {
	   $third =  $_GET['third'];
   }
   if(!empty($_GET['fourth'])) {
	   $fourth =  $_GET['fourth'];
   }
   if(!empty($_GET['fifth'])) {
	   $fifth =  $_GET['fifth'];
   }
   if(!empty($_GET['sixth'])) {
	   $sixth =  $_GET['sixth'];
   }
   if(!empty($_GET['seventh'])) {
	   $seventh =  $_GET['seventh'];
   }
   if(!empty($_GET['eighth'])) {
	   $eighth =  $_GET['eighth'];
   }
?>
<body>
<span class="suc"><?= $suc;?></span>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" id="caneH">
        <table class="main_table">
          <tbody>
            <tr align="center">
              <td></td>
              <td></td>
              <td align="center">
                <table class="date_table">
                  <tr>
                    <td>
	                    <input type="text" name="date" id="date" readonly>
                    </td>
                    <td>
	                    <input type="text" name="month" id="month" readonly>
                    </td>
                    <td>
                        <input type="text" name="year" id="year" readonly>
                    </td>
                  </tr>
                </table>
              </td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>
                <table>
	                <tr><th>
                      <label for="">সেন্টার</label>
                    </th></tr>
	                <tr><td>
                      <input type="text" id="center" name="center">
                    </td></tr>
                </table>
              </td>
              
              <td>
                <table>
	                <tr><th>
                      <label for="">গাড়ীসহ ওজন</label>
                    </th></tr>
	                <tr><td>
                      <input type="text" id="tow1" name="tow1">
                    </td></tr>
	                <tr><td>
                      <input type="text" id="tow2" name="tow2">
                    </td></tr>
                </table>
              </td>
              
              <td>
                <table>
	                <tr><th>
                      <label for="">ট্রেইলারের ওজন</label>
                    </th></tr>
	                <tr><td>
                      <input type="text" id="trw1" name="trw1">
                    </td></tr>
	                <tr><td>
                      <input type="text" id="trw2" name="trw2">
                    </td></tr>
                </table>
              </td>
              
              <td>
                <table>
	                <tr><th>
                      <label for="">নীট ওজন</label>
                    </th></tr>
	                <tr><td>
                      <input type="text" id="nw1" name="nw1" readonly>
                    </td></tr>
	                <tr><td>
                      <input type="text" id="nw2" name="nw2" readonly>
                    </td></tr>
                </table>
              </td>
              
              <td>
                <table>
	                <tr><th>
                      <label for="">মোট নীট ওজন</label>
                    </th></tr>
	                <tr><td>
                      <input type="text" id="tnw" name="tnw" readonly>
                    </td></tr>
                </table>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr align="center">
              <td></td>
              <td></td>
              <td align="center" style="padding-left: 20px">
                <input type="submit" id="submit" name="submit" value="STORE">
              </td>
              <td></td>
              <td></td>
            </tr>
          </tfoot>
        </table>
    </form>
    <form action="get_csv.php" method="get">
        <input type="hidden" id="csv_table" name="csv_table">
        <input type="submit" name="get_csv" id="get_csv" value="Get CSV">
    </form>
    <div class="sheet_sum">
	    <span><?= 'sheet-1: &nbsp'.$first.'<br>'; ?></span>
	    <span><?= 'sheet-2: &nbsp'.$second.'<br>'; ?></span>
	    <span><?= 'sheet-3: &nbsp'.$third.'<br>'; ?></span>
	    <span><?= 'sheet-4: &nbsp'.$fourth.'<br>'; ?></span>
	    <span><?= 'sheet-5: &nbsp'.$fifth.'<br>'; ?></span>
	    <span><?= 'sheet-6: &nbsp'.$sixth.'<br>'; ?></span>
	    <span><?= 'sheet-7: &nbsp'.$seventh.'<br>'; ?></span>
	    <span><?= 'sheet-8: &nbsp'.$eighth.'<br>'; ?></span>
        <hr>
        <span><?= '<strong>Total</strong> &nbsp;&nbsp;&nbsp;&nbsp '.($first + $second + $third + $fourth + $fifth + $sixth + $seventh + $eighth);?></span>
    </div>
    <div class="center_list">
        <ul class="clearfix">
            <div class="center_group g0">
                <li id="Ahmedpur">আহমেদপুর</li>
	            <li id="Easinpur">ইয়াছিনপুর</li>
            </div>
            
            <div class="center_group g1">
	            <li id="Keshobpur">কেশবপুর</li>
	            <li id="Kalikapur">কলিকাপুর</li>
	            <li id="Kafuria">কাফুরিয়া</li>
	            <li id="Korota">করোটা</li>
	            <li id="Katashkol">কাটাশকোল</li>
	            <li id="Khaksha">খাকসা</li>
            </div>
            
            <div class="center_group g2">
	            <li id="Chadpur">চাঁদপুর</li>
	            <li id="Condrokola">চন্দ্রকলা</li>
	            <li id="Choddomatha">চৌদ্দমাথা</li>
            </div>
            
            <div class="center_group g3">
                <li id="Chatni">ছাতনী</li>
            </div>
            
            <div class="center_group g4">
	            <li id="Jamnogor">জামনগর</li>
	            <li id="Jalalabad">জালালাবাদ</li>
	            <li id="Jalora">জালোড়া</li>
	            <li id="Joyontipur">জয়ন্তিপুর</li>
	            <li id="Jigori">জিগরী</li>
            </div>
            
            
            <div class="center_group g5">
                <li id="Jholmolia">ঝলমলিয়া</li>
            </div>
            
            
            <div class="center_group g6">
	            <li id="Telkupi">তেলকুপি</li>
	            <li id="Tomaltola">তমালতলা</li>
            </div>
            
            <div class="center_group g7">
	            <li id="Dighapotia">দিঘাপতিয়া</li>
	            <li id="Dottopara">দ্ত্তপাড়া</li>
	            <li id="Dorappur">দরাপপুর</li>
	            <li id="Dostanabad">দস্তানাবাদ</li>
            </div>
            
            <div class="center_group g8">
	            <li id="Dhorail">ধরাইল</li>
	            <li id="Dhanura">ধানুড়া</li>
            </div>
            
            <div class="center_group g9">
	            <li id="Noldanga">নলডাঙ্গা</li>
	            <li id="Notabaria">নটাবাড়ীয়া</li>
            </div>
            
            <div class="center_group g10">
	            <li id="Ponditgram">পন্ডিতগ্রাম</li>
	            <li id="Pirgonj">পীরগঞ্জ</li>
	            <li id="Piprul">পিপরুল</li>
            </div>
            
            <div class="center_group g11">
                <li id="Faguardiar">ফাগুয়াড়দিয়াড়</li>
            </div>
            
            <div class="center_group g12">
	            <li id="Bakshor">বাকশোর</li>
	            <li id="Bakshor-kha">বাকশোর (খ)</li>
	            <li id="Basudebpur">বাসুদেবপুর</li>
	            <li id="Borobaria">বড়বাড়ীয়া</li>
	            <li id="Boraigram">বড়াইগ্রাম</li>
	            <li id="Bashbaria">বাঁশবাড়িয়া</li>
	            <li id="Bagatipara">বাগাতিপাড়া</li>
            </div>
            
            <div class="center_group g13">
	            <li id="Mirjapur">মির্জাপুর</li>
	            <li id="Mirjapur-kha">মির্জাপুর (খ)</li>
	            <li id="Mohisvanga">মহিষভাঙ্গা</li>
	            <li id="Malonchi">মালঞ্চি</li>
            </div>
            
            <div class="center_group g14">
	            <li id="Ramsharkazipur">রামশারকাজীপুর</li>
	            <li id="Ramsharkazipur-kha">রামশারকাজীপুর (খ)</li>
	            <li id="Rohimanpur">রহিমানপুর</li>
            </div>
            
            <div class="center_group g15">
                <li id="Shonkorvag">শংকরভাগ</li>
            </div>
            
            <div class="center_group g16">
	            <li id="Sorishabari">সরিষাবাড়ি</li>
	            <li id="Sailkona">সাইলকোনা</li>
	            <li id="Sonapur">সোনাপুর</li>
            </div>
            
            <div class="center_group g17">
	            <li id="Hatiandoh">হাতিয়ানদহ</li>
	            <li id="Halsha">হালসা</li>
	            <li id="Hoybotpur">হয়বতপুর</li>
	            <li id="Hatgobindapur">হাটগোবিন্দপুর</li>
            </div> 
        </ul>
    </div>
    
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/custom_script.js"></script>
</body>
</html>
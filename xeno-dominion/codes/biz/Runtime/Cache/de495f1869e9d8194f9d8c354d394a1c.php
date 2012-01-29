<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- start: include -->
		<!-- start: include jquery & jquery ui -->
		<link type="text/css" href="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/js/jquery-ui-1.8.16.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/js/jquery-ui-timepicker-addon.js"></script>
        <!-- end:   include jquery & jquery ui -->
        <!-- start: include super-fish menu jquery plugin -->
        <link type="text/css" href="<?php echo ($SITE_URL); ?>/public/superfish-1.4.8/css/superfish.css" rel="stylesheet" />	
		<script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/superfish-1.4.8/js/superfish.js"></script>
        <!-- end: include super-fish menu jquery plugin -->
        
        
        <!-- start: include jack's css & js -->
        
        <link type="text/css" href="<?php echo ($SITE_URL); ?>/public/jack/foradmin/css/common.css" rel="stylesheet" />
        
        
        <!-- end:   include jack's css & js -->
<!-- end: include -->

        
<title><?php echo ($msg["title"]); ?></title>
</head>
<body>

<div id="header">

<div id="header_left"><img src="<?php echo ($SITE_URL); ?>/public/jack/foradmin/images/logo.jpg" /></div>

 <div id="header_right">
        <div id="header_right_control">Welcome back, <?php echo ($user["user_name"]); ?> / <a href="<?php echo ($SITE_URL); ?>/admin.php?s=Public/logout">Logout</a> 
        </div>
        <div id="header_right_menu">
            <ul class="sf-menu">
            				<li>
                  <a href="<?php echo ($SITE_URL); ?>/biz.php">My world</a>
                 </li>
                 <li> 
                     <a href="#">Messenge &amp; Condition</a>
                  </li>
                  <li>   
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/buying">Buying</a>
                   </li>
                   <li>  
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/selling">Selling</a>
                   </li>
                   <li> 
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/company">Company</a>
                   </li> 
                   <li>
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/account">Account</a>
                   </li>
                   <li>
                     <a href="#">Service Package</a>
                   </li>
                   <li> 
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/fraud">Fraud Report</a>
                	 </li>
                  <li>
                			<a href="<?php echo ($SITE_URL); ?>/admin.php">Go To admin account(for test only)</a>
                </li>
            </ul>
          </div>           
    </div>
    
</div>

<div id="wrapper">
<div id="content">
  <form action="" method="post" id="GroupListForm">
    <input type="hidden" value="yzfdvn2ct1bt" name="_csrf_token_">
    <input type="hidden" value="/organization/manage_person_profile_action" name="action">
    <input type="hidden" value="anything" name="event_submit_do_edit">
    <input type="hidden" value="" name="src">
    <h1 class="guide">Edit Member Profile</h1>
    <style media="all" type="text/css">
		#ReasonList{line-height:150%;font-size:10px!important;}
		#ReasonList p{margin:0;font-size:10px!important;}
		#ReasonList br{line-height:5px; margin:0; padding:0; font-size:0;}
		</style>
    <div class="board successB" id="successNote"> <b>Note: </b> Modifications to your Member Profile have been approved. Any further modification must be submitted again for review. </div>
    <div align="right"><span class="required">required information</span></div>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tables V">
      <tbody>
        <tr>
          <th> <span class="required">Name:</span> </th>
          <td><div class="column subHead">
              <input value="maggie" name="profile_name" maxlength="100" style="WIDTH: 100px">
            </div>
            <div style="clear:both;"></div></td>
        </tr>
        <tr>
          <th> <span class="required">Gender:</span> </th>
          <td nowrap=""><input type="radio" name="profile_gender" value="M">
            <label for="mr">Male</label>
            <input type="radio" name="profile_gender" value="F">
            <label for="ms">Female</label></td>
        </tr>
        <tr>
          <th><span>Alternative Email Address:</span></th>
          <td><input style="width:300px;" maxlength="128" value="" name="profile_email">
            <br>
            <p style="margin:3px 0; color:#949494;">(Your alternative email address can be used to receive inquiries so please make sure it is accurate and up-to-date.)</p></td>
        </tr>
        <tr>
          <th><span class="required">Contact Address:</span></th>
          <td><table width="100%" cellspacing="0" cellpadding="0" border="0">
              <tbody>
                <tr>
                  <td width="23%" valign="top" class="subHead">Street Address:</td>
                  <td><input type="text" maxlength="250" size="37" value="" name="profile_address"></td>
                </tr>
                <tr>
                  <td valign="top" class="subHead">City:</td>
                  <td><input type="text" size="37" value="" name="profile_city" maxlength="80"></td>
                </tr>
                <tr style="" id="provinceWrap">
                  <td class="subHead">Province/State/County:</td>
                  <td nowrap=""><input type="text" value="" name="profile_province" id="province"></td>
                </tr>
                <tr>
                  <td class="subHead">Country/Region:</td>
                  <td><select name="profile_country" id="countrySelect">
                      <option value="">- Select where your company is located -</option>
                      <option value="AF"> Afghanistan </option>
                      <option value="ALA"> Aland Islands </option>
                      <option value="AL"> Albania </option>
                      <option value="GBA"> Alderney </option>
                      <option value="DZ"> Algeria </option>
                      <option value="AS"> American Samoa </option>
                      <option value="AD"> Andorra </option>
                      <option value="AO"> Angola </option>
                      <option value="AI"> Anguilla </option>
                      <option value="AQ"> Antarctica </option>
                      <option value="AG"> Antigua and Barbuda </option>
                      <option value="AR"> Argentina </option>
                      <option value="AM"> Armenia </option>
                      <option value="AW"> Aruba </option>
                      <option value="ASC"> Ascension Island </option>
                      <option value="AU"> Australia </option>
                      <option value="AT"> Austria </option>
                      <option value="AZ"> Azerbaijan </option>
                      <option value="BS"> Bahamas </option>
                      <option value="BH"> Bahrain </option>
                      <option value="BD"> Bangladesh </option>
                      <option value="BB"> Barbados </option>
                      <option value="BY"> Belarus </option>
                      <option value="BE"> Belgium </option>
                      <option value="BZ"> Belize </option>
                      <option value="BJ"> Benin </option>
                      <option value="BM"> Bermuda </option>
                      <option value="BT"> Bhutan </option>
                      <option value="BO"> Bolivia </option>
                      <option value="BA"> Bosnia and Herzegovina </option>
                      <option value="BW"> Botswana </option>
                      <option value="BV"> Bouvet Island </option>
                      <option value="BR"> Brazil </option>
                      <option value="IO"> British Indian Ocean Territory </option>
                      <option value="BN"> Brunei Darussalam </option>
                      <option value="BG"> Bulgaria </option>
                      <option value="BF"> Burkina Faso </option>
                      <option value="BI"> Burundi </option>
                      <option value="KH"> Cambodia </option>
                      <option value="CM"> Cameroon </option>
                      <option selected="" value="CA"> Canada </option>
                      <option value="CV"> Cape Verde </option>
                      <option value="KY"> Cayman Islands </option>
                      <option value="CF"> Central African Republic </option>
                      <option value="TD"> Chad </option>
                      <option value="CL"> Chile </option>
                      <option value="CX"> Christmas Island </option>
                      <option value="CC"> Cocos (Keeling) Islands </option>
                      <option value="CO"> Colombia </option>
                      <option value="KM"> Comoros </option>
                      <option value="ZR"> Congo, The Democratic Republic Of The </option>
                      <option value="CG"> Congo, The Republic of Congo </option>
                      <option value="CK"> Cook Islands </option>
                      <option value="CR"> Costa Rica </option>
                      <option value="CI"> Cote D'Ivoire </option>
                      <option value="HR"> Croatia (local name: Hrvatska) </option>
                      <option value="CU"> Cuba </option>
                      <option value="CY"> Cyprus </option>
                      <option value="CZ"> Czech Republic </option>
                      <option value="DK"> Denmark </option>
                      <option value="DJ"> Djibouti </option>
                      <option value="DM"> Dominica </option>
                      <option value="DO"> Dominican Republic </option>
                      <option value="TP"> East Timor </option>
                      <option value="EC"> Ecuador </option>
                      <option value="EG"> Egypt </option>
                      <option value="SV"> El Salvador </option>
                      <option value="GQ"> Equatorial Guinea </option>
                      <option value="ER"> Eritrea </option>
                      <option value="EE"> Estonia </option>
                      <option value="ET"> Ethiopia </option>
                      <option value="FK"> Falkland Islands (Malvinas) </option>
                      <option value="FO"> Faroe Islands </option>
                      <option value="FJ"> Fiji </option>
                      <option value="FI"> Finland </option>
                      <option value="FR"> France </option>
                      <option value="FX"> France Metropolitan </option>
                      <option value="GF"> French Guiana </option>
                      <option value="PF"> French Polynesia </option>
                      <option value="TF"> French Southern Territories </option>
                      <option value="GA"> Gabon </option>
                      <option value="GM"> Gambia </option>
                      <option value="GE"> Georgia </option>
                      <option value="DE"> Germany </option>
                      <option value="GH"> Ghana </option>
                      <option value="GI"> Gibraltar </option>
                      <option value="GR"> Greece </option>
                      <option value="GL"> Greenland </option>
                      <option value="GD"> Grenada </option>
                      <option value="GP"> Guadeloupe </option>
                      <option value="GU"> Guam </option>
                      <option value="GT"> Guatemala </option>
                      <option value="GGY"> Guernsey </option>
                      <option value="GN"> Guinea </option>
                      <option value="GW"> Guinea-Bissau </option>
                      <option value="GY"> Guyana </option>
                      <option value="HT"> Haiti </option>
                      <option value="HM"> Heard and Mc Donald Islands </option>
                      <option value="HN"> Honduras </option>
                      <option value="HK"> Hong Kong </option>
                      <option value="HU"> Hungary </option>
                      <option value="IS"> Iceland </option>
                      <option value="IN"> India </option>
                      <option value="ID"> Indonesia </option>
                      <option value="IR"> Iran (Islamic Republic of) </option>
                      <option value="IQ"> Iraq </option>
                      <option value="IE"> Ireland </option>
                      <option value="IM"> Isle of Man </option>
                      <option value="IL"> Israel </option>
                      <option value="IT"> Italy </option>
                      <option value="JM"> Jamaica </option>
                      <option value="JP"> Japan </option>
                      <option value="JEY"> Jersey </option>
                      <option value="JO"> Jordan </option>
                      <option value="KZ"> Kazakhstan </option>
                      <option value="KE"> Kenya </option>
                      <option value="KI"> Kiribati </option>
                      <option value="KS"> Kosovo </option>
                      <option value="KW"> Kuwait </option>
                      <option value="KG"> Kyrgyzstan </option>
                      <option value="LA"> Lao People's Democratic Republic </option>
                      <option value="LV"> Latvia </option>
                      <option value="LB"> Lebanon </option>
                      <option value="LS"> Lesotho </option>
                      <option value="LR"> Liberia </option>
                      <option value="LY"> Libyan Arab Jamahiriya </option>
                      <option value="LI"> Liechtenstein </option>
                      <option value="LT"> Lithuania </option>
                      <option value="LU"> Luxembourg </option>
                      <option value="MO"> Macau </option>
                      <option value="MK"> Macedonia </option>
                      <option value="MG"> Madagascar </option>
                      <option value="MW"> Malawi </option>
                      <option value="MY"> Malaysia </option>
                      <option value="MV"> Maldives </option>
                      <option value="ML"> Mali </option>
                      <option value="MT"> Malta </option>
                      <option value="MH"> Marshall Islands </option>
                      <option value="MQ"> Martinique </option>
                      <option value="MR"> Mauritania </option>
                      <option value="MU"> Mauritius </option>
                      <option value="YT"> Mayotte </option>
                      <option value="MX"> Mexico </option>
                      <option value="FM"> Micronesia </option>
                      <option value="MD"> Moldova </option>
                      <option value="MC"> Monaco </option>
                      <option value="MN"> Mongolia </option>
                      <option value="MNE"> Montenegro </option>
                      <option value="MS"> Montserrat </option>
                      <option value="MA"> Morocco </option>
                      <option value="MZ"> Mozambique </option>
                      <option value="MM"> Myanmar </option>
                      <option value="NA"> Namibia </option>
                      <option value="NR"> Nauru </option>
                      <option value="NP"> Nepal </option>
                      <option value="NL"> Netherlands </option>
                      <option value="AN"> Netherlands Antilles </option>
                      <option value="NC"> New Caledonia </option>
                      <option value="NZ"> New Zealand </option>
                      <option value="NI"> Nicaragua </option>
                      <option value="NE"> Niger </option>
                      <option value="NG"> Nigeria </option>
                      <option value="NU"> Niue </option>
                      <option value="NF"> Norfolk Island </option>
                      <option value="KP"> North Korea </option>
                      <option value="MP"> Northern Mariana Islands </option>
                      <option value="NO"> Norway </option>
                      <option value="OM"> Oman </option>
                      <option value="Other"> Other Country </option>
                      <option value="PK"> Pakistan </option>
                      <option value="PW"> Palau </option>
                      <option value="PS"> Palestine </option>
                      <option value="PA"> Panama </option>
                      <option value="PG"> Papua New Guinea </option>
                      <option value="PY"> Paraguay </option>
                      <option value="PE"> Peru </option>
                      <option value="PH"> Philippines </option>
                      <option value="PN"> Pitcairn </option>
                      <option value="PL"> Poland </option>
                      <option value="PT"> Portugal </option>
                      <option value="PR"> Puerto Rico </option>
                      <option value="QA"> Qatar </option>
                      <option value="RE"> Reunion </option>
                      <option value="RO"> Romania </option>
                      <option value="RU"> Russian Federation </option>
                      <option value="RW"> Rwanda </option>
                      <option value="BLM"> SaintBarthelemy </option>
                      <option value="KN"> Saint Kitts and Nevis </option>
                      <option value="LC"> Saint Lucia </option>
                      <option value="MAF"> SaintMartin </option>
                      <option value="VC"> Saint Vincent and the Grenadines </option>
                      <option value="WS"> Samoa </option>
                      <option value="SM"> San Marino </option>
                      <option value="ST"> Sao Tome and Principe </option>
                      <option value="SA"> Saudi Arabia </option>
                      <option value="SN"> Senegal </option>
                      <option value="SRB"> Serbia </option>
                      <option value="SC"> Seychelles </option>
                      <option value="SL"> Sierra Leone </option>
                      <option value="SG"> Singapore </option>
                      <option value="SK"> Slovakia (Slovak Republic) </option>
                      <option value="SI"> Slovenia </option>
                      <option value="SB"> Solomon Islands </option>
                      <option value="SO"> Somalia </option>
                      <option value="ZA"> South Africa </option>
                      <option value="SGS"> South Georgia and the South Sandwich Islands </option>
                      <option value="KR"> South Korea </option>
                      <option value="ES"> Spain </option>
                      <option value="LK"> Sri Lanka </option>
                      <option value="SH"> St. Helena </option>
                      <option value="PM"> St. Pierre and Miquelon </option>
                      <option value="SD"> Sudan </option>
                      <option value="SR"> Suriname </option>
                      <option value="SJ"> Svalbard and Jan Mayen Islands </option>
                      <option value="SZ"> Swaziland </option>
                      <option value="SE"> Sweden </option>
                      <option value="CH"> Switzerland </option>
                      <option value="SY"> Syrian Arab Republic </option>
                      <option value="TW"> Taiwan </option>
                      <option value="TJ"> Tajikistan </option>
                      <option value="TZ"> Tanzania </option>
                      <option value="TH"> Thailand </option>
                      <option value="TLS"> Timor-Leste </option>
                      <option value="TG"> Togo </option>
                      <option value="TK"> Tokelau </option>
                      <option value="TO"> Tonga </option>
                      <option value="TT"> Trinidad and Tobago </option>
                      <option value="TN"> Tunisia </option>
                      <option value="TR"> Turkey </option>
                      <option value="TM"> Turkmenistan </option>
                      <option value="TC"> Turks and Caicos Islands </option>
                      <option value="TV"> Tuvalu </option>
                      <option value="UG"> Uganda </option>
                      <option value="UA"> Ukraine </option>
                      <option value="AE"> United Arab Emirates </option>
                      <option value="UK"> United Kingdom </option>
                      <option value="US"> United States </option>
                      <option value="UM"> United States Minor Outlying Islands </option>
                      <option value="UY"> Uruguay </option>
                      <option value="UZ"> Uzbekistan </option>
                      <option value="VU"> Vanuatu </option>
                      <option value="VA"> Vatican City State (Holy See) </option>
                      <option value="VE"> Venezuela </option>
                      <option value="VN"> Vietnam </option>
                      <option value="VG"> Virgin Islands (British) </option>
                      <option value="VI"> Virgin Islands (U.S.) </option>
                      <option value="WF"> Wallis And Futuna Islands </option>
                      <option value="EH"> Western Sahara </option>
                      <option value="YE"> Yemen </option>
                      <option value="YU"> Yugoslavia </option>
                      <option value="ZM"> Zambia </option>
                      <option value="EAZ"> Zanzibar </option>
                      <option value="ZW"> Zimbabwe </option>
                    </select></td>
                </tr>
                <tr>
                  <td valign="top" class="subHead">Zip/Postal Code:</td>
                  <td><input type="text" size="12" value="" maxlength="12" name="profile_zip"></td>
                </tr>
              </tbody>
            </table></td>
        </tr>
        <tr>
          <th><span class="required">Tel:</span></th>
          <td><table cellspacing="2" cellpadding="0" border="0">
              <tbody>
                <tr>
                  <td><input type="text" value="1" size="6" maxlength="8" name="profile_phone">
                    </span></span></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table></td>
        </tr>
        <tr>
          <th>Fax:</th>
          <td><table cellspacing="2" cellpadding="0" border="0">
              <tbody>
                <tr>
                  <td><input type="text" value="1" size="6" maxlength="8" name="profile_fax"></td>
                </tr>
              </tbody>
            </table></td>
        </tr>
        <tr>
          <th>Mobile:</th>
          <td><input value="" name="profile_mobile" size="6" maxlength="16" style="WIDTH: 100px"></td>
        </tr>
        <tr>
          <th>Department:</th>
          <td><select name="profile_department">
              <option selected="" value="">--- Please select ---</option>
              <option value="Director/CEO/General Manager">Director/CEO/General Manager </option>
              <option value="Sales">Sales </option>
              <option value="Purchasing">Purchasing </option>
              <option value="Technical &amp; Engineering">Technical &amp; Engineering </option>
              <option value="Other">Other </option>
              <option value="Administrative">Administrative </option>
              <option value="Marketing">Marketing </option>
              <option value="Owner/Entrepreneur">Owner/Entrepreneur </option>
            </select></td>
        </tr>
        <tr>
          <th> Job Title: </th>
          <td><input type="text" size="33" value="" name="profile_jobtitle" maxlength="32"></td>
        </tr>
        <tr>
          <td class="formAction" colspan="2"><input type="submit" value=" Submit " name="Submit" id="formSubmit"></td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
</div> <!-- wrapper -->

<div id="footer"> 
						<div class="w960">
  
   <div style="overflow:hidden;  ">
     <ul class="ul5">
     	<h5>About Comtoworld.com</h5>
     		<li><a href="">Company Information</a></li>
     		<li><a href="">Partner with Us</a></li>
     		<li><a href="">Site Map</a></li>
     		<li><a href="">User Guide</a></li>
       </ul>
       
       
       <ul class="ul5">
									<h5>Buying on Comtoworld.com</h5>
         <li><a href="">Post Buying Requests</a></li>
         <li><a href="">Browse Categories</a></li>
         <li><a href="">Browse by Country</a></li>
         <li><a href="">Buy on AliExpress</a></li>
         <li><a href="">How to Buy</a></li>
       </ul>
       
       <ul class="ul5">
       		<h5>Selling on Comtoworld.com</h5>
        <li><a href="">Premium Membership</a></li>
        <li><a href="">Display Products</a></li>
        <li><a href="">My Alibaba</a></li>
        <li><a href="">How to Sell</a></li>
       </ul> 


								<ul class="ul5">
        		<h5>Other Services & Tools</h5>
         <li><a href="">TradeManager</a></li>
         <li><a href="">Ask It!</a></li>
         <li><a href="">Price Watch</a></li>
         <li><a href="">Trade Alert</a></li>
       </ul>

							<ul class="ul5">
										<h5>Safety & Support</h5>	
         <li><a href="">Submit a Complaint</a></li>
         <li><a href="">Help Center</a></li>
         <li><a href="">Contact us</a></li>
         <li><a href="">Safety & Security Center</a></li>
        </ul>
	</div>
  
      <p style="color:#999; font-size:11px;  ">Copyright &copy; 2011 Comtoworld.com  Limited and licensors. All rights reserved. </p>
  

  </div><!-- EO w960 -->
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
</div>
</body>
</html>
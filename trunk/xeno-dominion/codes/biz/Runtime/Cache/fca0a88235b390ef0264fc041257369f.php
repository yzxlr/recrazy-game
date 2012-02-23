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
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Product/index">My Products</a>
                   </li>
                   <?php /* ?>
                   <li> 
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/company">Company</a>
                   </li> 
                   <?php //*/ ?>
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
<form action="#" method="post" >
  <table width="100%" cellspacing="0" cellpadding="0" border="0" id="scrmManageCompanyTable" style="border:0;" class="tables V">
    <tbody>
      <tr>
        <td colspan="2"><h2>Company Details</h2></td>
      </tr>
      <tr>
        <th width="20%"> <span class="required">Company Name: </span> </th>
        <td><input type="text" maxlength="100" value="" name="companyName"></td>
      </tr>
      <tr>
        <th> <span class="required"> Company Address
          : </span> </th>
        <td><table width="100%" cellspacing="0" cellpadding="0" border="0" class="subTable" id="sourceRegisteredAddress">
            <tbody>
              <tr>
                <td width="18%" class="subHead">Street:</td>
                <td><input type="text" maxlength="250" size="30" class="sourceRegisteredAddressData" value="" name="companyAddress" id="companyAddress" /></td>
              </tr>
              <tr>
                <td width="15%" class="subHead">City:</td>
                <td><input type="text" maxlength="80" size="12" class="sourceRegisteredAddressData" value="" name="companyCity" id="companyCity" name="companyCity" /></td>
              </tr>
              <tr>
                <td width="15%" class="subHead">Province/State/County:</td>
                <td><div id="provinceDiv">
                	<input name="companyProvince" id="companyProvince" value="" />
                  </div></td>
              </tr>
              <tr>
                <td width="15%" class="subHead">Country/Region:</td>
                <td>
                	<select name="companyCountry" id="companyCountry">
                      <option value="">- Select where your company is located -</option>
                      <option value="AF" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AF"): ?>selected="selected"<?php endif; ?>> Afghanistan </option>
                      <option value="ALA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "ALA"): ?>selected="selected"<?php endif; ?>> Aland Islands </option>
                      <option value="AL" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AL"): ?>selected="selected"<?php endif; ?>> Albania </option>
                      <option value="GBA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GBA"): ?>selected="selected"<?php endif; ?>> Alderney </option>
                      <option value="DZ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "DZ"): ?>selected="selected"<?php endif; ?>> Algeria </option>
                      <option value="AS" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AS"): ?>selected="selected"<?php endif; ?>> American Samoa </option>
                      <option value="AD" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AD"): ?>selected="selected"<?php endif; ?>> Andorra </option>
                      <option value="AO" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AO"): ?>selected="selected"<?php endif; ?>> Angola </option>
                      <option value="AI" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AI"): ?>selected="selected"<?php endif; ?>> Anguilla </option>
                      <option value="AQ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AQ"): ?>selected="selected"<?php endif; ?>> Antarctica </option>
                      <option value="AG" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AG"): ?>selected="selected"<?php endif; ?>> Antigua and Barbuda </option>
                      <option value="AR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AR"): ?>selected="selected"<?php endif; ?>> Argentina </option>
                      <option value="AM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AM"): ?>selected="selected"<?php endif; ?>> Armenia </option>
                      <option value="AW" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AW"): ?>selected="selected"<?php endif; ?>> Aruba </option>
                      <option value="ASC" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "ASC"): ?>selected="selected"<?php endif; ?>> Ascension Island </option>
                      <option value="AU" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AU"): ?>selected="selected"<?php endif; ?>> Australia </option>
                      <option value="AT" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AT"): ?>selected="selected"<?php endif; ?>> Austria </option>
                      <option value="AZ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AZ"): ?>selected="selected"<?php endif; ?>> Azerbaijan </option>
                      <option value="BS" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BS"): ?>selected="selected"<?php endif; ?>> Bahamas </option>
                      <option value="BH" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BH"): ?>selected="selected"<?php endif; ?>> Bahrain </option>
                      <option value="BD" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BD"): ?>selected="selected"<?php endif; ?>> Bangladesh </option>
                      <option value="BB" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BB"): ?>selected="selected"<?php endif; ?>> Barbados </option>
                      <option value="BY" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BY"): ?>selected="selected"<?php endif; ?>> Belarus </option>
                      <option value="BE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BE"): ?>selected="selected"<?php endif; ?>> Belgium </option>
                      <option value="BZ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BZ"): ?>selected="selected"<?php endif; ?>> Belize </option>
                      <option value="BJ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BJ"): ?>selected="selected"<?php endif; ?>> Benin </option>
                      <option value="BM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BM"): ?>selected="selected"<?php endif; ?>> Bermuda </option>
                      <option value="BT" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BT"): ?>selected="selected"<?php endif; ?>> Bhutan </option>
                      <option value="BO" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BO"): ?>selected="selected"<?php endif; ?>> Bolivia </option>
                      <option value="BA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BA"): ?>selected="selected"<?php endif; ?>> Bosnia and Herzegovina </option>
                      <option value="BW" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BW"): ?>selected="selected"<?php endif; ?>> Botswana </option>
                      <option value="BV" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BV"): ?>selected="selected"<?php endif; ?>> Bouvet Island </option>
                      <option value="BR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BR"): ?>selected="selected"<?php endif; ?>> Brazil </option>
                      <option value="IO" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "IO"): ?>selected="selected"<?php endif; ?>> British Indian Ocean Territory </option>
                      <option value="BN" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BN"): ?>selected="selected"<?php endif; ?>> Brunei Darussalam </option>
                      <option value="BG" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BG"): ?>selected="selected"<?php endif; ?>> Bulgaria </option>
                      <option value="BF" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BF"): ?>selected="selected"<?php endif; ?>> Burkina Faso </option>
                      <option value="BI" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BI"): ?>selected="selected"<?php endif; ?>> Burundi </option>
                      <option value="KH" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "KH"): ?>selected="selected"<?php endif; ?>> Cambodia </option>
                      <option value="CM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CM"): ?>selected="selected"<?php endif; ?>> Cameroon </option>
                      <option value="CA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CA"): ?>selected="selected"<?php endif; ?>> Canada </option>
                      <option value="CV" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CV"): ?>selected="selected"<?php endif; ?>> Cape Verde </option>
                      <option value="KY" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "KY"): ?>selected="selected"<?php endif; ?>> Cayman Islands </option>
                      <option value="CF" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CF"): ?>selected="selected"<?php endif; ?>> Central African Republic </option>
                      <option value="TD" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TD"): ?>selected="selected"<?php endif; ?>> Chad </option>
                      <option value="CL" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CL"): ?>selected="selected"<?php endif; ?>> Chile </option>
                      <option value="CX" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CX"): ?>selected="selected"<?php endif; ?>> Christmas Island </option>
                      <option value="CC" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CC"): ?>selected="selected"<?php endif; ?>> Cocos (Keeling) Islands </option>
                      <option value="CO" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CO"): ?>selected="selected"<?php endif; ?>> Colombia </option>
                      <option value="KM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "KM"): ?>selected="selected"<?php endif; ?>> Comoros </option>
                      <option value="ZR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "ZR"): ?>selected="selected"<?php endif; ?>> Congo, The Democratic Republic Of The </option>
                      <option value="CG" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CG"): ?>selected="selected"<?php endif; ?>> Congo, The Republic of Congo </option>
                      <option value="CK" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CK"): ?>selected="selected"<?php endif; ?>> Cook Islands </option>
                      <option value="CR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CR"): ?>selected="selected"<?php endif; ?>> Costa Rica </option>
                      <option value="CI" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CI"): ?>selected="selected"<?php endif; ?>> Cote D'Ivoire </option>
                      <option value="HR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "HR"): ?>selected="selected"<?php endif; ?>> Croatia (local name: Hrvatska) </option>
                      <option value="CU" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CU"): ?>selected="selected"<?php endif; ?>> Cuba </option>
                      <option value="CY" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CY"): ?>selected="selected"<?php endif; ?>> Cyprus </option>
                      <option value="CZ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CZ"): ?>selected="selected"<?php endif; ?>> Czech Republic </option>
                      <option value="DK" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "DK"): ?>selected="selected"<?php endif; ?>> Denmark </option>
                      <option value="DJ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "DJ"): ?>selected="selected"<?php endif; ?>> Djibouti </option>
                      <option value="DM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "DM"): ?>selected="selected"<?php endif; ?>> Dominica </option>
                      <option value="DO" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "DO"): ?>selected="selected"<?php endif; ?>> Dominican Republic </option>
                      <option value="TP" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TP"): ?>selected="selected"<?php endif; ?>> East Timor </option>
                      <option value="EC" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "EC"): ?>selected="selected"<?php endif; ?>> Ecuador </option>
                      <option value="EG" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "EG"): ?>selected="selected"<?php endif; ?>> Egypt </option>
                      <option value="SV" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SV"): ?>selected="selected"<?php endif; ?>> El Salvador </option>
                      <option value="GQ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GQ"): ?>selected="selected"<?php endif; ?>> Equatorial Guinea </option>
                      <option value="ER" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "ER"): ?>selected="selected"<?php endif; ?>> Eritrea </option>
                      <option value="EE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "EE"): ?>selected="selected"<?php endif; ?>> Estonia </option>
                      <option value="ET" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "ET"): ?>selected="selected"<?php endif; ?>> Ethiopia </option>
                      <option value="FK" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "FK"): ?>selected="selected"<?php endif; ?>> Falkland Islands (Malvinas) </option>
                      <option value="FO" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "FO"): ?>selected="selected"<?php endif; ?>> Faroe Islands </option>
                      <option value="FJ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "FJ"): ?>selected="selected"<?php endif; ?>> Fiji </option>
                      <option value="FI" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "FT"): ?>selected="selected"<?php endif; ?>> Finland </option>
                      <option value="FR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "FR"): ?>selected="selected"<?php endif; ?>> France </option>
                      <option value="FX" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "FX"): ?>selected="selected"<?php endif; ?>> France Metropolitan </option>
                      <option value="GF" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GF"): ?>selected="selected"<?php endif; ?>> French Guiana </option>
                      <option value="PF" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PF"): ?>selected="selected"<?php endif; ?>> French Polynesia </option>
                      <option value="TF" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TF"): ?>selected="selected"<?php endif; ?>> French Southern Territories </option>
                      <option value="GA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GA"): ?>selected="selected"<?php endif; ?>> Gabon </option>
                      <option value="GM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GM"): ?>selected="selected"<?php endif; ?>> Gambia </option>
                      <option value="GE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GE"): ?>selected="selected"<?php endif; ?>> Georgia </option>
                      <option value="DE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "DE"): ?>selected="selected"<?php endif; ?>> Germany </option>
                      <option value="GH" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GH"): ?>selected="selected"<?php endif; ?>> Ghana </option>
                      <option value="GI" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GI"): ?>selected="selected"<?php endif; ?>> Gibraltar </option>
                      <option value="GR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GR"): ?>selected="selected"<?php endif; ?>> Greece </option>
                      <option value="GL" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GL"): ?>selected="selected"<?php endif; ?>> Greenland </option>
                      <option value="GD" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GD"): ?>selected="selected"<?php endif; ?>> Grenada </option>
                      <option value="GP" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GP"): ?>selected="selected"<?php endif; ?>> Guadeloupe </option>
                      <option value="GU" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GU"): ?>selected="selected"<?php endif; ?>> Guam </option>
                      <option value="GT" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GT"): ?>selected="selected"<?php endif; ?>> Guatemala </option>
                      <option value="GGY" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GGY"): ?>selected="selected"<?php endif; ?>> Guernsey </option>
                      <option value="GN" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GN"): ?>selected="selected"<?php endif; ?>> Guinea </option>
                      <option value="GW" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GW"): ?>selected="selected"<?php endif; ?>> Guinea-Bissau </option>
                      <option value="GY" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "GY"): ?>selected="selected"<?php endif; ?>> Guyana </option>
                      <option value="HT" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "HT"): ?>selected="selected"<?php endif; ?>> Haiti </option>
                      <option value="HM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "HM"): ?>selected="selected"<?php endif; ?>> Heard and Mc Donald Islands </option>
                      <option value="HN" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "HN"): ?>selected="selected"<?php endif; ?>> Honduras </option>
                      <option value="HK" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "HK"): ?>selected="selected"<?php endif; ?>> Hong Kong </option>
                      <option value="HU" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "HU"): ?>selected="selected"<?php endif; ?>> Hungary </option>
                      <option value="IS" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "IS"): ?>selected="selected"<?php endif; ?>> Iceland </option>
                      <option value="IN" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "IN"): ?>selected="selected"<?php endif; ?>> India </option>
                      <option value="ID" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "ID"): ?>selected="selected"<?php endif; ?>> Indonesia </option>
                      <option value="IR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "IR"): ?>selected="selected"<?php endif; ?>> Iran (Islamic Republic of) </option>
                      <option value="IQ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "IQ"): ?>selected="selected"<?php endif; ?>> Iraq </option>
                      <option value="IE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "IE"): ?>selected="selected"<?php endif; ?>> Ireland </option>
                      <option value="IM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "IM"): ?>selected="selected"<?php endif; ?>> Isle of Man </option>
                      <option value="IL" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "IL"): ?>selected="selected"<?php endif; ?>> Israel </option>
                      <option value="IT" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "IT"): ?>selected="selected"<?php endif; ?>> Italy </option>
                      <option value="JM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "JM"): ?>selected="selected"<?php endif; ?>> Jamaica </option>
                      <option value="JP" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "JP"): ?>selected="selected"<?php endif; ?>> Japan </option>
                      <option value="JEY" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "JEY"): ?>selected="selected"<?php endif; ?>> Jersey </option>
                      <option value="JO" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "JO"): ?>selected="selected"<?php endif; ?>> Jordan </option>
                      <option value="KZ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "KZ"): ?>selected="selected"<?php endif; ?>> Kazakhstan </option>
                      <option value="KE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "KE"): ?>selected="selected"<?php endif; ?>> Kenya </option>
                      <option value="KI" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "KI"): ?>selected="selected"<?php endif; ?>> Kiribati </option>
                      <option value="KS" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "KS"): ?>selected="selected"<?php endif; ?>> Kosovo </option>
                      <option value="KW" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "KW"): ?>selected="selected"<?php endif; ?>> Kuwait </option>
                      <option value="KG" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "KG"): ?>selected="selected"<?php endif; ?>> Kyrgyzstan </option>
                      <option value="LA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "LA"): ?>selected="selected"<?php endif; ?>> Lao People's Democratic Republic </option>
                      <option value="LV" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "LV"): ?>selected="selected"<?php endif; ?>> Latvia </option>
                      <option value="LB" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "LB"): ?>selected="selected"<?php endif; ?>> Lebanon </option>
                      <option value="LS" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "LS"): ?>selected="selected"<?php endif; ?>> Lesotho </option>
                      <option value="LR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "LR"): ?>selected="selected"<?php endif; ?>> Liberia </option>
                      <option value="LY" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "LY"): ?>selected="selected"<?php endif; ?>> Libyan Arab Jamahiriya </option>
                      <option value="LI" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "LI"): ?>selected="selected"<?php endif; ?>> Liechtenstein </option>
                      <option value="LT" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "LT"): ?>selected="selected"<?php endif; ?>> Lithuania </option>
                      <option value="LU" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "LU"): ?>selected="selected"<?php endif; ?>> Luxembourg </option>
                      <option value="MO" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MO"): ?>selected="selected"<?php endif; ?>> Macau </option>
                      <option value="MK" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MK"): ?>selected="selected"<?php endif; ?>> Macedonia </option>
                      <option value="MG" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MG"): ?>selected="selected"<?php endif; ?>> Madagascar </option>
                      <option value="MW" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MW"): ?>selected="selected"<?php endif; ?>> Malawi </option>
                      <option value="MY" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MY"): ?>selected="selected"<?php endif; ?>> Malaysia </option>
                      <option value="MV" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MV"): ?>selected="selected"<?php endif; ?>> Maldives </option>
                      <option value="ML" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "ML"): ?>selected="selected"<?php endif; ?>> Mali </option>
                      <option value="MT" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MT"): ?>selected="selected"<?php endif; ?>> Malta </option>
                      <option value="MH" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MH"): ?>selected="selected"<?php endif; ?>> Marshall Islands </option>
                      <option value="MQ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MQ"): ?>selected="selected"<?php endif; ?>> Martinique </option>
                      <option value="MR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MR"): ?>selected="selected"<?php endif; ?>> Mauritania </option>
                      <option value="MU" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MU"): ?>selected="selected"<?php endif; ?>> Mauritius </option>
                      <option value="YT" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "YT"): ?>selected="selected"<?php endif; ?>> Mayotte </option>
                      <option value="MX" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MX"): ?>selected="selected"<?php endif; ?>> Mexico </option>
                      <option value="FM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "FM"): ?>selected="selected"<?php endif; ?>> Micronesia </option>
                      <option value="MD" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MD"): ?>selected="selected"<?php endif; ?>> Moldova </option>
                      <option value="MC" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MC"): ?>selected="selected"<?php endif; ?>> Monaco </option>
                      <option value="MN" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MN"): ?>selected="selected"<?php endif; ?>> Mongolia </option>
                      <option value="MNE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MNE"): ?>selected="selected"<?php endif; ?>> Montenegro </option>
                      <option value="MS" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MS"): ?>selected="selected"<?php endif; ?>> Montserrat </option>
                      <option value="MA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MA"): ?>selected="selected"<?php endif; ?>> Morocco </option>
                      <option value="MZ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MZ"): ?>selected="selected"<?php endif; ?>> Mozambique </option>
                      <option value="MM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MM"): ?>selected="selected"<?php endif; ?>> Myanmar </option>
                      <option value="NA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "NA"): ?>selected="selected"<?php endif; ?>> Namibia </option>
                      <option value="NR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "NR"): ?>selected="selected"<?php endif; ?>> Nauru </option>
                      <option value="NP" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "NP"): ?>selected="selected"<?php endif; ?>> Nepal </option>
                      <option value="NL" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "NL"): ?>selected="selected"<?php endif; ?>> Netherlands </option>
                      <option value="AN" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AN"): ?>selected="selected"<?php endif; ?>> Netherlands Antilles </option>
                      <option value="NC" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "NC"): ?>selected="selected"<?php endif; ?>> New Caledonia </option>
                      <option value="NZ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "NZ"): ?>selected="selected"<?php endif; ?>> New Zealand </option>
                      <option value="NI" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "NI"): ?>selected="selected"<?php endif; ?>> Nicaragua </option>
                      <option value="NE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "NE"): ?>selected="selected"<?php endif; ?>> Niger </option>
                      <option value="NG" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "NG"): ?>selected="selected"<?php endif; ?>> Nigeria </option>
                      <option value="NU" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "NU"): ?>selected="selected"<?php endif; ?>> Niue </option>
                      <option value="NF" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "NF"): ?>selected="selected"<?php endif; ?>> Norfolk Island </option>
                      <option value="KP" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "KP"): ?>selected="selected"<?php endif; ?>> North Korea </option>
                      <option value="MP" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MP"): ?>selected="selected"<?php endif; ?>> Northern Mariana Islands </option>
                      <option value="NO" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "NO"): ?>selected="selected"<?php endif; ?>> Norway </option>
                      <option value="OM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "OM"): ?>selected="selected"<?php endif; ?>> Oman </option>
                      <option value="Other" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "Other"): ?>selected="selected"<?php endif; ?>> Other Country </option>
                      <option value="PK" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PK"): ?>selected="selected"<?php endif; ?>> Pakistan </option>
                      <option value="PW" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PW"): ?>selected="selected"<?php endif; ?>> Palau </option>
                      <option value="PS" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PS"): ?>selected="selected"<?php endif; ?>> Palestine </option>
                      <option value="PA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PA"): ?>selected="selected"<?php endif; ?>> Panama </option>
                      <option value="PG" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PG"): ?>selected="selected"<?php endif; ?>> Papua New Guinea </option>
                      <option value="PY" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PY"): ?>selected="selected"<?php endif; ?>> Paraguay </option>
                      <option value="PE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PE"): ?>selected="selected"<?php endif; ?>> Peru </option>
                      <option value="PH" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PH"): ?>selected="selected"<?php endif; ?>> Philippines </option>
                      <option value="PN" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PN"): ?>selected="selected"<?php endif; ?>> Pitcairn </option>
                      <option value="PL" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PL"): ?>selected="selected"<?php endif; ?>> Poland </option>
                      <option value="PT" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PT"): ?>selected="selected"<?php endif; ?>> Portugal </option>
                      <option value="PR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PR"): ?>selected="selected"<?php endif; ?>> Puerto Rico </option>
                      <option value="QA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "QA"): ?>selected="selected"<?php endif; ?>> Qatar </option>
                      <option value="RE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "RE"): ?>selected="selected"<?php endif; ?>> Reunion </option>
                      <option value="RO" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "RO"): ?>selected="selected"<?php endif; ?>> Romania </option>
                      <option value="RU" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "RU"): ?>selected="selected"<?php endif; ?>> Russian Federation </option>
                      <option value="RW" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "RW"): ?>selected="selected"<?php endif; ?>> Rwanda </option>
                      <option value="BLM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "BLM"): ?>selected="selected"<?php endif; ?>> SaintBarthelemy </option>
                      <option value="KN" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "KN"): ?>selected="selected"<?php endif; ?>> Saint Kitts and Nevis </option>
                      <option value="LC" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "LC"): ?>selected="selected"<?php endif; ?>> Saint Lucia </option>
                      <option value="MAF" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "MAF"): ?>selected="selected"<?php endif; ?>> SaintMartin </option>
                      <option value="VC" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "VC"): ?>selected="selected"<?php endif; ?>> Saint Vincent and the Grenadines </option>
                      <option value="WS" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "WS"): ?>selected="selected"<?php endif; ?>> Samoa </option>
                      <option value="SM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SM"): ?>selected="selected"<?php endif; ?>> San Marino </option>
                      <option value="ST" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "ST"): ?>selected="selected"<?php endif; ?>> Sao Tome and Principe </option>
                      <option value="SA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SA"): ?>selected="selected"<?php endif; ?>> Saudi Arabia </option>
                      <option value="SN" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SN"): ?>selected="selected"<?php endif; ?>> Senegal </option>
                      <option value="SRB" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SRB"): ?>selected="selected"<?php endif; ?>> Serbia </option>
                      <option value="SC" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SC"): ?>selected="selected"<?php endif; ?>> Seychelles </option>
                      <option value="SL" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SL"): ?>selected="selected"<?php endif; ?>> Sierra Leone </option>
                      <option value="SG" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SG"): ?>selected="selected"<?php endif; ?>> Singapore </option>
                      <option value="SK" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SK"): ?>selected="selected"<?php endif; ?>> Slovakia (Slovak Republic) </option>
                      <option value="SI" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SI"): ?>selected="selected"<?php endif; ?>> Slovenia </option>
                      <option value="SB" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SB"): ?>selected="selected"<?php endif; ?>> Solomon Islands </option>
                      <option value="SO" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SO"): ?>selected="selected"<?php endif; ?>> Somalia </option>
                      <option value="ZA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "ZA"): ?>selected="selected"<?php endif; ?>> South Africa </option>
                      <option value="SGS" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SGS"): ?>selected="selected"<?php endif; ?>> South Georgia and the South Sandwich Islands </option>
                      <option value="KR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "KR"): ?>selected="selected"<?php endif; ?>> South Korea </option>
                      <option value="ES" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "ES"): ?>selected="selected"<?php endif; ?>> Spain </option>
                      <option value="LK" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "LK"): ?>selected="selected"<?php endif; ?>> Sri Lanka </option>
                      <option value="SH" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SH"): ?>selected="selected"<?php endif; ?>> St. Helena </option>
                      <option value="PM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "PM"): ?>selected="selected"<?php endif; ?>> St. Pierre and Miquelon </option>
                      <option value="SD" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SD"): ?>selected="selected"<?php endif; ?>> Sudan </option>
                      <option value="SR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SR"): ?>selected="selected"<?php endif; ?>> Suriname </option>
                      <option value="SJ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SJ"): ?>selected="selected"<?php endif; ?>> Svalbard and Jan Mayen Islands </option>
                      <option value="SZ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SZ"): ?>selected="selected"<?php endif; ?>> Swaziland </option>
                      <option value="SE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SE"): ?>selected="selected"<?php endif; ?>> Sweden </option>
                      <option value="CH" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "CH"): ?>selected="selected"<?php endif; ?>> Switzerland </option>
                      <option value="SY" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "SY"): ?>selected="selected"<?php endif; ?>> Syrian Arab Republic </option>
                      <option value="TW" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TW"): ?>selected="selected"<?php endif; ?>> Taiwan </option>
                      <option value="TJ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TJ"): ?>selected="selected"<?php endif; ?>> Tajikistan </option>
                      <option value="TZ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TZ"): ?>selected="selected"<?php endif; ?>> Tanzania </option>
                      <option value="TH" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TH"): ?>selected="selected"<?php endif; ?>> Thailand </option>
                      <option value="TLS" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TLS"): ?>selected="selected"<?php endif; ?>> Timor-Leste </option>
                      <option value="TG" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TG"): ?>selected="selected"<?php endif; ?>> Togo </option>
                      <option value="TK" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TK"): ?>selected="selected"<?php endif; ?>> Tokelau </option>
                      <option value="TO" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TO"): ?>selected="selected"<?php endif; ?>> Tonga </option>
                      <option value="TT" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TT"): ?>selected="selected"<?php endif; ?>> Trinidad and Tobago </option>
                      <option value="TN" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TN"): ?>selected="selected"<?php endif; ?>> Tunisia </option>
                      <option value="TR" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TR"): ?>selected="selected"<?php endif; ?>> Turkey </option>
                      <option value="TM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TM"): ?>selected="selected"<?php endif; ?>> Turkmenistan </option>
                      <option value="TC" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TC"): ?>selected="selected"<?php endif; ?>> Turks and Caicos Islands </option>
                      <option value="TV" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "TV"): ?>selected="selected"<?php endif; ?>> Tuvalu </option>
                      <option value="UG" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "UG"): ?>selected="selected"<?php endif; ?>> Uganda </option>
                      <option value="UA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "UA"): ?>selected="selected"<?php endif; ?>> Ukraine </option>
                      <option value="AE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "AE"): ?>selected="selected"<?php endif; ?>> United Arab Emirates </option>
                      <option value="UK" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "UK"): ?>selected="selected"<?php endif; ?>> United Kingdom </option>
                      <option value="US" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "US"): ?>selected="selected"<?php endif; ?>> United States </option>
                      <option value="UM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "UM"): ?>selected="selected"<?php endif; ?>> United States Minor Outlying Islands </option>
                      <option value="UY" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "UY"): ?>selected="selected"<?php endif; ?>> Uruguay </option>
                      <option value="UZ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "UZ"): ?>selected="selected"<?php endif; ?>> Uzbekistan </option>
                      <option value="VU" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "VU"): ?>selected="selected"<?php endif; ?>> Vanuatu </option>
                      <option value="VA" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "VA"): ?>selected="selected"<?php endif; ?>> Vatican City State (Holy See) </option>
                      <option value="VE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "VE"): ?>selected="selected"<?php endif; ?>> Venezuela </option>
                      <option value="VN" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "VN"): ?>selected="selected"<?php endif; ?>> Vietnam </option>
                      <option value="VG" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "VG"): ?>selected="selected"<?php endif; ?>> Virgin Islands (British) </option>
                      <option value="VI" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "VI"): ?>selected="selected"<?php endif; ?>> Virgin Islands (U.S.) </option>
                      <option value="WF" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "WF"): ?>selected="selected"<?php endif; ?>> Wallis And Futuna Islands </option>
                      <option value="EH" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "EH"): ?>selected="selected"<?php endif; ?>> Western Sahara </option>
                      <option value="YE" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "YE"): ?>selected="selected"<?php endif; ?>> Yemen </option>
                      <option value="YU" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "YU"): ?>selected="selected"<?php endif; ?>> Yugoslavia </option>
                      <option value="ZM" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "ZM"): ?>selected="selected"<?php endif; ?>> Zambia </option>
                      <option value="EAZ" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "EAZ"): ?>selected="selected"<?php endif; ?>> Zanzibar </option>
                      <option value="ZW" <?php if(($data["tb_user_profile"]["profile_country"])  ==  "ZW"): ?>selected="selected"<?php endif; ?>> Zimbabwe </option>
                    </select>
                  </td>
              </tr>
              <tr>
                <td width="15%" class="subHead">Zip/Postal Code:</td>
                <td><input type="text" maxlength="12" size="12" value="" class="sourceRegisteredAddressData" name="companyZip" id="companyZip"></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
        <th><span class="required">Business Type:</span> </th>
        <td>
          <input type="checkbox" value="1" id="bizType1" name="companyType[]">
          Manufacturer<br>
          <input type="checkbox" value="2" id="bizType2" name="companyType[]">
          Trading Company<br>
          <input type="checkbox" value="3" id="bizType3" name="companyType[]">
          Buying Office<br>
          <input type="checkbox" value="4" id="bizType4" name="companyType[]">
          Agent<br>
          <input type="checkbox" value="5" id="bizType5" name="companyType[]">
          Distributor/Wholesaler<br>
          <input type="checkbox" value="7" id="bizType6" name="companyType[]">
          Government ministry/Bureau/Commission<br>
          <input type="checkbox" value="8" id="bizType7" name="companyType[]">
          Association<br>
          <input type="checkbox" value="9" id="bizType8" name="companyType[]">
          Business Service (Transportation, finance, travel, Ads, etc)<br>
          <input type="checkbox" value="6" id="bizType9" name="companyType[]">
          Other<br>
        </td>
      </tr>
      <tr>
        <th width="25%"><span class="required">Product/Service: </span> </th>
        <td><div id="serviceWeProvide">
            <div class="subHead subHead1"> We Sell
            </div>
            <input type="hidden" value="" name="_fmu.m._0.t" id="tmpProvideProducts">
            <div class="clearfix">
              <div class="listInputText">
                <input type="textfield" value="" size="10" name="companySell[]" maxlength="50" id="provide-1-1">
                <input type="textfield" value="" size="10" name="companySell[]" maxlength="50" id="provide-1-2">
                <input type="textfield" value="" size="10" name="companySell[]" maxlength="50" id="provide-1-3">
                <input type="textfield" value="" size="10" name="companySell[]" maxlength="50" id="provide-1-4">
                <input type="textfield" value="" size="10" name="companySell[]" maxlength="50" id="provide-1-5">
              </div>
            </div>
          </div>
          <div id="serviceWeBuy">
            <div class="subHead subHead2"> We Buy
              
            <div class="clearfix">
              <div class="listInputText">
                <input type="textfield" value="" size="10" name="companyBuy[]" maxlength="50" id="buy-1-1">
                <input type="textfield" value="" size="10" name="companyBuy[]" maxlength="50" id="buy-1-2">
                <input type="textfield" value="" size="10" name="companyBuy[]" maxlength="50" id="buy-1-3">
                <input type="textfield" value="" size="10" name="companyBuy[]" maxlength="50" id="buy-1-4">
                <input type="textfield" value="" size="10" name="companyBuy[]" maxlength="50" id="buy-1-5">
              </div>
            </div>
          </div></td>
      </tr>
      <tr>
        <th> Year Company Registered: </th>
        <td><select name="companyYear">
            <option value="">--- Please select ---</option>
            <?php for($i=1980;$i<2013;$i++){ ?>
            	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
          </select></td>
      </tr>
      <tr>
        <th>Total No. Employees:</th>
        <td><select name="companyEmployee">
            <option value="0">--- Please select ---</option>
            <option value="1">Fewer than 5 People</option>
            <option value="5">5 - 10 People</option>
            <option value="11">11 - 50 People</option>
            <option value="51">51 - 100 People</option>
            <option value="101">101 - 200 People</option>
            <option value="201">201 - 300 People</option>
            <option value="301">301 - 500 People</option>
            <option value="501">501 - 1000 People</option>
            <option value="1001">Above 1000 People</option>
          </select></td>
      </tr>
      <tr class="commonCopInfo">
        <th> Legal Owner: </th>
        <td><input type="text" maxlength="96" size="35" value="" name="companyLegalOwner" id="companyLegalOwner" /></td>
      </tr>
      <tr>
        <td class="formButton" colspan="2"><input type="submit" value="Submit" name="Submit"  id="btnSubmit" /></td>
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
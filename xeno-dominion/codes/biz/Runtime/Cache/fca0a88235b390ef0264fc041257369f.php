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
  <table width="100%" cellspacing="0" cellpadding="0" border="0" id="scrmManageCompanyTable" style="border:0;" class="tables V">
    <tbody>
      <tr>
        <td colspan="2"><h2>Company Details</h2></td>
      </tr>
      <tr>
        <th width="20%"> <span class="required">Company Name: </span> </th>
        <td><input type="text" maxlength="100" value="bayview ave" name="_fmu.m._0.c" id="companyName"></td>
      </tr>
      <tr>
        <th> <span class="required"> Company Address
          : </span> </th>
        <td><table width="100%" cellspacing="0" cellpadding="0" border="0" class="subTable" id="sourceRegisteredAddress">
            <tbody>
              <tr>
                <td width="18%" class="subHead">Street:</td>
                <td><input type="text" maxlength="250" size="30" class="sourceRegisteredAddressData" value="8218 bayview" name="_fmu.m._0.a" id="companyAddress"></td>
              </tr>
              <tr>
                <td width="15%" class="subHead">City:</td>
                <td><input type="text" maxlength="80" size="12" class="sourceRegisteredAddressData" value="thornhill" name="_fmu.m._0.ci" id="companyCity"></td>
              </tr>
              <tr>
                <td width="15%" class="subHead">Province/State/County:</td>
                <td><div id="provinceDiv">
                    <select name="_fmu.m._0.p" id="chinaProvince">
                      <option value="-1">--- Please select ---</option>
                      <option value="Alberta">Alberta</option>
                      <option value="British Columbia">British Columbia</option>
                      <option value="Manitoba">Manitoba</option>
                      <option value="New Brunswick">New Brunswick</option>
                      <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                      <option value="Nova Scotia">Nova Scotia</option>
                      <option value="Nunavut">Nunavut</option>
                      <option value="Northwest Territories">Northwest Territories</option>
                      <option selected="selected" value="Ontario">Ontario</option>
                      <option value="Prince Edward Island">Prince Edward Island</option>
                      <option value="Quebec">Quebec</option>
                      <option value="Saskatchewan">Saskatchewan</option>
                      <option value="Yukon">Yukon</option>
                    </select>
                  </div></td>
              </tr>
              <tr>
                <td width="15%" class="subHead">Country/Region:</td>
                <td> Canada
                  <input type="hidden" value="CA" name="_fmu.m._0.co" id="country"></td>
              </tr>
              <tr>
                <td width="15%" class="subHead">Zip/Postal Code:</td>
                <td><input type="text" maxlength="12" size="12" value="l3t2s2" class="sourceRegisteredAddressData" name="_fmu.m._0.z" id="companyZip"></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
        <th><span class="required">Business Type:</span> </th>
        <td><input type="hidden" value="9" name="_fmu.m._0.b" id="sendBizType">
          <input type="checkbox" value="1" id="bizType1" name="bizType">
          Manufacturer<br>
          <input type="checkbox" value="2" id="bizType2" name="bizType">
          Trading Company<br>
          <input type="checkbox" value="3" id="bizType3" name="bizType">
          Buying Office<br>
          <input type="checkbox" value="4" id="bizType4" name="bizType">
          Agent<br>
          <input type="checkbox" value="5" id="bizType5" name="bizType">
          Distributor/Wholesaler<br>
          <input type="checkbox" value="7" id="bizType6" name="bizType">
          Government ministry/Bureau/Commission<br>
          <input type="checkbox" value="8" id="bizType7" name="bizType">
          Association<br>
          <input type="checkbox" value="9" checked="" id="bizType8" name="bizType">
          Business Service (Transportation, finance, travel, Ads, etc)<br>
          <input type="checkbox" value="6" id="bizType9" name="bizType">
          Other<br>
          <div class="remark">Select up to 3 Business Types</div>
          <div style="display:none;" class="board errorB long" id="sendBizType-advice-error"></div></td>
      </tr>
      <tr>
        <th width="25%"><span class="required">Product/Service: </span> </th>
        <td><div id="serviceWeProvide">
            <div class="subHead subHead1"> We Sell
              <div class="helpContent" style="display:none;width:300px;" id="service-subHead1-ct">
                <h5>Product/Service We Sell</h5>
                Please enter the main products or services you sell (at least 1 product/service is required for supplier members). Enter only one product/service (50 characters max.) per box. Click "Add more" to add up to 4 more rows. </div>
            </div>
            <input type="hidden" value="" name="_fmu.m._0.t" id="tmpProvideProducts">
            <div class="clearfix">
              <div class="listInputText">
                <input type="textfield" value="all kinds car rent" size="10" name="_fmu.m._0.pr" maxlength="50" id="provide-1-1">
                <input type="textfield" value="" size="10" name="_fmu.m._0.pr" maxlength="50" id="provide-1-2">
                <input type="textfield" value="" size="10" name="_fmu.m._0.pr" maxlength="50" id="provide-1-3">
                <input type="textfield" value="" size="10" name="_fmu.m._0.pr" maxlength="50" id="provide-1-4">
                <input type="textfield" value="" size="10" name="_fmu.m._0.pr" maxlength="50" id="provide-1-5">
              </div>
              <a href="javascript:vd(0);" class="addListInput" id="addContentButton1">Add more </a>
              <div id="illegalCharProvide">
                <div id="provide-1-1-advice-error" class="board errorB long" style="display: none;"></div>
                <div id="provide-1-2-advice-error" class="board errorB long" style="display: none;"></div>
                <div id="provide-1-3-advice-error" class="board errorB long" style="display: none;"></div>
                <div id="provide-1-4-advice-error" class="board errorB long" style="display: none;"></div>
                <div id="provide-1-5-advice-error" class="board errorB long" style="display: none;"></div>
              </div>
            </div>
          </div>
          <div id="serviceWeBuy">
            <div class="subHead subHead2"> We Buy
              <div class="helpContent" style="display:none;width:300px;" id="service-subHead2-ct">
                <h5>Product/Service We Buy</h5>
                Please enter the main products or services you buy (at least 1 product/service is required for buyer members). Enter only one product/service (50 characters max.) per box. Click "Add more" to add up to 4 more rows. </div>
              <input type="hidden" value="" name="_fmu.m._0.tm" id="tmpPurchaseProducts">
            </div>
            <div class="clearfix">
              <div class="listInputText">
                <input type="textfield" value="" size="10" name="_fmu.m._0.pu" maxlength="50" id="buy-1-1">
                <input type="textfield" value="" size="10" name="_fmu.m._0.pu" maxlength="50" id="buy-1-2">
                <input type="textfield" value="" size="10" name="_fmu.m._0.pu" maxlength="50" id="buy-1-3">
                <input type="textfield" value="" size="10" name="_fmu.m._0.pu" maxlength="50" id="buy-1-4">
                <input type="textfield" value="" size="10" name="_fmu.m._0.pu" maxlength="50" id="buy-1-5">
              </div>
              <a href="javascript:vd(0);" class="addListInput" id="addContentButton2">Add more</a>
              <div id="illegalCharPurchase">
                <div id="buy-1-1-advice-error" class="board errorB long" style="display: none;"></div>
                <div id="buy-1-2-advice-error" class="board errorB long" style="display: none;"></div>
                <div id="buy-1-3-advice-error" class="board errorB long" style="display: none;"></div>
                <div id="buy-1-4-advice-error" class="board errorB long" style="display: none;"></div>
                <div id="buy-1-5-advice-error" class="board errorB long" style="display: none;"></div>
              </div>
            </div>
          </div></td>
      </tr>
      <tr>
        <th>Contract Manufacturing:</th>
        <td><table cellspacing="2" cellpadding="0" border="0">
            <tbody>
              <tr>
                <td width="25%"><input type="hidden" value="" name="_fmu.m._0.con" id="sendManufacturing">
                  <ul class="showList" id="manufacturingList">
                    <li style="margin:0 20px 0 0;float:left;" class="item1">
                      <input type="checkbox" value="1" name="contactManufacturing">
                      <label for="contactManufacturing1">OEM Service Offered</label>
                    </li>
                    <li style="margin:0 20px 0 0;float:left;" class="item1">
                      <input type="checkbox" value="2" name="contactManufacturing">
                      <label for="contactManufacturing1">Design Service Offered</label>
                    </li>
                    <li style="margin:0 20px 0 0;float:left;" class="item1">
                      <input type="checkbox" value="3" name="contactManufacturing">
                      <label for="contactManufacturing1">Buyer Label Offered</label>
                    </li>
                  </ul>
                  <div id="checkdiv" style="display:none;clear:both;">OEM Experience:
                    <input type="text" maxlength="3" value="" size="3" name="_fmu.m._0.y" id="oemYears">
                    Year(s)
                    <div style="display:none;" class="board errorB long" id="oemYears-advice-error"></div>
                    <script type="text/javascript">
		            		//&lt;![CDATA[
		            			CompanyForm.factory('manufacturing', {
																																	formId:'editcompany',
																																	checkBoxName:'contactManufacturing',
																																	contentId:'sendManufacturing',
																																	splitStr:',',
																																	yearsInputId:'oemYears',
																																	yearsInputContainer:'checkdiv'
																														});
		            			CompanyForm.validatorConfigs.pushConfig( 'oemYears', {
								              	validators:{
																	onlyNum:{
															        ruleName:'regexp',
															        params:['/^(?:[\\d])*$/'],
															        errorMsg:'Please enter numbers only'
																	},
																	maxLength:{
																      ruleName:'maxLength',
																      params:[3],
																      errorMsg:'Enter 3 characters max '
																    }
															}
		            			});
		            		//]]&gt;
		            	</script> 
                  </div></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
        <th> Year Company Registered: </th>
        <td> <input /></td>
      </tr>
      <tr>
        <th>Total No. Employees:</th>
        <td><select name="companyEmployee">
            <option value="0">--- Please select ---</option>
            <option value="1">Fewer than 5 People</option>
            <option value="2">5 - 10 People</option>
            <option value="3">11 - 50 People</option>
            <option value="4">51 - 100 People</option>
            <option value="5">101 - 200 People</option>
            <option value="56">201 - 300 People</option>
            <option value="57">301 - 500 People</option>
            <option value="6">501 - 1000 People</option>
            <option value="7">Above 1000 People</option>
          </select></td>
      </tr>
      <tr>
        <th></th>
        <td style="text-align:right;"><span style="text-decoration:underline;color:blue;cursor:pointer;" id="moreCompanyContent">&gt;&gt; Show</span></td>
      </tr>
      <tr class="commonCopInfo" style="display: none;">
        <th>Own Brands:</th>
        <td><input type="text" maxlength="64" value="" name="_fmu.m._0.br" id="brandName">
          <div class="remark">Please enter your brand names here. Use commas to separate each brand. If you are not the owner of the product brand (e.g. iPod, Xbox, etc.), please provide documentation from the brand owner to confirm you are authorized to sell their products.</div></td>
      </tr>
      <tr class="commonCopInfo" style="display: none;">
        <th>Ownership Type:</th>
        <td><select name="_fmu.m._0.o">
            <option value="0">--- Please select ---</option>
            <option value="1">Corporation/Limited Liability Company</option>
            <option value="2">Partnership</option>
            <option value="6">LLC (Ltd Liability Corp)</option>
            <option value="3">Individual (Sole proprietorship)</option>
            <option value="4">Professional Association</option>
            <option value="5">Others</option>
          </select></td>
      </tr>
      <tr class="commonCopInfo" style="display: none;">
        <th>Registered Capital:</th>
        <td><select name="_fmu.m._0.r">
            <option selected="" value="">--- Please select ---</option>
            <option value="1">Below US$100 Thousand</option>
            <option value="2">US$101 Thousand - US$500 Thousand</option>
            <option value="3">US$501 Thousand - US$1 Million</option>
            <option value="4">US$1 Million - US$2.5 Million</option>
            <option value="5">US$2.5 Million - US$5 Million</option>
            <option value="6">US$5 Million - US$10 Million</option>
            <option value="7">US$10 Million - US$50 Million</option>
            <option value="8">US$50 Million - US$100 Million</option>
            <option value="9">Above US$100 Million</option>
          </select></td>
      </tr>
      <tr class="commonCopInfo" style="display: none;">
        <th> Legal Owner: </th>
        <td><input type="text" maxlength="96" size="35" value="" name="_fmu.m._0.pri" id="businessOwner"></td>
      </tr>
      <tr>
        <td class="formButton" colspan="2"><input type="button" value="Submit" name="Submit" class="dpl-btn" id="btnSubmit"></td>
      </tr>
    </tbody>
  </table>
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
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

 
          <tbody><tr>
            	        <td colspan="2"><h2>Basic Company Details</h2></td>
	        	    </tr>

	    <tr>
	    	<th width="20%">
	    			    			<span class="required">Company Name: </span>
	    			    		</th>
	   		<td>
	   	            	<input type="text" maxlength="100" value="bayview ave" name="_fmu.m._0.c" id="companyName">

										
				</td>
	    </tr>
	    	   
       		 


<tr>
	<th>
		<span class="required">
			Company Address
			:
		</span>
	</th>
	<td>
		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="subTable" id="sourceRegisteredAddress">
			<tbody><tr>
		    				<td width="18%" class="subHead">Street:</td>
				<td>
					<input type="text" maxlength="250" size="30" class="sourceRegisteredAddressData" value="8218 bayview" name="_fmu.m._0.a" id="companyAddress">

				</td>
			</tr>
			<tr>
				<td width="15%" class="subHead">City:</td>
				<td>
					<input type="text" maxlength="80" size="12" class="sourceRegisteredAddressData" value="thornhill" name="_fmu.m._0.ci" id="companyCity">

				</td>
			</tr>
            			<tr>
				<td width="15%" class="subHead">Province/State/County:</td>
				<td>
					<div id="provinceDiv">
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
                     					</div>
				</td>
			</tr>
            			<tr>
				<td width="15%" class="subHead">Country/Region:</td>
				<td>
                                  Canada			      <input type="hidden" value="CA" name="_fmu.m._0.co" id="country">
                                				</td>
			</tr>
			<tr>
				<td width="15%" class="subHead">Zip/Postal Code:</td>
				<td>
					<input type="text" maxlength="12" size="12" value="l3t2s2" class="sourceRegisteredAddressData" name="_fmu.m._0.z" id="companyZip">

				</td>
			</tr>
		</tbody></table>
	</td>
</tr>
	
	    <tr>
	    	<th><span class="required">Business Type:</span> </th>
	        <td>
	        	<input type="hidden" value="9" name="_fmu.m._0.b" id="sendBizType">
	        																													            				<input type="checkbox" value="1" id="bizType1" name="bizType">Manufacturer<br>
																												            				<input type="checkbox" value="2" id="bizType2" name="bizType">Trading Company<br>
																												            				<input type="checkbox" value="3" id="bizType3" name="bizType">Buying Office<br>
																												            				<input type="checkbox" value="4" id="bizType4" name="bizType">Agent<br>
																												            				<input type="checkbox" value="5" id="bizType5" name="bizType">Distributor/Wholesaler<br>
																												            				<input type="checkbox" value="7" id="bizType6" name="bizType">Government ministry/Bureau/Commission<br>
																												            				<input type="checkbox" value="8" id="bizType7" name="bizType">Association<br>
																																				            				<input type="checkbox" value="9" checked="" id="bizType8" name="bizType">Business Service (Transportation, finance, travel, Ads, etc)<br>
																												            				<input type="checkbox" value="6" id="bizType9" name="bizType">Other<br>
												<div class="remark">Select up to 3 Business Types</div>
						<div style="display:none;" class="board errorB long" id="sendBizType-advice-error"></div>
						

	       </td>
	    </tr>

  	    	 	  
			<tr>																				<th width="25%"><span class="required">Product/Service: 	</span> </th>
				<td>
															<div id="serviceWeProvide">
					<div class="subHead subHead1">
						We Sell
		         		 <div class="helpContent" style="display:none;width:300px;" id="service-subHead1-ct">
		          			<h5>Product/Service We Sell</h5>
		           			Please enter the main products or services you sell (at least 1 product/service is required for supplier members). Enter only one product/service (50 characters max.) per box. Click "Add more" to add up to 4 more rows.
		          		 </div>
				         
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
							<div id="illegalCharProvide"><div id="provide-1-1-advice-error" class="board errorB long" style="display: none;"></div><div id="provide-1-2-advice-error" class="board errorB long" style="display: none;"></div><div id="provide-1-3-advice-error" class="board errorB long" style="display: none;"></div><div id="provide-1-4-advice-error" class="board errorB long" style="display: none;"></div><div id="provide-1-5-advice-error" class="board errorB long" style="display: none;"></div></div>
						</div>
					</div>

															<div id="serviceWeBuy">
		          <div class="subHead subHead2">
		          	 We Buy
		          
			          <div class="helpContent" style="display:none;width:300px;" id="service-subHead2-ct">
			          	<h5>Product/Service We Buy</h5>
			           Please enter the main products or services you buy (at least 1 product/service is required for buyer members). Enter only one product/service (50 characters max.) per box. Click "Add more" to add up to 4 more rows.
			           
			          </div>
			      
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
				    		<div id="illegalCharPurchase"><div id="buy-1-1-advice-error" class="board errorB long" style="display: none;"></div><div id="buy-1-2-advice-error" class="board errorB long" style="display: none;"></div><div id="buy-1-3-advice-error" class="board errorB long" style="display: none;"></div><div id="buy-1-4-advice-error" class="board errorB long" style="display: none;"></div><div id="buy-1-5-advice-error" class="board errorB long" style="display: none;"></div></div>				    		
				        </div>
				      </div>
					

										
				</td>
			</tr>
						<tr>				<th>Contract Manufacturing:</th>
				<td>
					<table cellspacing="2" cellpadding="0" border="0">
						<tbody><tr>
							<td width="25%">
								<input type="hidden" value="" name="_fmu.m._0.con" id="sendManufacturing">
								<ul class="showList" id="manufacturingList">
																																		    				<li style="margin:0 20px 0 0;float:left;" class="item1"><input type="checkbox" value="1" name="contactManufacturing">
					    				<label for="contactManufacturing1">OEM Service Offered</label></li>
																								    				<li style="margin:0 20px 0 0;float:left;" class="item1"><input type="checkbox" value="2" name="contactManufacturing">
					    				<label for="contactManufacturing1">Design Service Offered</label></li>
																								    				<li style="margin:0 20px 0 0;float:left;" class="item1"><input type="checkbox" value="3" name="contactManufacturing">
					    				<label for="contactManufacturing1">Buyer Label Offered</label></li>
																		 </ul>
																<div id="checkdiv" style="display:none;clear:both;">OEM Experience: 
									<input type="text" maxlength="3" value="" size="3" name="_fmu.m._0.y" id="oemYears"> Year(s)
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
								</div>
							</td>
						</tr>
						 </tbody></table>
	      </td>
	    </tr>
		

			<tr>				<th>
					Year Company Registered:
				</th>
				<td>
					<select name="_fmu.m._0.es">
						<option value="">--- Please select ---</option>
						<option value="2012">2012</option>
						<option value="2011">2011</option>
						<option value="2010">2010</option>
						<option value="2009">2009</option>
						<option value="2008">2008</option>
						<option value="2007">2007</option>
						<option value="2006">2006</option>
						<option value="2005">2005</option>
						<option value="2004">2004</option>
						<option value="2003">2003</option>
						<option value="2002">2002</option>
						<option value="2001">2001</option>
						<option value="2000">2000</option>
						<option value="1999">1999</option>
						<option value="1998">1998</option>
						<option value="1997">1997</option>
						<option value="1996">1996</option>
						<option value="1995">1995</option>
						<option value="1994">1994</option>
						<option value="1993">1993</option>
						<option value="1992">1992</option>
						<option value="1991">1991</option>
						<option value="1990">1990</option>
						<option value="1989">1989</option>
						<option value="1988">1988</option>
						<option value="1987">1987</option>
						<option value="1986">1986</option>
						<option value="1985">1985</option>
						<option value="1984">1984</option>
						<option value="1983">1983</option>
						<option value="1982">1982</option>
						<option value="1981">1981</option>
						<option value="1980">1980</option>
						<option value="1979">1979</option>
						<option value="1978">1978</option>
						<option value="1977">1977</option>
						<option value="1976">1976</option>
						<option value="1975">1975</option>
						<option value="1974">1974</option>
						<option value="1973">1973</option>
						<option value="1972">1972</option>
						<option value="1971">1971</option>
						<option value="1970">1970</option>
						<option value="1969">1969</option>
						<option value="1968">1968</option>
						<option value="1967">1967</option>
						<option value="1966">1966</option>
						<option value="1965">1965</option>
						<option value="1964">1964</option>
						<option value="1963">1963</option>
						<option value="1962">1962</option>
						<option value="1961">1961</option>
						<option value="1960">1960</option>
						<option value="1959">1959</option>
						<option value="1958">1958</option>
						<option value="1957">1957</option>
						<option value="1956">1956</option>
						<option value="1955">1955</option>
						<option value="1954">1954</option>
						<option value="1953">1953</option>
						<option value="1952">1952</option>
						<option value="1951">1951</option>
						<option value="1950">1950</option>
						<option value="1949">1949</option>
						<option value="1948">1948</option>
						<option value="1947">1947</option>
						<option value="1946">1946</option>
						<option value="1945">1945</option>
						<option value="1944">1944</option>
						<option value="1943">1943</option>
						<option value="1942">1942</option>
						<option value="1941">1941</option>
						<option value="1940">1940</option>
						<option value="1939">1939</option>
						<option value="1938">1938</option>
						<option value="1937">1937</option>
						<option value="1936">1936</option>
						<option value="1935">1935</option>
						<option value="1934">1934</option>
						<option value="1933">1933</option>
						<option value="1932">1932</option>
						<option value="1931">1931</option>
						<option value="1930">1930</option>
						<option value="1929">1929</option>
						<option value="1928">1928</option>
						<option value="1927">1927</option>
						<option value="1926">1926</option>
						<option value="1925">1925</option>
						<option value="1924">1924</option>
						<option value="1923">1923</option>
						<option value="1922">1922</option>
						<option value="1921">1921</option>
						<option value="1920">1920</option>
						<option value="1919">1919</option>
						<option value="1918">1918</option>
						<option value="1917">1917</option>
						<option value="1916">1916</option>
						<option value="1915">1915</option>
						<option value="1914">1914</option>
						<option value="1913">1913</option>
						<option value="1912">1912</option>
						<option value="1911">1911</option>
						<option value="1910">1910</option>
						<option value="1909">1909</option>
						<option value="1908">1908</option>
						<option value="1907">1907</option>
						<option value="1906">1906</option>
						<option value="1905">1905</option>
						<option value="1904">1904</option>
						<option value="1903">1903</option>
						<option value="1902">1902</option>
						<option value="1901">1901</option>
						<option value="1900">1900</option>
						<option value="1899">1899</option>
						<option value="1898">1898</option>
						<option value="1897">1897</option>
						<option value="1896">1896</option>
						<option value="1895">1895</option>
						<option value="1894">1894</option>
						<option value="1893">1893</option>
						<option value="1892">1892</option>
						<option value="1891">1891</option>
						<option value="1890">1890</option>
						<option value="1889">1889</option>
						<option value="1888">1888</option>
						<option value="1887">1887</option>
						<option value="1886">1886</option>
						<option value="1885">1885</option>
						<option value="1884">1884</option>
						<option value="1883">1883</option>
						<option value="1882">1882</option>
						<option value="1881">1881</option>
						<option value="1880">1880</option>
						<option value="1879">1879</option>
						<option value="1878">1878</option>
						<option value="1877">1877</option>
						<option value="1876">1876</option>
						<option value="1875">1875</option>
						<option value="1874">1874</option>
						<option value="1873">1873</option>
						<option value="1872">1872</option>
						<option value="1871">1871</option>
						<option value="1870">1870</option>
						<option value="1869">1869</option>
						<option value="1868">1868</option>
						<option value="1867">1867</option>
						<option value="1866">1866</option>
						<option value="1865">1865</option>
						<option value="1864">1864</option>
						<option value="1863">1863</option>
						<option value="1862">1862</option>
						<option value="1861">1861</option>
						<option value="1860">1860</option>
						<option value="1859">1859</option>
						<option value="1858">1858</option>
						<option value="1857">1857</option>
						<option value="1856">1856</option>
						<option value="1855">1855</option>
						<option value="1854">1854</option>
						<option value="1853">1853</option>
						<option value="1852">1852</option>
						<option value="1851">1851</option>
						<option value="1850">1850</option>
						<option value="1849">1849</option>
						<option value="1848">1848</option>
						<option value="1847">1847</option>
						<option value="1846">1846</option>
						<option value="1845">1845</option>
						<option value="1844">1844</option>
						<option value="1843">1843</option>
						<option value="1842">1842</option>
						<option value="1841">1841</option>
						<option value="1840">1840</option>
						<option value="1839">1839</option>
						<option value="1838">1838</option>
						<option value="1837">1837</option>
						<option value="1836">1836</option>
						<option value="1835">1835</option>
						<option value="1834">1834</option>
						<option value="1833">1833</option>
						<option value="1832">1832</option>
						<option value="1831">1831</option>
						<option value="1830">1830</option>
						<option value="1829">1829</option>
						<option value="1828">1828</option>
						<option value="1827">1827</option>
						<option value="1826">1826</option>
						<option value="1825">1825</option>
						<option value="1824">1824</option>
						<option value="1823">1823</option>
						<option value="1822">1822</option>
						<option value="1821">1821</option>
						<option value="1820">1820</option>
						<option value="1819">1819</option>
						<option value="1818">1818</option>
						<option value="1817">1817</option>
						<option value="1816">1816</option>
						<option value="1815">1815</option>
						<option value="1814">1814</option>
						<option value="1813">1813</option>
						<option value="1812">1812</option>
						<option value="1811">1811</option>
						<option value="1810">1810</option>
						<option value="1809">1809</option>
						<option value="1808">1808</option>
						<option value="1807">1807</option>
						<option value="1806">1806</option>
						<option value="1805">1805</option>
						<option value="1804">1804</option>
						<option value="1803">1803</option>
						<option value="1802">1802</option>
						<option value="1801">1801</option>
						<option value="1800">1800</option>
					</select>
				</td>
			</tr>
			<tr>								<th>Total No. Employees:</th>
				<td>
					<select name="_fmu.m._0.e">
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
					</select>
				</td>
							</tr>
			<tr>
				<th></th>
				<td style="text-align:right;"><span style="text-decoration:underline;color:blue;cursor:pointer;" id="moreCompanyContent">&gt;&gt; Show</span></td>
			</tr>
			<tr class="commonCopInfo" style="display: none;">				<th>Own Brands:</th>
				<td>
					<input type="text" maxlength="64" value="" name="_fmu.m._0.br" id="brandName">
					<div class="remark">Please enter your brand names here. Use commas to separate each brand. If you are not the owner of the product brand (e.g. iPod, Xbox, etc.), please provide documentation from the brand owner to confirm you are authorized to sell their products.</div>

				</td>
			</tr>
			<tr class="commonCopInfo" style="display: none;">
				<th>Ownership Type:</th>
				<td>
					<select name="_fmu.m._0.o">
						<option value="0">--- Please select ---</option>
						<option value="1">Corporation/Limited Liability Company</option>
						<option value="2">Partnership</option>
						<option value="6">LLC (Ltd Liability Corp)</option>
						<option value="3">Individual (Sole proprietorship)</option>
						<option value="4">Professional Association</option>
						<option value="5">Others</option>
					</select>
				</td>
			</tr>
			<tr class="commonCopInfo" style="display: none;">
				<th>Registered Capital:</th>
				<td>
					<select name="_fmu.m._0.r">
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
					</select>
				</td>
			</tr>
			<tr class="commonCopInfo" style="display: none;">
				<th>
					Legal Owner:
				</th>
				<td>
					<input type="text" maxlength="96" size="35" value="" name="_fmu.m._0.pri" id="businessOwner">

				</td>
			</tr>
			<tr>				<td colspan="2"><h2>Production &amp; Markets</h2></td>
			</tr>
<tr>
	<th>Total Annual Sales Volume:</th>
	<td>
		<select name="_fmu.m._0.an">
			<option value="">--- Please select ---</option>
			<option value="1">Below US$1 Million</option>
			<option value="2">US$1 Million - US$2.5 Million</option>
			<option value="3">US$2.5 Million - US$5 Million</option>
			<option value="4">US$5 Million - US$10 Million</option>
			<option value="5">US$10 Million - US$50 Million</option>
			<option value="6">US$50 Million - US$100 Million</option>
			<option value="7">Above US$100 Million</option>
		</select>
	</td>
</tr>
<tr>
	<th>Export Percentage:</th>
	<td>
		<select name="_fmu.m._0.ex">
			<option selected="" value="">--- Please select ---</option>
			<option value="1">1% - 10%</option>
			<option value="2">11% - 20%</option>
			<option value="3">21% - 30%</option>
			<option value="4">31% - 40%</option>
			<option value="5">41% - 50%</option>
			<option value="6">51% - 60%</option>
			<option value="7">61% - 70%</option>
			<option value="8">71% - 80%</option>
			<option value="9">81% - 90%</option>
			<option value="10">91% - 100%</option>
		</select>
	</td>
</tr>
<tr>		<th>Main Markets:</th>
	<td>
		<table cellspacing="2" cellpadding="0" border="0">
			<tbody><tr>
				<td width="25%"> 
					<input type="hidden" value="" maxlength="128" size="52" name="_fmu.m._0.tr" id="sendTradeRegion">               	
					<ul class="showList clearfix" id="mainMarketsList">
						<li class="item1"><input type="checkbox" value="1" name="tradeRegion"><label for="mainMarketsItem1">North America</label></li>
						<li class="item1"><input type="checkbox" value="2" name="tradeRegion"><label for="mainMarketsItem1">South America</label></li>
						<li class="item1"><input type="checkbox" value="8" name="tradeRegion"><label for="mainMarketsItem1">Eastern Europe</label></li>
						<li class="item1"><input type="checkbox" value="32" name="tradeRegion"><label for="mainMarketsItem1">Southeast Asia</label></li>
						<li class="item1"><input type="checkbox" value="128" name="tradeRegion"><label for="mainMarketsItem1">Africa</label></li>
						<li class="item1"><input type="checkbox" value="256" name="tradeRegion"><label for="mainMarketsItem1">Oceania</label></li>
						<li class="item1"><input type="checkbox" value="64" name="tradeRegion"><label for="mainMarketsItem1">Mid East</label></li>
						<li class="item1"><input type="checkbox" value="16" name="tradeRegion"><label for="mainMarketsItem1">Eastern Asia</label></li>
						<li class="item1"><input type="checkbox" value="4" name="tradeRegion"><label for="mainMarketsItem1">Western Europe</label></li>
						<li class="item1"><input type="checkbox" value="512" name="tradeRegion"><label for="mainMarketsItem1">Central America</label></li>
						<li class="item1"><input type="checkbox" value="1024" name="tradeRegion"><label for="mainMarketsItem1">Northern Europe</label></li>
						<li class="item1"><input type="checkbox" value="2048" name="tradeRegion"><label for="mainMarketsItem1">Southern Europe</label></li>
						<li class="item1"><input type="checkbox" value="5096" name="tradeRegion"><label for="mainMarketsItem1">South Asia</label></li>
					</ul>

				</td>
			</tr>
		</tbody></table>
	</td>
	</tr>
<tr>						<th>Main Customers:</th>
	<td>
		<input type="text" value="" maxlength="128" size="52" name="_fmu.m._0.k" id="mainCustomer">
		<div class="remark">Enter 128 characters max. Use commas to separate the customer names. If you want to enter trade-marked company names (e.g. Nike, Sony, etc.), please provide documentation to prove you are an official partner/supplier/service provider.</div>

	</td>
	</tr>
<tr>		<th>Company Certification:</th>
	<td>
		<table cellspacing="2" cellpadding="0" border="0">
			<tbody><tr>
				<td width="25%"> 
					<input type="hidden" value="" maxlength="128" size="52" name="_fmu.m._0.ce" id="sendCertification">
					<ul class="showList" id="certificationList">	
							<li class="item1"><input type="checkbox" value="1" name="certification"><label for="certificationItem1">HACCP</label></li>
	
							<li class="item1"><input type="checkbox" value="2" name="certification"><label for="certificationItem1">ISO 9001:2000</label></li>
	
							<li class="item1"><input type="checkbox" value="11" name="certification"><label for="certificationItem1">ISO 9001:2008</label></li>
	
							<li class="item1"><input type="checkbox" value="3" name="certification"><label for="certificationItem1">QS-9000</label></li>
	
							<li class="item1"><input type="checkbox" value="4" name="certification"><label for="certificationItem1">ISO 14001:2004</label></li>
	
							<li class="item1"><input type="checkbox" value="5" name="certification"><label for="certificationItem1">ISO/TS 16949</label></li>
	
							<li class="item1"><input type="checkbox" value="6" name="certification"><label for="certificationItem1">SA8000</label></li>
	
							<li class="item1"><input type="checkbox" value="7" name="certification"><label for="certificationItem1">ISO 17799</label></li>
	
							<li class="item1"><input type="checkbox" value="8" name="certification"><label for="certificationItem1">OHSAS 18001</label></li>
	
							<li class="item1"><input type="checkbox" value="9" name="certification"><label for="certificationItem1">TL 9000</label></li>
	
	<li class="item1">
	<input type="checkbox" value="10" name="certification" id="certification-checkbox-others"><label for="certificationItem1">Others</label>
	
	<div style="display:none;" class="checkbox-others-box" id="certification-others-box"><input type="text" name="_fmu.m._0.cer" value="" size="52" maxlength="512" id="certification-others">
<div class="remark">Use commas to separate the certification names</div>
</div>
</li>
	
					</ul>

				</td>
			</tr>
		</tbody></table>
	</td>
	</tr>
<tr>
	<th></th>
	<td style="text-align:right;"><span style="text-decoration:underline;color:blue;cursor:pointer;" id="moreFactoryContent"> &gt;&gt; Show</span></td>
</tr>
<tr class="commonFacInfo" style="display: none;">		<th>Factory Location:</th>
	<td>
		<input type="text" maxlength="512" value="" size="52" name="_fmu.m._0.fa" id="factoryLocation">

	</td>
	</tr>
<tr class="commonFacInfo" style="display: none;">		<th>Factory Size:</th>
	<td>
		<select name="_fmu.m._0.f">
			<option value="">--- Please select ---</option>
			<option value="1">Below 1,000 square meters</option>
			<option value="2">1,000-3,000 square meters</option>
			<option value="3">3,000-5,000 square meters</option>
			<option value="4">5,000-10,000 square meters</option>
			<option value="5">10,000-30,000 square meters</option>
			<option value="6">30,000-50,000 square meters</option>
			<option value="7">50,000-100,000 square meters</option>
			<option value="8">Above 100,000 square meters</option>
		</select>
	</td>
	</tr>
<tr class="commonFacInfo" style="display: none;">	<th>No. of Production Lines:</th>
	<td>
		<select name="_fmu.m._0.produ">
			<option selected="" value="">--- Please select ---</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="100">Above 10</option>
		</select>
	</td>
</tr>
<tr class="commonFacInfo" style="display: none;">	<th>Total Annual Purchase Volume:</th>
	<td>
		<select name="_fmu.m._0.ann">
			<option selected="" value="">--- Please select ---</option>
			<option value="1">Below US$1 Million</option>
			<option value="2">US$1 Million - US$2.5 Million</option>
			<option value="3">US$2.5 Million - US$5 Million</option>
			<option value="4">US$5 Million - US$10 Million</option>
			<option value="5">US$10 Million - US$50 Million</option>
			<option value="6">US$50 Million - US$100 Million</option>
			<option value="7">Above US$100 Million</option>
		</select>
	</td>
</tr>
<tr class="commonFacInfo" style="display: none;">	<th>Quality Control:</th>
	<td>
		<select name="_fmu.m._0.q">
			<option selected="" value="">--- Please select ---</option>
			<option value="1">In House</option>
			<option value="2">Third Parties</option>
			<option value="3">No</option>
		</select>
	</td>
</tr>
<tr class="commonFacInfo" style="display: none;">		<th>No. of R&amp;D Staff:</th>
	<td>
		<select name="_fmu.m._0.rn">
			<option value="">--- Please select ---</option>
			<option value="1">Less than 5 People</option>
			<option value="2">5 - 10 People</option>
			<option value="3">11 - 20 People</option>
			<option value="4">21 - 30 People</option>
			<option value="5">31 - 40 People</option>
			<option value="6">41 - 50 People</option>
			<option value="31">Above 50 People</option>
		</select>
	</td>
	</tr>
<tr class="commonFacInfo" style="display: none;">		<th>No. of QC staff:</th>
	<td>
		<select name="_fmu.m._0.qc">
			<option value="">--- Please select ---</option>
			<option value="1">Less than 5 People</option>
			<option value="2">5 - 10 People</option>
			<option value="3">11 - 20 People</option>
			<option value="4">21 - 30 People</option>
			<option value="5">31 - 40 People</option>
			<option value="6">41 - 50 People</option>
			<option value="31">Above 50 People</option>
		</select>
	</td>
	</tr>
			<tr>				<td colspan="2"><h2>Company Introduction &amp; Images</h2></td>
			</tr> 
<tr>
	<th>Company Logo:</th>
	<td>
		<input type="hidden" autocomplete="off" value="" name="_fmu.m._0.l" id="companyLogoFiles">
		<div class="staticProductImage productImageUpload uploaderSinglePic" id="companyLogoImage">
			<div class="column">
				<div style="position:relative;float:left; _height:90px; min-height:90px;">
					<div style="margin-right:10px;" class="templateRind" id="logoItemTemplateRind"><div style="width:auto;" class="picItem" id="" _binddataid="1" _uploadstatus="complete">
						<div style="width:100px; height:100px; font-size:12px;*font-size:87px;" class="previewPicContainer" id="logoPreviewPicContainer">
							<div style="display:none; font-size:12px; position:absolute; top:30px; left:30px;" class="loadingStatus"><img src="http://img.alibaba.com/images/eng/style/css_images/icon_loader.gif"></div>
							<div style="" class="completeStatus" id="logoPicContainer"></div>
						</div>
						<span class="picName"></span>
						<span style="display:none;float:left;" class="pendingStatus statusHint">pending </span>
						<div style="display:none;float:left;" class="loadingStatus loadingStatus">
							<span class="statusHint loadingHint">loading </span>
							<div style="display:none;" class="loadingBox">
								<div style="height:3px;width:50px;" class="progressBarRind"><div class="progressBar"></div></div>
							</div>
						</div>
						<div class="commandArea">
							<a class="btnCancel" href="javascript:void(0)" style="display: none;"><strong>Cancel</strong></a>
						</div>
					</div></div>			                
				</div>
				<div style="display:none;" id="logoItemTemplate">
					<div style="width:auto;" class="picItem">
						<div style="width:100px; height:100px; font-size:12px;*font-size:87px;" class="previewPicContainer" id="logoPreviewPicContainer">
							<div style="display:none; font-size:12px; position:absolute; top:30px; left:30px;" class="loadingStatus"><img src="http://img.alibaba.com/images/eng/style/css_images/icon_loader.gif"></div>
							<div style="display:none;" class="completeStatus" id="logoPicContainer"></div>
						</div>
						<span class="picName"></span>
						<span style="display:none;float:left;" class="pendingStatus statusHint">pending </span>
						<div style="display:none;float:left;" class="loadingStatus loadingStatus">
							<span class="statusHint loadingHint">loading </span>
							<div style="display:none;" class="loadingBox">
								<div style="height:3px;width:50px;" class="progressBarRind"><div class="progressBar"></div></div>
							</div>
						</div>
						<div class="commandArea">
							<a class="btnCancel" href="javascript:void(0)"><strong>Cancel</strong></a>
						</div>
					</div>
				</div>
				<div style="text-align:center" class="commandArea">
					<div style="margin-left:2px;margin-top:6px;position:relative;">
						<div class="ansyUploadHelper" id="logoUploadContainer" style="width: 153px; height: 27px; left: 0px; top: -2px;"><embed width="100%" height="100%" flashvars="allowedDomain=us.my.alibaba.com&amp;elementID=yuigen0&amp;eventHandler=YAHOO.widget.FlashAdapter.eventHandler" menu="false" wmode="transparent" allowscriptaccess="always" quality="high" bgcolor="#ffffff" name="yuigen0" id="yuigen0" style="undefined" src="http://img.alibaba.com/sfm/app/uploader.swf?__updateTime1326781501695" type="application/x-shockwave-flash" tabindex="1"></div>
						<input type="button" style="width:150px;" value="Browse" id="btnSelectLogo" name="btnSelectLogo">                   
					</div>
					<div style="text-align:left;margin-top:5px">
						<a class="noVisited" id="btnRemoveLogo" href="javascript:vd(0)">Remove</a>
					</div>
				</div>
				<div style="clear:both;" class="remarkBox">
					<span class="remark">200KB max. JPEG or GIF format only.</span>
				
					<div class="helpContent" style="display:none;width:300px;" id="company-Logo-ct">
						<h5>Company Logo</h5>
						<p> Please upload a brand/trademark logo that represents your company. Please do not upload animated images, contact information, product pictures or photos of people.</p>
					</div>
				<iframe frameborder="0" class="maskIframe" style="display: none; z-index: 999; top: 0px; left: 0px;"></iframe></div>
			</div>
			<div style="clear:both;" id="errorno">
				<div class="board errorB_fix" style="display:none;" id="logoUploadErrorMes"></div>
			</div>
		</div>

	</td>
</tr>
<tr>
	<th>		Detailed Company Introduction:
			</th>
	<td>
		<textarea maxlength="4000" rows="10" cols="80" name="_fmu.m._0.comp" id="companyIntroduction"></textarea>
		<div class="remarkBox">
			<span class="remark remarkSpace" id="companyIntroductionTip" style="text-align:left">Remaining: <span style="color:red" id="companyIntroductionCount">4000</span>&nbsp;;</span>
			<img align="absmiddle" class="imageHelp" src="http://img.alibaba.com/images/eng/style/css_images/myalibaba/minisite_question.gif" id="company-introduction-help">
			<div class="helpContent" style="display:none;width:300px;" id="company-introduction-ct">
				<h5>Detailed Company Introduction</h5>
				<p>Build trust faster. Provide potential partners with detailed information about your products, services, company history and competitive advantages</p>
			</div>
	</div>
		<div style="display: none;" class="board errorB long" id="companyIntroduction-advice-error"></div>

	</td>
</tr>
  <tr>
   	<th>Company Website Url:</th>
   	<td>
   		   		   		<input type="text" maxlength="256" size="52" value="http://" name="_fmu.m._0.h" id="websiteURL">
   		<div class="remark">Each company website URL should begin with <strong>http://</strong>.If your company owns more than one website, use a comma to separate each URL.

   		</div>

   	</td>
   </tr>
       
			<tr><td colspan="2"><h2 style="color:#000000;">Before clicking 'Submit', please check the info that you provided. Once submitted, no further editing is allowed within 24 hours.</h2></td></tr><tr>
			</tr><tr>
				<td class="formButton" colspan="2">
					<input type="button" value="Submit" name="Submit" class="dpl-btn" id="btnSubmit">
				</td>
			</tr>
		</tbody></table>
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
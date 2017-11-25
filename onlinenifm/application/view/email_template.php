<?php
//echo $email;
?>
<table width="100%" border="0">
  <?php 
		if(!empty($msg)){
			
			
			if($email=='contactus'){
				?>
  <tr>
    <td class="thank_text"> Dear <?php echo ucwords($this->input->post('Name'));  ?> <br>
      <br>
      <strong>Thank you so much for contacting us. We shall get back to you soon!</strong><br />
      <br />
      You have successfuly send your Enquiry to NIFM Support Team. We will get back to you as soon as possible.
	  Please visit us on various online platforms such as 
	  <a target="_blank" href="https://www.facebook.com/NifmEducationalInstitutionsLtd?ref=hl">facebook</a>,
	  <a target="_blank" href="https://www.youtube.com/user/NIFMchannel">youtube
	  </a>,
	  <a target="_blank" href="https://twitter.com/NIFM_India">twitter</a>,
	  <a target="_blank" href="http://in.linkedin.com/pub/nifm-india/22/a71/4a8">LinkedIn</a>,
	  blogs and forums. NIFM provides Placement assistance to all successful students. A team of dedicated placement professionals and our Academic Advisory Board provides regular guidance, mentorship and internship to the students.<br />
      <br />
      We leverage our extensive network of industry partners and contacts developed with the leading players of Financial Services.<br />
      <br />
      Thanks & Regards </td>
  </tr>
  <?php
				
			}elseif($email=='contactadmin'){
			
			?>
					<tr>
					<td class="thank_text"><br>
					  <br>
					  Contact Us :</strong><br />
					  <br />
					  <strong>Name</strong> : <?php echo ucwords($this->input->post('Name'));  ?><br />
					  <strong>Email</strong> : <?php echo ($this->input->post('Email'));  ?><br />
					  <strong>Contact No</strong> : <?php echo $this->input->post('ContactNo');  ?><br />
					  <strong>Address</strong> : <?php echo $this->input->post('Address');  ?><br />
					  <strong>Message</strong> : <?php echo $this->input->post('Msg');  ?><br />
					  </td>
				  </tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
  <?php
				
			}
			elseif($email=='feedbackuser'){
				?>
  <tr>
    <td class="thank_text"><strong> <strong> Dear <?php echo ucwords($this->input->post('Name'));  ?></strong> <br>
      <br>
      Thank you so much <?php echo $this->input->post('Name');  ?> for your generous feedback.</strong><br />
      <br />
      Your feedback is very important to us. We look forward to improvise upon various aspects as suggested by you. Please visit us on various online platforms such as facebook, twitter, LinkedIn, blogs and forums. NIFM provides Placement assistance to all successful students. A team of dedicated placement professionals and our Academic Advisory Board provides regular guidance, mentorship and internship to the students.<br />
      <br />
      We leverage our extensive network of industry partners and contacts developed with the leading players of Financial Services.<br />
      <br />
      Thanks & Regards </td>
  </tr>
  <?php
				
				
			}elseif($email=='feedbackadmin'){
				?>
				<tr>
					<td class="thank_text"><br>
					  <br>
					  Submit a feedback :</strong><br />
					  <br />
					  <strong>Name</strong> : <?php echo ucwords($this->input->post('Name'));  ?><br />
					  <strong>Email</strong> : <?php echo ($this->input->post('Email'));  ?><br />
					  <strong>Contact No</strong> : <?php echo $this->input->post('ContactNo');  ?><br />
					  <strong>Address</strong> : <?php echo $this->input->post('Address');  ?><br />
					  <strong>Message</strong> : <?php echo $this->input->post('Msg');  ?><br />
					  </td>
				  </tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
  <?php
				
				
			}
			
			
			elseif($email=='forgot_password'){
				?>
  <tr>
    <td class="thank_text"><strong> <strong> Dear <?php echo $userDetail[0]['FirstName'].' '.$userDetail[0]['LastName'];  ?></strong> <br>
      <br>
      Here is the your login details:</strong><br />
      <br />
      <strong>Email/Username</strong> : <?php echo $userDetail[0]['Email'];  ?><br />
	  <br>
      <span><a href="<?php echo base_url() . '/process?ID='.$userDetail[0]['UserID'].'&page=myaccount/change_password' ?>" target="_blank"><?php echo base_url() . 'resetpassword/' . $userDetail[0]['Email'];  ?></a></span><br>
      <br>
      <br />
      Please keep your login details confidential. <br />
      <br />
      Thanks & Regards </td>
  </tr>
  <?php
				
				
			}
			
			elseif($email=='register'){
				?>
  <tr>
    <td class="thank_text"><strong> Dear <?php echo ucwords($this->input->post('FirstName')) . '&nbsp;' . ucwords($this->input->post('LastName'));  ?></strong> <br>
      <br>
      <strong>Welcome to NIFM Educational Institutions Ltd</strong><br />
      <br>
      To activate your newly created NIFM account, <a href="<?php echo base_url() . 'activation/' . $activationLink;  ?>">click here</a> .<br>
      <br>
      Alternately, you may also copy paste the below link in the browser to activate your account.<br>
      <br>
      <span><a href="<?php echo base_url() . 'activation/' . $activationLink;  ?>" target="_blank"><?php echo base_url() . 'activation/' . $activationLink;  ?></a></span><br>
      <br>
      Y<strong>our Email/Username address is</strong>: <?php echo $this->input->post('Email');  ?><br>
      <!--strong>Password:</strong> <?php //echo $this->input->post('Password');  ?><br-->
      <br>
      Activate your account and enjoy all account related benefits:<br>
      <br>
     
      For any queries or concerns, call us at <strong>011-45646322 or (+91)8588868474.</strong> You may send us email at <strong>info@onlinenifm.com</strong>
      
    
      <br><br>
      Thanks & Regards </td>
  </tr>
  <?php
				
				
			}
			
			
			elseif($email=='OrderConfirm'){
				$OrderData=$orderDetail[0];
				
				?>
				<tr>
    <td class="thank_text"><strong> Dear Mr/Ms <?php echo ucwords($this->session->userdata("Name")) . '&nbsp;' . ucwords($this->input->post('LastName'));  ?></strong> <br>
      <br>
      <strong>Welcome to NIFM Educational Institutions Ltd</strong><br />
      <br>
      Thank you for placing the order with us<br>
      <br>
     Your Order Details as follows: <br>
      <br>
      
      <table width="100%" border="0" style="border:1px solid #666;">
	<tr>
    <td colspan="4" align="center" height="30px" style="border:1px solid #999;" bgcolor="#CCCCCC">
	<strong>NIFM Educational Institutions Ltd</strong>
	</td>
  </tr>	  
  <tr>
    <td colspan="4" align="center" style="border:1px solid #999;font-size: 12px;" bgcolor="#CCCCCC">
	Address: Plot No. 4, Block - C, Community. Centre, Pankha Road, Janak Puri, New Delhi-110058
	Contact Number: 011-45646322, 8588868474
	</td>
  </tr>	  
	  
	
	<tr>
    <td colspan="4" align="center" height="50px">
		<strong>
		<?php
		if($OrderData['BillNumber']){
		echo "Invoice";
		}else{
			echo "Order Detail";
		}
		?>
		</strong>
	</td>
	</tr>
	<?php
	if($OrderData['BillNumber']){
	echo '<tr>
	<td>
	<strong>Bill Number</strong>
	</td>
	<td colspan="3">
	 '.$OrderData['BillNumber'].'
	</td>
	</tr>';
	}?>
  <tr>
    <td width="22%"><strong>Order Code </strong> </td>
    <td width="33%"><?php echo  $OrderData['OrderCode'];?></td>
    <td width="19%"><strong>Name</strong></td>
    <td width="26%"><?php echo  $OrderData['FirstName'];?></td>
  </tr>
  <tr>
    <td><strong>Order Status </strong> </td>
	<?php 

 if($OrderData['PaymentType']==3){
 
 echo "<td> Completed </td>";
 
 }elseif($OrderData['PaymentType']==5){
	 
	 echo "<td> Completed </td>";
 }else{
 
 
 ?>
 
    <td> <?php echo $this->lang->line('OrderStatus_'.$OrderData['OrderStatus']) ;?></td>
	
<?php
	}
?>	
    <td><strong>Email</strong></td>
    <td><?php  echo  $OrderData['Email'];?></td>
  </tr>
  <tr>
    <td height="28"><strong>Order Amount </strong></td>
	

    <td><?php
				
				 if($OrderData['PaymentType']==3){
					
						echo  number_format($OrderData['OrderTotal'], 2, '.', '');
				 
				 }else{
						echo  $OrderData['OrderTotal'];
				}
				
				?> Rs.</td>
    <td><strong>Contact No</strong></td>
    <td><?php echo  $OrderData['ContactNo'];?></td>
  </tr>
  <tr>
    <td><span class="oder_left"><strong>Payment option</strong> </span></td>
	
		<?php 

 if($OrderData['PaymentType']==3){
 
 echo "<td> Free </td>";
 
 }elseif($OrderData['PaymentType']==5){
	  echo "<td> Voucher </td>";
	 
 }else{
 
 
 ?>
	
    <td> <?php echo $this->lang->line('payment_'.$OrderData['PaymentType']); ?></td>
	
	<?php
	
			}
				
		?>
	
    <td><strong>Address</strong></td>
    <td><?php echo  $OrderData['Address'];?></td>
  </tr>
  
  <?php
	if($OrderData['PaymentType']==5){
		?>
   <tr>
		<td height="28"><strong>Vendor</strong></td>
		

		<td><?php		
				echo $VendorName[0]['vendor_name'];	
					?> </td>
		<td><strong>&nbsp;</strong></td>
		<td>&nbsp;</td>
  </tr>
	<?php  } ?>
  
  <tr>
	<td width="22%"><strong>GSTIN</strong> </td>
    <td width="33%">07AAECN0841K1ZH</td>
    
    <td><strong>City</strong></td>
    <td><?php echo  $OrderData['City'];?></td>
  </tr>
  <tr>
	<td width="22%"><strong>PAN Number </strong> </td>
    <td width="33%" colspan="2">AAECN0841K</td>
    </tr>
  <tr>
  <td width="22%"><strong>Date </strong> </td>
    <td width="33%"><?php echo  date("F j, Y, g:i a");?></td>
     <td><strong>State</strong></td>
    <td><?php  echo $OrderData['State'];?></td>
  </tr>
  <tr>
    <td colspan="4"><table width="100%" border="0">
  <tr>
    <td colspan="5"><table width="100%" border="0" style="border:1px solid #999;    ">
      <tr>
        <td align="center" bgcolor="#CCCCCC"><strong>Title</strong></td>
        <td align="center" bgcolor="#CCCCCC"><strong>Price</strong></td>
        <td align="center" bgcolor="#CCCCCC"><strong>Quantity</strong></td>
		 <td align="center" bgcolor="#CCCCCC"><strong>Discount %</strong></td>
        <td align="center" bgcolor="#CCCCCC"><strong>Net Price</strong></td>
      </tr>
      <?php foreach($products as $productData):?>
      <tr>
        <td align="center"><?php echo  $productData['Title'];?></td>
        <td align="center"><?php 
		
			 if($OrderData['PaymentType']==3){
			
			echo  number_format($productData['Price'], 2, '.', '');
			
			}else{
			
					echo  $productData['Price'];
			}
			
			?> Rs.</td>
        <td align="center"><?php echo  $productData['Qty'];?></td>
		 <td align="center"><?php echo  $productData['discount'];?>%</td>
        <td align="center"><?php 
		
					
		 if($OrderData['PaymentType']==3){
			
					echo  number_format($productData['Total'], 2, '.', '');
			
			}else{
					
					
					echo  $productData['Total'];
					
					}
					?> Rs.</td>
      </tr>
      <?php endforeach; ?>
      
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong>SubTotal</strong></td>
        <td><?php 
						
					 if($OrderData['PaymentType']==3){

					 echo  number_format($OrderData['SubTotal'], 2, '.', '');
							
								
								
				}else{
					echo  $OrderData['SubTotal'];
					}
					
					?> Rs.</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong>GSTIN</strong></td>
        <td><?php 
		
		if($OrderData['Tax']==0){
				echo "<p>(Inclusive of GSTIN)</p>";
			
			}else{
			echo  number_format($OrderData['Tax'], 2, '.', '');
			}
		
		?> %</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong>Total</strong></td>
        <td><?php 
						
				 if($OrderData['PaymentType']==3){
				 
				 
						echo  number_format($OrderData['OrderTotal'], 2, '.', '');

					}else{	
		
						echo  $OrderData['OrderTotal'];
				}
				
				?> Rs.</td>
      </tr>
    </table></td>
    </tr>

</table>
</td>
    </tr>
</table>

<?php 

 if($OrderData['PaymentType']==3){
  
 }elseif($OrderData['PaymentType']==5){
 
 
 }elseif($OrderData['PaymentType']==2){
 
 
 }else{
 
 
 ?>
  
      <br>
      If you have sellected the offline payment option or want to make payment through offline mode, You need to deposit the payment in below bank .Once you deposited the payment ,you can access the purchased modules .<br />
      <br />
      <table cellpadding="0" cellspacing="0" align="center" border="0" width="99%">
		<tbody>
			<tr>
				<td style="padding-right:15px;" align="justify">
					<h4><font color="#0000ff">Students can deposit the fees by Cheque / DD / PO/ Cash/ NEFT/RTGS  in the name of "NIFM EDUCATIONAL INSTITUTIONS LTD", payable at New Delhi.</font></h4><h4><font color="#0000ff">Bank details are as follows :-</font></h4>
					<strong></strong><h4><font color="#0000ff">&nbsp;(A)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bank Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  HDFC Bank Ltd</font></h4><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Account No.&nbsp;&nbsp;&nbsp;&nbsp; :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 07082560002660</h4><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I F S C&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HDFC0000708</h4><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Branch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GR.FL, DCM Building 16, Barakhamba Road, New Delhi-110001</h4><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Account Type&nbsp;&nbsp;&nbsp; :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Current</h4><h4><font color="#0000ff">&nbsp;&nbsp;&nbsp; &nbsp;</font></h4>
                    <h4><font color="#0000ff">&nbsp;(B)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bank Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ICICI Bank Ltd</font></h4>
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Account No.&nbsp;&nbsp;&nbsp;&nbsp; :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 025005003985</h4><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I F S C&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ICIC0000250</h4><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Branch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dwarka Branch, New  Delhi-110075</h4>
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Account Type&nbsp;&nbsp;&nbsp; :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Current</h4><h4><font color="#0000ff">&nbsp;&nbsp;&nbsp; &nbsp;</font></h4>
				</td>
			</tr>
		</tbody>
	</table>
<?php
	
	}

?>

		<p style='color:#000000'><br><br><b>Procedure to explore the course:</b><br><br>
		Step:-1. Log onto www.onlinenifm.com / login (if not already done)<br>
		Step:-2. Click on My Account<br>
		Step:-3. Go to My Purchased Courses (on left hand side) in My account<br>
		Step:-4. Your Course Will be displayed on right hand side<br>
		Step:-5. Click on EXPLORE button to explore the course<br>
		Step:-6. Now the Course will be displayed on your screen, Select Chapter1 Video1 OR MOCK TEST on left hand side <br>			
		</p>	
      <br />
      <br />
      For any queries or concerns, call us at <strong>011-45646322 or (+91)8588868474.</strong> You may send us email at <strong>info@onlinenifm.com</strong><br>
      <br>
       </td>
  </tr>
  <?php
				
			}
			elseif($email=='askquestion'){
				//echo "test";
				?>
                 <tr>
    <td class="thank_text"><strong> <strong> Dear Admin(onlinenifm.com)</strong> <br>
      <br>
      A new enquiry for ask questions has been received .Here is the details:</strong><br />
      <br />
      <strong>Name</strong> : <?php echo strip_tags($this->input->post('Name'));  ?><br />
      <strong>Email</strong> : <?php echo strip_tags($this->input->post('Email'));  ?><br />
      <strong>Contact No</strong> : <?php echo strip_tags($this->input->post('ContactNo'));  ?><br />
      <strong>Question</strong> : <?php echo strip_tags($this->input->post('Quest'));  ?><br />
      </td>
  </tr>
                
                
                <?php
			}
			elseif($email=='paymentOnline'){
				//echo "test";
				$OrderData=$orderData[0];
				?>
                 <tr>
					<td class="thank_text"><strong> <strong> Dear <?php echo $OrderData['name'];?></strong> <br>
					  <br>
					  Here is the Your Submition details:</strong><br />
					  <br />
					  <strong>Order Code</strong> : <?php echo $OrderData['OrderCode'];?><br />
					  <strong>Courses/Franchise/Research</strong> : <?php echo $OrderData['course'];?><br />
					  <strong>branch</strong> : <?php echo $OrderData['branch'];?><br />
					  <strong>Fees</strong> : <?php echo round($OrderData['fees'],1);?> INR (inclusive of GSTIN)<br />
					  <strong>Name</strong> : <?php echo $OrderData['name'];?><br />
					  <strong>Email</strong> : <?php echo $OrderData['email'];?><br />
					  <strong>Contact No</strong> : <?php echo $OrderData['mobile'];?><br />
					  <strong>Address</strong> : <?php echo $OrderData['address'];?><br />
					  <strong>Payment Status</strong> : <?php  if($OrderData['OrderStatus']=='0'){echo "Payment Pending";}elseif($OrderData['OrderStatus']=='1'){echo "Completed";}elseif($OrderData['OrderStatus']=='2'){echo "Cancelled";}?><br />
					  <strong>Payment Option</strong> : <?php  if($OrderData['PaymentType']=='1'){echo "CCavenue";}elseif($OrderData['PaymentType']=='2'){echo "PauMoney";}?><br />
					  </td>
				  </tr>
					<tr>
						<td>&nbsp;</td>
					</tr>		
                
                <?php
			}elseif($email=='paymentFaild'){
				$OrderData=$orderData[0];
				?>
				 Dear  <?php echo $OrderData['name'];?><br/><br/>
						Payment Unsuccessful 
			<center>
			<br/><br/>
			<table style='border:1px solid #000000;'>
			<tr>
				<td colspan='2'>NIFM Educational Institutions Ltd.</td> 
			</tr>	
			<tr>
				<td colspan='2'>CIN No. U80300DL2012PLC239826</td> 
			</tr>
			<tr>
				<td colspan='2'>GSTIN: 07AAECN0841K1ZH </td> 
			</tr>
			<tr>
				<td colspan='2'>&nbsp;</td> 
			</tr>
			<tr><td>Order No.</td> <td><?php echo $OrderData['OrderCode'];?></td></tr>
			<tr><td>Fees for </td><td> <?php echo $OrderData['course'];?></td></tr>
			<tr><td>Fees </td><td> <?php echo round($OrderData['fees'],1);?> INR (inclusive of GSTIN)</td></tr>
			<tr><td>Branch </td><td><?php echo $OrderData['branch'];?></td></tr>
			<tr><td>Name </td><td><?php echo $OrderData['name'];?></td></tr>
			<tr><td>Email Id: </td><td><?php echo $OrderData['email'];?></td></tr>
			<tr><td>Phone No. </td><td><?php echo $OrderData['mobile'];?></td></tr>
			<tr><td>Address. </td><td><?php echo $OrderData['address'];?></td></tr>
			<tr><td>Date </td><td><?php echo $OrderData['date'];?></td></tr>
			<tr><td>Payment Status </td><td><?php  if($OrderData['OrderStatus']=='0'){echo "Payment Pending";}elseif($OrderData['OrderStatus']=='1'){echo "Completed";}elseif($OrderData['OrderStatus']=='2'){echo "Cancelled";}?></td></tr>
			<tr><td>Payment Option </td><td><?php  if($OrderData['PaymentType']=='1'){echo "CCavenue";}elseif($OrderData['PaymentType']=='2'){echo "PauMoney";}?></td></tr>
			</table>
			</center>
			<br/><br/>

			<br/>
				
		<?php	
			}elseif($email=='paymentSuccess'){
				$OrderData=$orderData[0];
				?>
				 Dear  <?php echo $OrderData['name'];?><br/><br/>
						This is to confirm that we have Received an Amount of Rs. <?php echo round($OrderData['fees'],1);?>
						for the fee towards <?php echo ucfirst($OrderData['course']);?> Please find the Details Below.
			<center>
			<br/><br/>
			<table style='border:1px solid #000000;'>
			<tr>
				<td colspan='2'>NIFM Educational Institutions Ltd.</td> 
			</tr>	
			<tr>
				<td colspan='2'>CIN No. U80300DL2012PLC239826</td> 
			</tr>
			<tr>
				<td colspan='2'>GSTIN: 07AAECN0841K1ZH </td> 
			</tr>
			<tr>
				<td colspan='2'>PAN Number: AAECN0841K</td> 
			</tr>
			<tr>
				<td colspan='2'>&nbsp;</td> 
			</tr>
			<tr><td>Bill No.</td> <td><?php echo $OrderData['BillNumber'];?></td></tr>
			<tr><td>Order No.</td> <td><?php echo $OrderData['OrderCode'];?></td></tr>
			<tr><td>Fees for </td><td> <?php echo $OrderData['course'];?></td></tr>
			<tr><td>Fees </td><td> <?php echo round($OrderData['fees'],1);?> INR (inclusive of GSTIN)</td></tr>
			<tr><td>Branch </td><td><?php echo $OrderData['branch'];?></td></tr>
			<tr><td>Name </td><td><?php echo $OrderData['name'];?></td></tr>
			<tr><td>Email Id: </td><td><?php echo $OrderData['email'];?></td></tr>
			<tr><td>Phone No. </td><td><?php echo $OrderData['mobile'];?></td></tr>
			<tr><td>Address. </td><td><?php echo $OrderData['address'];?></td></tr>
			<tr><td>Date </td><td><?php echo $OrderData['date'];?></td></tr>
			<tr><td>Payment Status </td><td><?php  if($OrderData['OrderStatus']=='0'){echo "Payment Pending";}elseif($OrderData['OrderStatus']=='1'){echo "Completed";}elseif($OrderData['OrderStatus']=='2'){echo "Cancelled";}?></td></tr>
			<tr><td>Payment Option </td><td><?php  if($OrderData['PaymentType']=='1'){echo "CCavenue";}elseif($OrderData['PaymentType']=='2'){echo "PauMoney";}?></td></tr>
			</table>
			</center>
			<br/><br/>

			<br/>
				
		<?php	
			}elseif($email=='testimonial'){
				?>
  <tr>
    <td class="thank_text"><strong> <?php echo $this->session->userdata('Name');  ?></strong> <br>
      <br>
      Submiting a Testimonial please verify.<br />
      <br />
     </td>
  </tr>
  <tr><td>Name </td><td><?php echo $this->session->userdata('Name');?></td></tr>
	<tr><td>Email Id: </td><td><?php echo $this->session->userdata('Email');?></td></tr>
	<tr><td>Testimonial. </td><td><?php echo $this->session->userdata('Message');?></td></tr>
			
  <?php
				
				
			}
			
		}
		
		
		?>
  <tr>
    <td>Thanks & Regards<br />
      NIFM Educational Institutions Ltd.<br/>
		Plot No. 4, Block C<br/>
		Community Centre, Pankha Road<br/>
		Janak Puri, New Delhi-110058<br/>
		Contact Number: 011-45646322, 8588868474<br/>
		E-mail: info@onlinenifm.com<br/>
		Website: www.nifm.in, www.onlinenifm.com		
     
      </td>
  </tr>
</table>

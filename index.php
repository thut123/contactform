<html>
<head>
<title>Contact Us Form</title>
<link rel="stylesheet" type="text/css"
	href="assets/css/contact-form-style.css" />
<link rel="stylesheet" type="text/css"
	href="assets/css/phppot-style.css" />
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
	<div class="phppot-container">
		<h1>PHP contact form with captcha images</h1>
		<form name="frmContact" id="captcha-cnt-frm" class="phppot-form"
			frmContact"" method="post" action="" enctype="multipart/form-data"
			onsubmit="return validateContactForm()">

			<div class="phppot-row">
				<div class="label">
					Name <span id="userName-info" class="validation-message"></span>
				</div>
				<input type="text" class="phppot-input" name="userName"
					id="userName"
					value="<?php if(!empty($_POST['userName'])&& $type == 'error'){ echo $_POST['userName'];}?>" />
			</div>
			<div class="phppot-row">
				<div class="label">
					Email <span id="userEmail-info" class="validation-message"></span>
				</div>
				<input type="text" class="phppot-input" name="userEmail"
					id="userEmail"
					value="<?php if(!empty($_POST['userEmail'])&& $type == 'error'){ echo $_POST['userEmail'];}?>" />
			</div>
			<div class="phppot-row">
				<div class="label">
					Subject <span id="subject-info" class="validation-message"></span>
				</div>
				<input type="text" class="phppot-input" name="subject" id="subject"
					value="<?php if(!empty($_POST['subject'])&& $type == 'error'){ echo $_POST['subject'];}?>" />
			</div>
			<div class="phppot-row">
				<div class="label">
					Message <span id="userMessage-info" class="validation-message"></span>
				</div>
				<textarea name="content" id="content" class="phppot-input" cols="60"
					rows="6"><?php if(!empty($_POST['content'])&& $type == 'error'){ echo $_POST['content'];}?></textarea>
			</div>
						<?php
    if (! empty($result)) {
        ?>
			<div class="phppot-row">
				<div
					class="captcha-container <?php if(!empty($border)){ echo $border;} ?>">
					<p>
						Select the <span class="text-color"><?php echo  $result[0]['name'];?> </span><span
							id="captcha-info" class="validation-message"></span>
					</p>
					<input type="hidden" name="captcha_code"
						value="<?php echo $result[0]['name'];?>">
		<?php
        shuffle($captchaOutput);
        if (! empty($captchaOutput)) {
            foreach ($captchaOutput as $value) {
                ?>          
        <div class="svg-padding">
						<div class="svg"><?php echo $value['captcha_icon'];?>
                <input type="hidden" class="icons"
								value="<?php echo $value['name'];?>">
						</div>
					</div>
  <?php }}?>
				</div>
			</div>
			
			<?php  }?>
			<div class="phppot-row">
				<input type="submit" name="send" class="send-button" value="Send" />
			</div>
			<input type="hidden" name="captcha_chosen" id="captcha-chosen" value="">
		</form>
		<?php if(!empty($message)) { ?>
		<div id="phppot-message" class="<?php  echo $type; ?>"><?php if(isset($message)){ ?>
				    <?php echo $message; }}?>
                        
                    </div>
	</div>

	<script src="assets/js/captcha.js"></script>

</body>
</html>

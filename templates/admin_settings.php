<div class="wrap" id="center-panel">

	<div class="icon32" id="icon-edit-pages"><br></div>

	<h2>
		<?php _e('MT4 Server settings')?>
	</h2>



	<form id="" action="options-general.php?page=MT4_form" name="add_match" method="POST" enctype="multipart/form-data">



		<div class="form-table">

			<div class="adminedit">

				<div class="width20">

					<div class="entrywidth">

						<label for="send_from"><?php _e('Email from address')?>:</label>

						<input value="<?php echo $this->data['send_from']?>" type="text" id="send_from" name="formdata[send_from]" class="regular-text" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="from_header"><?php _e('Email from header')?>:</label>

						<input value="<?php echo $this->data['from_header']?>" type="text" id="from_header" name="formdata[from_header]" class="regular-text" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="mail_title"><?php _e('Email subject title')?>:</label>

						<input value="<?php echo $this->data['mail_title']?>" type="text" id="mail_title" name="formdata[mail_title]" class="regular-text" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="server"><?php _e('MT4 Server')?>:</label>

						<input value="<?php echo $this->data['server']?>" type="text" id="server" name="formdata[server]" class="required regular-text" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="enable"><?php _e('Enable account')?>:(0 - disable, 1 - enable)</label>

						<input value="<?php echo $this->data['enable']?>" type="text" id="enable" name="formdata[enable]" class="required regular-text" />

					</div>

				</div>

			</div>

			<div class="adminedit">

				<div class="width20">

					<div class="entrywidth">

						<label for="login"><?php _e('MT4 login')?>:</label>

						<input value="<?php echo $this->data['login']?>" type="text" id="login" name="formdata[login]" class="required regular-text" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="password"><?php _e('MT4 password')?>:</label>

						<input value="<?php echo $this->data['password']?>" type="password" id="password" name="formdata[password]" class="required regular-text" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="leverage"><?php _e('New account leverage')?>:</label>

						<select id="the-leverage" name="formdata[leverage]" class="required">

				<?php include '__leverage.php' ?>

				</select>

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="group"><?php _e('MT4 Groups example: NameOfGroup|USD,NameOfGroup2|EUR')?>:</label>

						<input value="<?php echo $this->data['group']?>" type="text" id="group" name="formdata[group]" class="required regular-text" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="balance"><?php _e('Default balance')?>:</label>

						<input value="<?php echo $this->data['balance']?>" type="text" id="balance" name="formdata[balance]" class="required regular-text" />

					</div>

				</div>

			</div>

			<div class="emailrowmt4">

				<label for="mailmessage"><?php _e('Email Message')?>:</label>

				<?php wp_editor( $this->data['mailmessage'], 'mailmessage', $settings = array('textarea_name' => 'formdata[mailmessage]',) ); ?>

			</div>

			<div class="adminedit dynamicform">

				<div class="width20">

					<div class="entrywidth">

						<label for="formbackground"><?php _e('Form background')?>:</label><br>

						<input value="<?php echo $this->data['formbackground']?>" type="text" id="formbackground" name="formdata[formbackground]" class="color-field" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="titlebackground"><?php _e('Title background')?>:</label><br>

						<input value="<?php echo $this->data['titlebackground']?>" type="text" id="titlebackground" name="formdata[titlebackground]" class="color-field" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="buttonbackground"><?php _e('Button "Sign In" background')?>:</label><br>

						<input value="<?php echo $this->data['buttonbackground']?>" type="text" id="buttonbackground" name="formdata[buttonbackground]" class="color-field" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="buttontextcolor"><?php _e('Button "Sign In" text color')?>:</label><br>

						<input value="<?php echo $this->data['buttontextcolor']?>" type="text" id="buttontextcolor" name="formdata[buttontextcolor]" class="color-field" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="buttonborder"><?php _e('Button "Sign In" border color')?>:</label><br>

						<input value="<?php echo $this->data['buttonborder']?>" type="text" id="buttonborder" name="formdata[buttonborder]" class="color-field" />

					</div>

				</div>

			</div>

			<div class="adminedit dynamicform">

				<div class="width20">

					<div class="entrywidth">

						<label for="inputbackground"><?php _e('Input boxes background')?>:</label><br>

						<input value="<?php echo $this->data['inputbackground']?>" type="text" id="inputbackground" name="formdata[inputbackground]" class="color-field" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="inputborder"><?php _e('Input boxes border color')?>:</label><br>

						<input value="<?php echo $this->data['inputborder']?>" type="text" id="inputborder" name="formdata[inputborder]" class="color-field" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="inputcolor"><?php _e('Input boxes text color')?>:</label><br>

						<input value="<?php echo $this->data['inputcolor']?>" type="text" id="inputcolor" name="formdata[inputcolor]" class="color-field" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="inputfocus"><?php _e('Input border focus text color')?>:</label><br>

						<input value="<?php echo $this->data['inputfocus']?>" type="text" id="inputfocus" name="formdata[inputfocus]" class="color-field" />

					</div>

				</div>

				<div class="width20">

					<div class="entrywidth">

						<label for="titleborder"><?php _e('Title border color')?>:</label><br>

						<input value="<?php echo $this->data['titleborder']?>" type="text" id="titleborder" name="formdata[titleborder]" class="color-field" />

					</div>

				</div>

			</div>



		</div>

		<div>

			<?php include_once('view_site_form_settings.php') ?>

		</div>

		<p class="submit">

			<input type="submit" class="button-primary" name="send" value="<?php _e('Save') ?>" />

		</p>



	</form>

</div>
<!-- /#center-panel -->
<?php
/**
 * Add dummy token
 */
?>

<div class="side-body">                           
	<h3><?php eT("Create dummy tokens"); ?></h3>        
                                                  
	<div class="row">                             
		<div class="col-lg-12 content-right">     
            <?php echo CHtml::form(array("admin/tokens/sa/adddummies/surveyid/{$surveyid}/subaction/add"), 'post', array('id'=>'edittoken', 'name'=>'edittoken', 'class'=>'form30 form-horizontal')); ?>
            
                <!-- ID  -->
                <div class="form-group">
                    <label  class="col-sm-2 control-label">ID:</label>
                    <div class="col-sm-2">
                        <p class="form-control-static"><?php eT("Auto"); ?></p>
                    </div>
                </div>
                
                <!-- Number of tokens  -->
                <div class="form-group">
                    <label  class="col-sm-2 control-label" for='amount'><?php eT("Number of tokens"); ?>:</label>
                    <div class="col-sm-2">
                        <input class='form-control' type='text' size='20' id='amount' name='amount' value="100" />
                    </div>
                </div>
                
                <!-- Token length  -->
                <div class="form-group">
                    <label  class="col-sm-2 control-label" for='tokenlen'><?php eT("Token length"); ?>:</label>
                    <div class="col-sm-2">
                        <input class='form-control' type='text' size='20' id='tokenlen' name='tokenlen' value="<?php echo $tokenlength; ?>" />
                    </div>
                </div>
                
                <!-- First name  -->
                <div class="form-group">
                    <label  class="col-sm-2 control-label" for='firstname'><?php eT("First name"); ?>:</label>
                    <div class="col-sm-2">
                        <input class='form-control' type='text' size='30' id='firstname' name='firstname' value="" />
                    </div>
                </div>
                
                <!-- Last name  -->
                <div class="form-group">
                    <label  class="col-sm-2 control-label" for='lastname'><?php eT("Last name"); ?>:</label>
                    <div class="col-sm-2">
                        <input class='form-control' type='text' size='30'  id='lastname' name='lastname' value="" />
                    </div>
                </div>
                
                <!-- Email  -->
                <div class="form-group">
                    <label  class="col-sm-2 control-label" for='email'><?php eT("Email"); ?>:</label>
                    <div class="col-sm-2">
                        <input class='form-control' type='email' maxlength='320' size='50' id='email' name='email' value="" />
                    </div>
                </div>
                
                <!-- Language  -->
                <div class="form-group">
                    <label  class="col-sm-2 control-label" for='language'><?php eT("Language"); ?>:</label>
                    <div class="col-sm-2">
                        <?php echo languageDropdownClean($surveyid, Survey::model()->findByPk($surveyid)->language); ?>
                    </div>
                </div>
                
                <!-- Uses left  -->
                <div class="form-group">
                    <label  class="col-sm-2 control-label" for='usesleft'><?php eT("Uses left:"); ?></label>
                    <div class="col-sm-2">
                        <input class='form-control' type='text' size='20' id='usesleft' name='usesleft' value="1" />
                    </div>
                </div>
                
                <!--  Validity -->
                <div class="form-group">
                    <label  class="col-sm-2 control-label" for='validfrom'><?php eT("Valid from"); ?>:</label>
                    <div class="col-sm-3 has-feedback">
                        <i class='fa fa-calendar form-control-feedback'></i>
                        <?php Yii::app()->getController()->widget('yiiwheels.widgets.datetimepicker.WhDateTimePicker', array(
                                'name' => "validfrom",
                                'value' => isset($validfrom) ? $validfrom : '',
                                'pluginOptions' => array(
                                    'format' => $dateformatdetails['jsdate'] . " HH:mm",
                                    'singleDatePicker' => true,
                                    'startDate' => date("Y-m-d", time()),
                                    'drops' => 'up',  // TODO: Does not work. Why?
                                    'timePicker' => true,
                                    'timePicker12Hour' => false,  // NB: timePicker24Hour = true does not work
                                    'timePickerIncrement' => 1
                                )
                            ));
                        ?>
                        <span class="help-block"><?php printf(gT('Format: %s'), $dateformatdetails['jsdate'] . ' ' . gT('hh:mm')); ?></span>
                    </div>        
                    
                    <label  class="col-sm-2 control-label" for='validuntil'><?php eT('Until:'); ?></label>
                    <div class="col-sm-3 has-feedback">
                        <i class='fa fa-calendar form-control-feedback'></i>
                        <?php Yii::app()->getController()->widget('yiiwheels.widgets.datetimepicker.WhDateTimePicker', array(
                                'name' => "validuntil",
                                'value' => isset($validuntil) ? $validuntil : '',
                                'pluginOptions' => array(
                                    'format' => $dateformatdetails['jsdate'] . " HH:mm",
                                    'singleDatePicker' => true,
                                    'startDate' => date("Y-m-d", time()),
                                    'drops' => 'up',
                                    'timePicker' => true,
                                    'timePicker12Hour' => false,
                                    'timePickerIncrement' => 1
                                )
                            ));
                        ?>
                        <span class="help-block"><?php printf(gT('Format: %s'), $dateformatdetails['jsdate'] . ' ' . gT('hh:mm')); ?></span>
                    </div>
                </div>
                
                <!-- Attribute fields  -->
                <?php foreach ($aAttributeFields as $attr_name => $attr_description): ?>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label" for='<?php echo $attr_name; ?>'><?php echo $attr_description['description'] . ($attr_description['mandatory'] == 'Y' ? '*' : '') ?>:</label>
                        <div class="col-sm-2">
                            <input class='form-control' type='text' size='55' id='<?php echo $attr_name; ?>' name='<?php echo $attr_name; ?>' value='<?php if (isset($$attr_name)){echo htmlspecialchars($$attr_name, ENT_QUOTES, 'UTF-8');}?>' />
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <!-- Buttons  -->
                <p>
                    <input type='submit' class="hidden" value='<?php eT("Add dummy tokens"); ?>' />
                    <input type='hidden' name='sid' value='$surveyid' />
                </p>
            </form>
		</div>
	</div>
</div>

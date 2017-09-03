<?php
function AjaxSubmit($modelname,$IsAjaxRequest)
{
	
    $AjaxRedirectTo="location.href='".base_url("$modelname")."';";
	
    if($IsAjaxRequest==true)
    {
    	$AjaxRedirectTo="var table = $('#tb$modelname').DataTable();
    	table.ajax.reload();";
    }
    
	$result="<script>
    $(document).ready(function (e) {
       
        var frm = $('#frm$modelname');
        frm.on('submit', (function (e) {
            e.preventDefault();
              
            $.ajax({
                url: frm.attr('action'),
                type: frm.attr('method'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) { 
                   var data = jQuery.parseJSON(result);
                   
                    if (data.status==true) {
                        
                        $.sticky('<br/> Action Successfully Executed', {stickyClass: 'success'});
                        try {
                        	$AjaxRedirectTo
                        } catch (e) {
                        } 
                        $('.ui-dialog-titlebar-close').click();
                        $('#sloader').hide();
                    } else if (data.status==false) {
                        $.sticky('<br/> <b>Validation Faild. </b><br/> ' + data.errors + '', {stickyClass: 'error'});
                        $('#sloader').hide();
                    }
                },
                error: function (data) {
                    $.sticky('<br/> ! Something is went wrong. <br/> <b>Error:<b> ', {stickyClass: 'error'});
                    $('#sloader').hide();
                }
            });
        }
        ));
    });
</script>";
	echo $result;
}

function Ajaxdropdown($name = '', $options = array(), $selected = array(), $extra = '')
{
	if ( ! is_array($selected))
	{
		$selected = array($selected);
	}

	// If no selected state was submitted we will attempt to set it automatically
	if (count($selected) === 0)
	{
		// If the form name appears in the $_POST array we have a winner!
		if (isset($_POST[$name]))
		{
			$selected = array($_POST[$name]);
		}
	}

	if ($extra != '') $extra = ' '.$extra;

	$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

	$form = '<select style="width:300px;" id="'.$name.'" name="'.$name.'"'.$extra.$multiple.">\n";

	foreach ($options as $key => $val)
	{
		$key = (string) $key;

		if (is_array($val) && ! empty($val))
		{ 
			foreach ($val as $optgroup_key => $optgroup_val)
			{
				$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';

				$form .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
			} 
		}
		else
		{
			$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';

			$form .= '<option value=""'.$sel.'>'.(string) $val."</option>\n";
		}
	}

	$form .= '</select>';
	
	$form .='<script type="text/javascript"> $(function () { $(\'#'.$name.'\').searchableOptionList({ maxHeight: \'250px\' }); }); </script>';

	return $form;
}
function AjaxButton($url,$name,$cssClass,$uniqueName)
{
	$result='<a class="'.$cssClass.'" data-ajax="true"
								data-ajax-begin="prepareModalDialog(\''.$uniqueName.'\')"
								data-ajax-failure="clearModalDialog(\''.$uniqueName.'\');alert(\'Ajax call failed\')"
								data-ajax-method="GET" data-ajax-mode="replace"
								data-ajax-success="openModalDialog(\''.$uniqueName.'\', \'\')"
								data-ajax-update="#'.$uniqueName.'"
								href="'.base_url($url).'">'.$name.' </a>';
	
	echo $result;
}

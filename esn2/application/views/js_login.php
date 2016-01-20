<?php  $this->load->view("import_jui"); ?>

<script type="text/javascript" >
    
 function submitForm()
 {
$('#fr_login').form('submit', {
    url:'<?=base_url()?>index.php/welcome/checklogin',
    contentType: 'application/json; charset=utf-8',
    dataType: 'json',
    onSubmit: function(data){
      //alert('t');
      //  $.messager.alert('Info', 'check submit' , 'info');
    },
    success:function(data)
    {
        $.messager.alert('Info',data,'info');   
    }
});

 }
 
 
 
 function clearForm()
 {
     
     $("#fr_login").form('clear');
 }


</script>
  
<div id="dia_login" class="easyui-window" title="<?=$login_title?>" 
         data-options="iconCls:'icon-lock',resizable:false,modal:true,region:'north',split:true,collapsible:false,minimizable:false,maximizable:false,closable:false,shadow:true" style="width:500px;height:300px;padding:10px;">
       
        <form id="fr_login" action="<?=base_url()?>index.php/welcome/checklogin" method="post" enctype="multipart/form-data" >
            <table cellpadding="2">
                
                <!--
                <tr>
                    <td>Username :</td>
                    <td>
                        
                       <input class="easyui-textbox" style="width:300px;height:50px" type="text" name="us" id="us" 
                              data-options="required:true,iconCls:'icon-man',iconAlign:'left'"></input> 
                        
                       
                          
                        
                        
                    </td>
                </tr>
                -->
                
                
                <tr>
                    <td>Username :</td>
                    <td>
                     
                        
                      <input class="easyui-combobox" data-options="
		contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                valueField: 'UserCode',
		textField: 'UserName',
                url: '<?=base_url()?>index.php/welcome/tbuser/',
                
                "
	  id="us" name="us" style="width:300px;height:50px" /> 
                          
                        
                     
                   <!--
                    <input class="easyui-textbox" style="width:300px;height:50px"  type="text" id="user" name="user"    data-options="iconCls:'icon-man',iconAlign:'left'  "></input>  
                   -->
                    
                    
                    </td>
                </tr>
                
                
                
                <tr>
                    <td>Password :</td>
                    <td><input class="easyui-textbox" style="width:300px;height:50px"  type="password" id="ps" name="ps"    data-options="buttonText:'Password',iconCls:'icon-lock',iconAlign:'left'  "></input></td>
                </tr>
              
               
               
               
               <tr>
                    <td></td>
                <td>
                 <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()" style="width:100px;height:50px" data-options="iconCls:'icon-save'">Submit</a>
                
                
                 <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:100px;height:50px" data-options="iconCls:'icon-reload'">Clear</a>
                </td>
               
                </tr>
              
               
                
            </table>
        </form>
        
        
    </div>




<!--    
<div style="margin:20px 0;margin-top: 100px;margin-left: 500px;">
    <div class="easyui-panel" title="<?=$login_title?>" style="width:500px;height: 300px;padding:10px; ">
        <form id="ff" action="<?=base_url()?>index.php/welcome/checklogin" method="post" enctype="multipart/form-data">
            <table>
                

                
                
     
                
                <tr>
                    <td>Username :</td>
                    <td>
                        
                      <input class="easyui-combobox" data-options="
		
                valueField: 'UserName',
		textField: 'UserName',
                url: '<?=base_url()?>index.php/welcome/tbuser/',
                "
	  id="us" name="us" style="width:300px;height:50px" /> 
                          
                        
                        
                    </td>
                </tr>
                

                <tr>
                    <td>Password :</td>
                    <td><input class="easyui-textbox" style="width:300px;height:50px"  type="password" id="ps" name="ps"  required="required"  data-options="buttonText:'Password',iconCls:'icon-lock',iconAlign:'left'  "></input></td>
                </tr>
                
                
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Submit" ></input>
                        <input type="reset" value="Reset" ></input>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
</div>
-->

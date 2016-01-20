    <!DOCTYPE html>
    <html>
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?=$title?></title>
        
       
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>jquery-easyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>jquery-easyui/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>jquery-easyui/demo/demo.css">
        <script type="text/javascript" src="<?=base_url()?>jquery-easyui/jquery.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>jquery-easyui/jquery.easyui.min.js"></script>
    
        <!--  js for search HN -->
        <script type="text/javascript">
             $(function()
             {
                //alert("t"); 
                 $("#HN_main").combogrid({
                     panelWidth:500,
                     url: '<?=base_url()?>index.php/welcome/callHN',
                     idField:'HN',
                     textField:'HN',
                     mode:'remote',
                     fitColumns:true,
                     columns:[[
			{field:'HN',title:'HN',width:60},
			{field:'Name',title:'ชื่อ',width:60},
                                                {field:'Surname',title:'นามสกุล',width:60},
		   ]]
                 });
             });
        </script>
        <!--  js for search HN -->

    </head>
    <body>

       
  <div style="margin:10px 0;"></div>
  <div class="easyui-panel" title="<?=$title?>" style="width:1100px;padding:30px 70px 50px 70px">
            

            
   <!-- Begin Frame--->             
  <div style="padding:20px;background:#fafafa;width:1000px;border:1px solid #ccc">
        
    
      
      <a href="#" class="easyui-linkbutton" iconCls="icon-search">Search</a>    
      <a href="#" class="easyui-linkbutton" iconCls="icon-cancel">Cancel</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-reload">Refresh</a>  
      <!--<a href="#" class="easyui-linkbutton">text button</a>-->
      <a href="#" class="easyui-linkbutton" iconCls="icon-print">Print</a>
    
    
    
  
   
  
    <!--
     <select class="easyui-combogrid" style="width:250px" data-options="
            panelWidth: 500,
            idField: 'itemid',
            textField: 'productname',
            url: '<?=base_url()?>index.php/welcome/callHN',
            method: 'post',
            columns: [[
                  {field:'HN',title:'HN',align:'right',width:10},
                  {field:'Name',title:'Name',align:'right',width:10},
                  {field:'Surname',title:'Surname',align:'right',width:10},
            ]],
            fitColumns: true
        ">
    </select>
    -->
    

  
	
	<div style="margin:10px 0;"></div>
	<div class="easyui-tabs" style="width:400px;height:100px">
		<div title="Epilepsy Clinic Patient Profle Database" style="padding:10px">
			
                          HN : <?php echo nbs(2); ?> <input id="HN_main" style="width:150px">


		</div>
            
                <!--
		<div title="My Documents" style="padding:10px">
			<ul class="easyui-tree" data-options="url:'tree_data1.json',method:'get',animate:true"></ul>
This is the help content1  
		</div>
                -->
                
                <!--
		<div title="Help" data-options="iconCls:'icon-help',closable:true" style="padding:10px">
			This is the help content2
		</div>
                -->
                
	</div>




    <!-- Begin  From 1    -->
        <div style="margin:40px 0 10px 0;"></div>
    <div class="easyui-tabs" style="width:900px;height:250px">
        
           <div title="Appendix 1" style="padding:10px">
            <p style="font-size:14px">jQuery EasyUI framework helps you build your web pages easily.</p>
            <ul>
                <li>easyui is a collection of user-interface plugin based on jQuery.</li>
                <li>easyui provides essential functionality for building modem, interactive, javascript applications.</li>
                <li>using easyui you don't need to write many javascript code, you usually defines user-interface by writing some HTML markup.</li>
                <li>complete framework for HTML5 web page.</li>
                <li>easyui save your time and scales while developing your products.</li>
                <li>easyui is very easy but powerful.</li>
            </ul>
        </div>
        
        
        <div title="Epilepsy Clinic" style="padding:10px">
            <p style="font-size:14px">jQuery EasyUI framework helps you build your web pages easily.</p>
            <ul>
                <li>easyui is a collection of user-interface plugin based on jQuery.</li>
                <li>easyui provides essential functionality for building modem, interactive, javascript applications.</li>
                <li>using easyui you don't need to write many javascript code, you usually defines user-interface by writing some HTML markup.</li>
                <li>complete framework for HTML5 web page.</li>
                <li>easyui save your time and scales while developing your products.</li>
                <li>easyui is very easy but powerful.</li>
            </ul>
        </div>
        <div title="EEG" style="padding:10px">
            <ul class="easyui-tree" data-options="url:'',method:'get',animate:true">
                 <li>easyui is very easy but powerful.</li>
            </ul>
        </div>
        <div title="Imaging" data-options="iconCls:'icon-help',closable:false" style="padding:10px">
            This is the help content.
        </div>
        <div title="General" style="padding:10px">
              This is the help content.
            <ul class="easyui-tree" data-options="url:'',method:'get',animate:true">
                <li>easyui is very easy but powerful.</li>
            </ul>
        </div>
        
        <div title="Blood" style="padding:10px">
            <ul class="easyui-tree" data-options="url:'',method:'get',animate:true">
                <li>easyui is very easy but powerful.</li>
            </ul>
        </div>
        
        <div title="Chem.1" style="padding:10px">
             This is the help content.
            <ul class="easyui-tree" data-options="url:'',method:'get',animate:true">
                <li>easyui is very easy but powerful.</li>
            </ul>
        </div>
        
        <div title="Chem.2" style="padding:10px">
             This is the help content.
            <ul class="easyui-tree" data-options="url:'',method:'get',animate:true"></ul>
        </div>
        
        <div title="Drug level" style="padding:10px">
             This is the help content.
            <ul class="easyui-tree" data-options="url:'',method:'get',animate:true"></ul>
        </div>
        
        
    </div>
     <!-- End  From 1    -->
    
    
      <!-- Begin Form2  --> 
    <div style="margin:20px 0 10px 0;"></div>
    <div class="easyui-tabs" style="width:900px;height:250px">
        
     
        
        <div title="Non Compliance" style="padding:10px">
            <p style="font-size:14px">jQuery EasyUI framework helps you build your web pages easily.</p>
            <ul>
                <li>easyui is a collection of user-interface plugin based on jQuery.</li>
                <li>easyui provides essential functionality for building modem, interactive, javascript applications.</li>
                <li>using easyui you don't need to write many javascript code, you usually defines user-interface by writing some HTML markup.</li>
                <li>complete framework for HTML5 web page.</li>
                <li>easyui save your time and scales while developing your products.</li>
                <li>easyui is very easy but powerful.</li>
            </ul>
        </div>
        <div title="ARDs" style="padding:10px">
            <ul class="easyui-tree" data-options="url:'',method:'get',animate:true">
                 <li>easyui is very easy but powerful.</li>
            </ul>
        </div>
        <div title="Medication error" data-options="iconCls:'icon-help',closable:false" style="padding:10px">
            This is the help content.
        </div>
        <div title="Other DRPs" style="padding:10px">
              This is the help content.
            <ul class="easyui-tree" data-options="url:'',method:'get',animate:true">
                <li>easyui is very easy but powerful.</li>
            </ul>
        </div>
        
        <div title="Progress Note" style="padding:10px">
            <ul class="easyui-tree" data-options="url:'',method:'get',animate:true">
                <li>easyui is very easy but powerful.</li>
            </ul>
        </div>
        
        <div title="Give Information" style="padding:10px">
             This is the help content.
            <ul class="easyui-tree" data-options="url:'',method:'get',animate:true">
                <li>easyui is very easy but powerful.</li>
            </ul>
        </div>
        
        <div title="Epilepsy History" style="padding:10px">
             This is the help content.
            <ul class="easyui-tree" data-options="url:'',method:'get',animate:true"></ul>
        </div>
        
      
        
    </div>
     <!--  End Form2  -->

     

</div>
  <!-- End Frame--->            

            
            
  
                

              
                
                
            
            
              
              

    
    
        
   
    
       
    
    
    
        
 </div>
     
      
    
    </body>
    </html>

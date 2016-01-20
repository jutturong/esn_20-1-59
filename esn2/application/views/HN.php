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
                        { field:'MonitoringDate',title:'MonitoringDate',width:60  },
                        {field:'HN',title:'HN',width:60},
			{field:'Name',title:'ชื่อ',width:60},
                        {field:'Surname',title:'นามสกุล',width:60},
		   ]]
                 });
                 
                   $("#HN_main").combogrid({
                       onSelect:function(index,row)
                       {                      
                           var  txtAge = $("#BirthDate").textbox('getText');
                           var  sptAge = txtAge.split("/");
                           var  intAge = parseInt(sptAge[2]-543);
                           var  d=new Date();
                           var  n=d.getFullYear();
                           var  yearCur = n - intAge;
      
                           //alert(yearCur);
                                 
                             $("#Name").textbox(
                                     {  
                                         value : row.Name,
                                          iconCls:"icon-man",
                                           iconAlign:"right",
                                           readonly:"true",
                                     })
                             $("#Surname").textbox(
                                     {  
                                         value : row.Surname,
                                         iconCls:"icon-man",
                                          iconAlign:"right",
                                           readonly:"true",
                                     })                           
                              $("#BirthDate").textbox(
                                      {  
                                          value : row.BirthDate,
                                          iconCls:"icon-man",
                                            iconAlign:"right",
                                             readonly:"true",
                                     })
                             $("#age_main").textbox(
                                     {
                                           value : yearCur ,
                                           iconCls:"icon-man",
                                           iconAlign:"right",
                                           readonly:"true",
                                     })
                             
        //  #-- ข้อมูลสำหรับเพิ่มใน appendix 1         
                              $("#HN_app1").textbox(  //HN สำหรับ appendix 1 (appendix/fr_appendix1.php)
                                      {
                                          value : row.HN,
                                          
                                      })
                              $("#name_app1").textbox(
                                      {
                                          value : row.Name, 
                                      })    
                              $("#surname_app1").textbox({
                                     value:row.Surname
                              }) 
                              $("#age_app1").textbox({
                                     value:yearCur,
                              })
                              $("#interview_name").textbox({
                                    value:'<?=$sess_username?>',
                                    readonly:'true'
                              })
                              $("#interview_lastname").textbox({
                                   value:'<?=$sess_lastname?>',
                                   readonly:'true'
                              })
        //#-- epilepsy clinic ---                         
                              $('#HN_epilepsy').textbox({
                                  value:row.HN,
                                  readonly:'true',
                              }) 
        //#---- EEG ----
                              $('#HN_EEG').textbox({ 
                                  value:row.HN,
                                  readonly:'true',
                              })
       //#------ Image ---
                                $('#HN_img').textbox({ 
                                                           value:row.HN,
                                                           readonly:'true',
                                                       })
       //#-----general---
                              $('#HN_gen').textbox({
                                                           value:row.HN,
                                                           readonly:'true',
                                                      
                              })
       //#---- blood-------
                              $('#HN_blood').textbox({
                                                           value:row.HN,
                                                           readonly:'true',
                                                      
                              }) 
        //#---- chem1-------                      
                              $('#HN_chem1').textbox({
                                                           value:row.HN,
                                                           readonly:'true',
                                                      
                              })
       //#---- chem2-------                      
                              $('#HN_chem2').textbox({
                                                           value:row.HN,
                                                           readonly:'true',
                                                      
                              })
        //#----- drug level ---- 
                              $('#HN_tdm').textbox({
                                                           value:row.HN,
                                                           readonly:'true',
                                                      
                              })
       //#-------- Non Compliance ----
                             $('#HN_non').textbox({
                                                           value:row.HN,
                                                           readonly:'true',
                                                      
                              })
       //#-------- ADRs --------------
                             $('#HN_adr').textbox({
                                                           value:row.HN,
                                                           readonly:'true',
                                                      
                              })   
        //#-------- Medication --------------
                             $('#HN_medi').textbox({
                                                           value:row.HN,
                                                           readonly:'true',
                                                      
                              }) 
         //#-------- Other DRPs --------------
                             $('#HN_drp').textbox({
                                                           value:row.HN,
                                                           readonly:'true',
                                                      
                              }) 
         //#-------- Progress Note --------------
                             $('#HN_pro').textbox({
                                                           value:row.HN,
                                                           readonly:'true',
                                                      
                              })                      
       //#-------- Progress Note --------------
                             $('#HN_give').textbox({
                                                           value:row.HN,
                                                           readonly:'true',
                                                      
                              }) 
                              
       //--------------------- Epilepsy Clinic ------------------------------
       //http://drugstore.kku.ac.th/esn2/index.php/epilepsy/fetch_epi     
              $('#dg').datagrid({
                   url:'<?=base_url()?>index.php/epilepsy/fetch_epi/'   + $("#HN_main").textbox('getText'),
                                columns:[[
                                            {   field:'MonitoringDate',title:'MonitoringDate' } ,
                                            {     field:'HN',title:'HN' },
                                            {      field:'Lab',title:'Lab' },
                                            {      field:'Value',title:'Value' },
                   ]]
              })                                  
                   
                              
        
        // #-- data grid appendix 1 
                               $('#dg_app1').datagrid({
                                   url:'<?=base_url()?>index.php/appendix/HN_appendix1/'+ $("#HN_main").textbox('getText'),
                                   iconCls:"icon-save",
                                   pagination:"true",
                                   idField:"id_appendix1",
                                   fitColumns:"true",
                                   toolbar:[
                                           {  iconCls:'icon-add',handler:function()
                                              {  
                                              $('#win_app1').window('open'); 
                                              } 
                                           },
                                           { 
                                               iconCls:'icon-edit',handler:function()
                                               { 
                                                   //alert(  );
                                                   $.messager.alert('Info','','info');
                                               }                                               
                                           }
                                           /*
                                           {
                                               iconCls:'icon-remove',handler:function()  
                                               {
                                                   
                                               }    
                                           }
                                           */
                                           ],
                                   columns:[[
                                 
                                    {
                                       field:'id_appendix1',title:'ID'
                                           
                                       
                                       	
                                         // checkbox:true
                                    },
                                    { field:'interview_date',title:' วัน-เดือน-ปี ที่สัมภาษณ์ ' }
                                    ,
                                    {                                         
                                          field:'HN',title:'HN'
                                    },
                                    {
                                          field:'name',title:'ชื่อ'    
                                    },
                                    {
                                          field:'surname',title:'นามสกุล' 
                                    }
                                  
                                              ]]
                                                 }) 
            //#---- EEG -------                                     
                $('#tb_EEG').datagrid({
                    url:'<?=base_url()?>index.php/eeg/callEEG_HN/' +  $("#HN_main").textbox('getText'),
                    columns:[[
                       { field:'MonitoringDate',title:'MonitoringDate' },
                       {  field:'HN',title:'HN'  },
                       {  field:'Value',title:'Value'  },
                       {  field:'Lab',title:'Lab'  },
                       
                    ]]
                });                                 
                                                 
           //#--- Imaging ----
           //img/callIMG_HN/HU3128
           $('#tb_IMG').datagrid({
                    url:'<?=base_url()?>index.php/img/callIMG_HN/' +  $("#HN_main").textbox('getText'),
                    columns:[[
                       { field:'MonitoringDate',title:'Date' },
                       {  field:'HN',title:'HN'  },
                       {  field:'Lab',title:'Lab'  },
                       {  field:'Value',title:'Imaging Result'  },
                                            
                    ]]
                });
                
            //#-- general ---
          //http://localhost/ci/index.php/general/callGEN_HN/ES0597       
           $('#dg_general').datagrid({
                    url:'<?=base_url()?>index.php/general/callGEN_HN/' +  $("#HN_main").textbox('getText'),
                    columns:[[
                       { field:'MonitoringDate',title:'Date' },
                       {  field:'HN',title:'HN'  },
                       {  field:'Lab',title:'Lab'  },
                       {  field:'Value',title:'Value'  },
                                            
                    ]]
                }); 
          //#-- Blood ---      
         //http://localhost/ci/index.php/blood/loadBlood/     
          $('#dg_blood').datagrid({
                    url:'<?=base_url()?>index.php/blood/callBlood_HN/' +  $("#HN_main").textbox('getText'),
                    columns:[[
                       { field:'MonitoringDate',title:'Date' },
                       {  field:'HN',title:'HN'  },
                       {  field:'Lab',title:'Lab'  },
                       {  field:'Value',title:'Value'  },
                                            
                    ]]
                }); 
         //#-- Chem1 ---  
         //http://localhost/ci/index.php/chem/loadChem1/
         $('#dg_chem1').datagrid({
                    url:'<?=base_url()?>index.php/chem/callChem1_HN/' +  $("#HN_main").textbox('getText'),
                    columns:[[
                       { field:'MonitoringDate',title:'Date' },
                       {  field:'HN',title:'HN'  },
                       {  field:'Lab',title:'Lab'  },
                       {  field:'Value',title:'Value'  },
                                            
                    ]]
                }); 
                
         //#-- Chem2 ---         
         //http://localhost/ci/index.php/chem/loadChem2/
         $('#dg_chem2').datagrid({
                    url:'<?=base_url()?>index.php/chem/callChem2_HN/' +  $("#HN_main").textbox('getText'),
                    columns:[[
                       { field:'MonitoringDate',title:'Date' },
                       {  field:'HN',title:'HN'  },
                       {  field:'Lab',title:'Lab'  },
                       {  field:'Value',title:'Value'  },
                                            
                    ]]
                }); 
         //#-- Drug level---------       
         //http://localhost/ci/index.php/tdm/callTdm_HN/ES0597
          $('#dg_tdm').datagrid({
                    url:'<?=base_url()?>index.php/tdm/callTdm_HN/' +  $("#HN_main").textbox('getText'),
                    columns:[[
                       
                        { field:'MonitoringDate',title:'MonitoringDate',width:100   },
                        { field:'HN',title:'HN',width:80   },
                        { field:'Lab',title:'Lab',width:50   },
                        { field:'AnalysisDate',title:'AnalysisDate',width:100   },
                        { field:'Ward',title:'Ward',width:100 },
                        { field:'Indication',title:'Indication',width:100 },
                        { field:'Vd',title:'Vd',width:90 },
                        { field:'Cl',title:'Cl',width:90 },
                        { field:'CLUnit',title:'CLUnit',width:90 },
                        { field:'Ke',title:'Ke',width:90 },
                        { field:'KeUnit',title:'KeUnit',width:90 },
                        { field:'T1div2',title:'T1/2',width:90 },
                        { field:'T1div2Unit',title:'T1/2Unit',width:90 },
                        { field:'Assessment',title:'Assessment',width:90 },
                        { field:'Interpretation',title:'Interpretation',width:300 },
                        { field:'NB',title:'NB',width:200 },                      
                        { field:'drug',title:'drug',width:50 },
                        { field:'dmy_interpret',title:'Interpret Date',width:100 },
                        { field:'dmy_followup',title:'Follow Up',width:100  },
                        { field:'week',title:'week',width:50  },
                                            
                    ]]
                });        
                
         //------ end -----------------------------------  
         
        //#---dg_noncomp-----Non copliance----------
         $('#dg_noncomp').datagrid({
                    url:'<?=base_url()?>index.php/noncomp/loadnoncompHN/' + $("#HN_main").textbox('getText'),
                    singleSelect:true,
                    columns:[[
                       
                   { field:'HN',title:'HN' },
                   { field:'MonitoringDate',title:'MonitoringDate'   },
                   { field:'DRPselection1',title:'Non Compliance Type' },
                   { field:'NonComplianceDrug1',title:'Drug/Product' },
                   { field:'NonComplianceDetail1',title:'Detail' },
                   { field:'Action1',title:'Action' },       
                   { field:'Response1',title:'Result' },     
                   { field:'ResponseDetail1',title:'Result detail' },    
                   { field:'Cause1_1',title:'สาเหตุจากตัวผู้ป่วย' },  
                   { field:'Cause1_2',title:'สาเหตุจากโรค' }, 
                   { field:'Cause1_3',title:'สาเหตุจากยา' },  
                   { field:'Cause1_4',title:'สาเหตุจากผู้ดูแล' },  
                   { field:'Cause1_5',title:'สาเหตุอื่นๆ' },  
                   { field:'followup_non',title:'follow up' },                  
                   { field:'week_non',title:'week' }, 
                      
                    ]]
                }); 
        
        //#----------- end --------------------------
        
       //#---dg_noncomp-----Non copliance----------
        $('#dg_adr').datagrid({
                    url:'<?=base_url()?>index.php/adr/loadADRHN/' + $("#HN_main").textbox('getText'),
                    singleSelect:true,
                    columns:[[
                       
                        { field:'HN',title:'HN'   },
                        { field:'MonitoringDate',title:'MonitoringDate'  },
                        { field:'DRPselection2',title:'ADRs' },
                        { field:'DRPDrug2',title:'Drug/Products'},
                        { field:'ADRDetail2',title:'Detail'},
                        { field:'Action2',title:'Action'     },
                        { field:'Response2',title:'Result' },
                        { field:'ResponseDetail2',title:'Result รายละเอียด' },
                        {  field:'followup_adr',title:'Follow up' },
                        {  field:'week_adr',title:'Week' },
                      
                    ]]
                });
        //#----------- end --------------------------
        
        //#--------Medication----------
        $('#dg_medi').datagrid({
                    url:'<?=base_url()?>index.php/medication/loadMediHN/' + $("#HN_main").textbox('getText'),
                    singleSelect:true,
                    columns:[[
                       
            { field:'HN',title:'HN'   },
            { field:'MonitoringDate',title:'MonitoringDate'  },
            { field:'DRPselection4',title:'Medication error' },
            { field:'MedicationErrorDrug4',title:'Drug/Product' },
            { field:'MedicationErrorDetail',title:'Detail' },
            { field:'Action4',title:'Action' },
            { field:'Response4',title:'Result'},
            { field:'ResponseDetail4',title:'Result Detail' },
            { field:'followup',title:'follow up' },
            { field:'week',title:'week' },
                      
                    ]]
                });
        //#----------- end --------------------------
       
        //#--------Other Drps----------
        $('#dg_drp').datagrid({
                    url:'<?=base_url()?>index.php/otherdrp/loadOtherdrpHN/' + $("#HN_main").textbox('getText'),
                    singleSelect:true,
                    columns:[[
                       
            { field:'HN',title:'HN'   },
            { field:'MonitoringDate',title:'MonitoringDate'  },
            { field:'DRPselection3',title:'Other DRPs' },
            { field:'DRPDrug3',title:'Drug/Product' },
            { field:'DRPDetail3',title:'Detail' },
            { field:'Action3',title:'Action' },
            { field:'Response3',title:'Result' },
            { field:'ResponseDetail3',title:'Result Detail' },
            { field:'followup',title:'followup' },
            { field:'week',title:'week' },
                      
                    ]]
                });
        //#----------- end --------------------------
        
        //#-------progress note----------
        $('#dg_progress').datagrid({
                    url:'<?=base_url()?>index.php/progressnote/loadprogressHN/' + $("#HN_main").textbox('getText'),
                    singleSelect:true,
                    columns:[[
                                 { field:'MonitoringDate',title:'MonitoringDate'  },
                                 { field:'HN',title:'HN' },
                                 { field:'From',title:'From' },
                                 { field:'UserName',title:'ชื่อ' },           
                                 { field:'UserSurname',title:'นามสกลุ' },
                                 { field:'Progress',title:'Progress Note' },                                   
                             ]]
                });
        //#----------- end --------------------------
        
        
         //#-------progress note----------
        $('#dg_give').datagrid({
                    url:'<?=base_url()?>index.php/give/loadgiveHN/' + $("#HN_main").textbox('getText'),
                    singleSelect:true,
                    columns:[[
                                { field:'HN',title:'HN' },
                                { field:'MonitoringDate',title:'MonitoringDate'   },
                                {  field:'GiveInformation1',title:'What\'s your disease? ' },
                                {  field:'GiveInformation2',title:'What\'s treatment? '   },
                                {  field:'GiveInformation3',title:'How to manage the side effect? '   },
                                {  field:'GiveInformation4',title:'Bring medication to each visit? '   },
                                {  field:'GiveInformation5',title:'How to correct behavior? '   },
                                {  field:'GiveInformation6',title:'Other '   },                                  
                             ]]
                });
        //#----------- end --------------------------
        
        
        
                        }//end 
                   });
                
   
             });
        </script>
        
        <!-- ใช้เพื่อ delete และ update form -->
        <?=$this->load->view("appendix/js_del")?>
        <!-- ใช้เพื่อ delete และ update form -->
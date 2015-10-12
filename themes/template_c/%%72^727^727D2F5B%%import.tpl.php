<?php /* Smarty version 2.6.14, created on 2015-08-10 10:41:33
         compiled from purchase/import.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	this.Supplierstore = Ext.create('Ext.data.Store', {
		fields: ['id', 'name'],
		autoLoad: true,
		proxy: {
			type: 'ajax',
			url: 'index.php?model=supplier&action=userlist',
			actionMethods:{
				read:'POST'
			},
			reader: {
				type: 'json',
				totalProperty: 'totalCount',
				idProperty: 'id',
				root: 'topics'
			}
		}
	});
    var simple = new Ext.FormPanel({
        frame:true,
        title: '采购批量导入',
		fileUpload:true,
        bodyStyle:'padding:5px 5px 0',
		margin:20,
        width: 550,
		renderTo:document.body,
        items: [{
								xtype:'combo',
								store: Supplierstore,
								valueField :"id",
								displayField: "name",
								mode: 'remote',
								pageSize:30,
								minListWidth:220,
       							labelWidth: 75,
								width:400,
								forceSelection: true,
								triggerAction: 'all',
								hiddenName:'supplier',
								fieldLabel: '供应商',
								allowBlank:false,
								emptyText:'请选择供应商',
								id:'supplier_id',
									listeners: {
										beforequery:function(qe){
											qe.combo.store.on('beforeload',function(){
												Ext.apply(
												this.baseParams,
												{
													key:qe.query
												});
												});
												qe.combo.store.load();
											}
										}						
							},{
				fieldLabel: 'xls文件',
				xtype: 'fileuploadfield',
       			labelWidth: 75,
				width:400,
				allowBlank:false,
				name:'file_path'
            }
        ],

        buttons: [{
				text: '导入',
				type: 'submit',
				handler:function(){formsubmit();}
			}]
    });
    var simple1 = new Ext.FormPanel({
        frame:true,
        title: '采购系统分配供应商导入',
		fileUpload:true,
        bodyStyle:'padding:5px 5px 0',
		margin:20,
        width: 550,
		renderTo:document.body,
        items: [{
				fieldLabel: 'xls文件',
				xtype: 'fileuploadfield',
       			labelWidth: 75,
				width:400,
				allowBlank:false,
				name:'file_path'
            }
        ],

        buttons: [{
				text: '导入',
				type: 'submit',
				handler:function(){formsubmit1();}
			}]
    });
    var simple2 = new Ext.FormPanel({
        frame:true,
        title: '采购询价导入',
		fileUpload:true,
        bodyStyle:'padding:5px 5px 0',
		margin:20,
        width: 550,
		renderTo:document.body,
        items: [{
				fieldLabel: 'xls文件',
				xtype: 'fileuploadfield',
       			labelWidth: 75,
				width:400,
				allowBlank:false,
				name:'file_path'
            }
        ],

        buttons: [{
				text: '导入',
				type: 'submit',
				handler:function(){
					if(simple2.form.isValid()){
						simple2.form.doAction('submit',{
							 url:'index.php?model=Purchasequote&action=upload',
							 method:'post',
							 params:'',
							 success:function(form,action){
							 		if (action.result.success) {
										Ext.example.msg('导入成功',action.result.msg);
									} else {
										Ext.Msg.alert('导入错误',action.result.msg);
							 		}
							 },
							 failure:function(form,action){
									Ext.Msg.alert('操作',action.result.msg);
							 }
              });}}
			}]
    });
	var formsubmit = function(){
		if(!Ext.getCmp('supplier_id').getValue()) Ext.example.msg('Error','请选择供应商进行导入！');
					  if(simple.form.isValid()){
						simple.form.doAction('submit',{
							 url:'index.php?model=purchaseorder&action=upload',
							 method:'post',
							 params:'',
							 success:function(form,action){
							 		if (action.result.success) {
										Ext.example.msg('导入成功',action.result.msg);
									} else {
										Ext.Msg.alert('导入错误',action.result.msg);
							 		}
							 },
							 failure:function(form,action){
									Ext.Msg.alert('操作',action.result.msg);
							 }
                      });
					}
				}
	var formsubmit1 = function(){
					  if(simple1.form.isValid()){
						simple1.form.doAction('submit',{
							 url:'index.php?model=purchaseorder&action=upload1',
							 method:'post',
							 params:'',
							 success:function(form,action){
							 		if (action.result.success) {
										Ext.example.msg('导入成功',action.result.msg);
									} else {
										Ext.Msg.alert('导入错误',action.result.msg);
							 		}
							 },
							 failure:function(form,action){
									Ext.Msg.alert('操作',action.result.msg);
							 }
                      });
					}
				}
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php /* Smarty version 2.6.14, created on 2015-09-10 16:32:18
         compiled from Inventory/stockinimport.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	var stocktype = [<?php echo $this->_tpl_vars['stockin_type']; ?>
];
	var depot = [<?php echo $this->_tpl_vars['depot']; ?>
];
	var Supplierstore = Ext.create('Ext.data.JsonStore', {
			fields:['id','name'],
			remoteSort:true,
			proxy: {
				type: 'ajax',
				url:'index.php?model=supplier&action=userlist',
				actionMethods:{
					read: 'POST'
				},
				reader: {
					type: 'json',
					totalProperty: 'totalCount',
					idProperty:'id',
					root: 'topics'
				}
			}
    	});
    var simple = new Ext.FormPanel({
        labelWidth: 75,
        frame:true,
        title: '入库批量导入',
		fileUpload:true,
        bodyStyle:'padding:5px 5px 0',
        width: 350,
        defaults: {width: 150},
        defaultType: 'textfield',
		renderTo:document.body,
        items: [{
								xtype:'combo',
								store: Supplierstore,
								valueField :"id",
								displayField: "name",
								mode: 'remote',
								labelWidth:65,
								width:200,
								forceSelection: true,
								triggerAction: 'all',
								hiddenName:'supplier',
								fieldLabel: '供应商',
								allowBlank:false,
								pageSize:30,
								minListWidth:220,
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
								xtype:'combo',
								store: Ext.create('Ext.data.ArrayStore',{
									 fields: ["id", "key_type"],
									 data: stocktype
								}),
								valueField :"id",
								displayField: "key_type",
								mode: 'local',
								labelWidth:65,
								width:200,
								editable: false,
								forceSelection: true,
								triggerAction: 'all',
								hiddenName:'stocktype',
								value:1,
								allowBlank:false,
								fieldLabel: '类型',
								id:'stocktype_id'
							},{
								xtype:'combo',
								store: Ext.create('Ext.data.ArrayStore',{
									 fields: ["id", "key_type"],
									 data: depot
								}),
								valueField :"id",
								displayField: "key_type",
								mode: 'local',
								editable: false,
								forceSelection: true,
								hiddenName:'depot_id',
								triggerAction: 'all',
								fieldLabel: '仓库',
								allowBlank:false,
								pagesise:10,
								labelWidth:65,
								width:200,
								value:0,
								id:'depot'							
							},{
				fieldLabel: 'xls文件',
				labelWidth:65,
				width:280,
				xtype: 'fileuploadfield',
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
	var formsubmit = function(){
		if(!Ext.getCmp('supplier_id').getValue()) Ext.example.msg('Error','请选择供应商进行导入！');
					  if(simple.form.isValid()){
						simple.form.doAction('submit',{
							 url:'index.php?model=stockin&action=upload',
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
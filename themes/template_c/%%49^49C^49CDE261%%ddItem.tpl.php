<?php /* Smarty version 2.6.14, created on 2015-08-26 11:19:34
         compiled from dd/ddItem.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/normalgrid.js"></script>
<script type="text/javascript">
Ext.define('Ext.ux.DiGrid',{
	extend:'Ext.ux.NormalGrid',
	initComponent: function() {
		this.getSelectionModel().on('selectionchange', function(sm,record){
			if(record.length > 0){
				var id = record[0].data.id; //获取选中行id
				Ext.Ajax.request({
				   url: 'index.php?model=dd&action=getInfo&id='+id,
				   success: function(result){
						json = Ext.decode(result.responseText); 
						Ext.getCmp('di_id').setValue(json.id);
						Ext.getCmp('di_value').setValue(json.di_value);
						Ext.getCmp('di_caption').setValue(json.di_caption);
						}
				});	
			}
		});
        this.callParent(this);
    },
	createBbar: function() {
        this.bbar = [];
    },
	createColumns: function() {
        var cols = [{
						header: '值',
						flex:0.3,
						dataIndex: 'di_value'
					},{
						header: '名称',
						flex:0.7,
						dataIndex: 'di_caption'
					}];
        this.columns = cols;
    },
    createTbar: function() {
    	var me = this;
        this.tbar = ['->',{
            text: '编辑字典项',
            iconCls: 'x-tbar-update',
            id: 'editBtn',
			ref: '../editBtn',
			hidden:true,
            handler: function(){void(0)}
        }, {
           text: '删除',
            id: 'removeBtn',
			ref: '../removeBtn',
            handler: this.removeRecord.bind(me)
        }];
    },
});
Ext.onReady(function() {
	Ext.QuickTips.init();
    var grid1 = Ext.create('Ext.ux.DiGrid',{
		region:'center',
		headers:['序号','值','名称'],
        fields: ['id','di_value','di_caption'],
		frame:true,
		listURL:'index.php?model=dd&action=itemList&id=<?php echo $_GET['id']; ?>
',
		delURL:'index.php?model=dd&action=delete',
    });
	var top =Ext.create('Ext.FormPanel',{
        buttonAlign:'right',
		id:'formId',
		labelWidth:40,
        frame:false, 
        border:false,
        bodyStyle:'padding:5px 5px 0',
		defaultType: 'textfield',
        items: [{
        		xtype:'numberfield',
        		id:'di_value',
                fieldLabel: '值',
                allowBlank:false,
                name: 'di_value'
            },{
                fieldLabel: '名称',
                id:'di_caption',
                allowBlank:false,
                name: 'di_caption'
            },{
				xtype:'hidden',
				name: 'di_id',
				id:'di_id',
				value: ''
			},{
				xtype:'hidden',
				name: 'dd_id',
				value: '<?php echo $_GET['id']; ?>
'
			}],

        buttons: [{
            text: '保存',
				handler:function(){
					if(top.form.isValid()){
						top.form.doAction('submit',{
							 url:'index.php?model=dd&action=save',
							 method:'post',
							 params:'',
							 success:function(form,action){
							 	if (action.result.msg!='OK') {
							 		Ext.Msg.alert('出错啦',action.result.msg);
							 	} else {
							 		Ext.example.msg('操作','保存成功!');
							 		grid1.getStore().reload();
							 		top.form.reset();
							 	}
							 },
							 failure:function(){
									Ext.example.msg('操作','服务器出现错误请稍后再试！');
							 }
                      });
					}
					}
        },{
            text: '重置',
			handler:function(){top.form.reset();}
        }]
    });
	var viewport = Ext.create('Ext.Viewport',{
        layout:'border',
        items:[
			grid1,{
				region:'south',
				title:'管理字典项',
				collapsible: true,
				height: 150,
				border:false,
				items:top
                }
		]}
	);
	grid1.getStore().load({
		params:{start:0,limit:grid1.pagesize}
	});
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
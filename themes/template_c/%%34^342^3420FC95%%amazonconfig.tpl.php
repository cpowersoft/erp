<?php /* Smarty version 2.6.14, created on 2015-08-17 16:34:37
         compiled from system/amazonconfig.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/normalgrid.js"></script>
<script type="text/javascript" src="js/system/amazonconfig.js"></script>
    <script type="text/javascript">
Ext.onReady(function() {
	Ext.QuickTips.init();
	Ext.form.Field.prototype.msgTarget = 'side';
	var scheduletime = [<?php echo $this->_tpl_vars['scheduletime']; ?>
];
	var scheduletype = [<?php echo $this->_tpl_vars['scheduletype']; ?>
];
	var requesttype = [<?php echo $this->_tpl_vars['requesttype']; ?>
];
	var amazonaccount = [<?php echo $this->_tpl_vars['amazonaccount']; ?>
];
    var AmazonGrid = Ext.create('Ext.ux.AmazonGrid',{
		id:'AmazonGrid',
        title: 'Amazon Schedule列表',
		headers:['帐号名','schedule类型','时间周期'],
        fields: ['id','account_id','ReportType','Schedule'],
		width:600,
		frame:true,
		loadMask:true,
		saveURL:'index.php?model=amazon&action=Update',
		listURL:'index.php?model=amazon&action=List',
		windowTitle:'Schedule编辑',
		arrdata:[amazonaccount,scheduletype,scheduletime],
		windowWidth:350,
		windowHeight:180,
        renderTo: document.body
    });
    var top = Ext.create('Ext.FormPanel',{
		id:'loadform',
        buttonAlign:'center',
        align:'right',
		labelAlign:'right',
		labelWidth:70,
        frame:true,
        title: '即时Report',
        bodyStyle:'padding:5px',
		style:'margin-top:10px',
		renderTo:document.body,
		width:380,
        items: [{
			xtype:'panel',
			border:false,
			layout:'hbox',
			items:[{
	    	xtype:'datefield',
			fieldLabel:'开始时间',
	        name: 'start',
			labelWidth:80,
			width:250,
	        allowBlank:false,
			value:new Date(),
			format:'Y-m-d'
	        },{
	    	xtype:'timefield',
	        name: 'stime',
			format:'G',
			increment:60,
			width:65,
			value:'0',
	        allowBlank:false,
	        }]
			},{
			xtype:'panel',
			border:false,
			layout:'hbox',
			items:[{
	    	xtype:'datefield',
	        name: 'end',
			fieldLabel:'结束时间',
			labelWidth:80,
			width:250,
	        allowBlank:false,
			value:new Date(),
			format:'Y-m-d',
	        },{
	    	xtype:'timefield',
	        name: 'etime',
			format:'G',
			increment:60,
			width:65,
			value:'23',
	        allowBlank:false,
	        }]
			},{
	        xtype:'combo',
	        store: new Ext.data.SimpleStore({
	             fields: ["id", "account_name"],
	             data: amazonaccount
	        }),
	        valueField :"id",
			labelWidth:80,
			width:315,
	        displayField: "account_name",
	        mode: 'local',
	        editable: false,
	        forceSelection: true,
	        triggerAction: 'all',
	        hiddenName:'id',
	        fieldLabel: '账号',
	        emptyText:'选择账号',
	        name: 'id',
			allowBlank:false,
			blankText:'请选择'
	        },{
	        xtype:'combo',
	        store: new Ext.data.SimpleStore({
	             fields: ["id", "account_name"],
	             data: requesttype
	        }),
	        valueField :"id",
	        displayField: "account_name",
	        mode: 'local',
			labelWidth:80,
			width:315,
	        editable: false,
	        forceSelection: true,
	        triggerAction: 'all',
	        hiddenName:'type',
	        fieldLabel: 'Report类型',
	        emptyText:'选择类型',
	        name: 'type',
			allowBlank:false,
			blankText:'请选择'
	        }
        ],

        buttons: [{
            text: '请求Report',
			handler:function(){
				if(top.form.isValid()){
					Ext.getBody().mask("Requesting Data .waiting...","x-mask-loading");
						top.form.doAction('submit',{
							 url:'index.php?model=amazon&action=reportrequest',
							 method:'post',
							 params:'',
							 success:function(form,action){
							 		if (action.result.success) {
										Ext.getBody().unmask();
										Ext.example.msg('MSG',action.result.msg);
									} else {
										Ext.getBody().unmask();
										Ext.Msg.alert('修改失败',action.result.msg);
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
	
	AmazonGrid.getStore().load({
			params:{start:0,limit:AmazonGrid.pagesize}
			});
	loadend();
});
    </script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
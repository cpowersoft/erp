<?php /* Smarty version 2.6.14, created on 2015-09-30 10:04:23
         compiled from message/loadmessage.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
Ext.onReady(function(){
	var account = object_Array([<?php echo $this->_tpl_vars['account']; ?>
]);
    Ext.QuickTips.init();
    Ext.form.Field.prototype.msgTarget = 'side';	
    var top = new Ext.FormPanel({
		id:'loadform',
        buttonAlign:'center',
        align:'center',
		labelWidth:70,
        frame:true,
        title: 'Message加载',
        bodyStyle:'padding:5px 5px 0',
		style:'margin:10px',
		width:300,
        items: [{
	    	xtype:'datefield',
	        fieldLabel: '开始时间',
	        name: 'start',
	        allowBlank:false,
			format:'Y-m-d',
			value:'<?php echo $this->_tpl_vars['yesterday']; ?>
',//'<?php echo $this->_tpl_vars['yesterday']; ?>
',
			maxValue:'<?php echo $this->_tpl_vars['today']; ?>
',
	        anchor:'90%'
	        },{
	    	xtype:'datefield',
	        fieldLabel: '结束时间',
	        name: 'end',
			format:'Y-m-d',
	        allowBlank:false,
			value:'<?php echo $this->_tpl_vars['yesterday']; ?>
',
			maxValue:'<?php echo $this->_tpl_vars['today']; ?>
',
	        anchor:'90%'
	        },{
	        xtype:'combo',
	        store: new Ext.data.SimpleStore({
	             fields: ["id", "account_name"],
	             data: [<?php echo $this->_tpl_vars['account']; ?>
]
	        }),
	        valueField :"id",
	        displayField: "account_name",
	        mode: 'local',
	        editable: false,
	        forceSelection: true,
	        triggerAction: 'all',
	        hiddenName:'id',
	        fieldLabel: 'Ebay账号',
	        emptyText:'选择Ebay账号',
	        name: 'id',
			allowBlank:false,
			blankText:'请选择'
	        }
        ],

        buttons: [{
            text: '加载Message',
			handler:function(){
				if(top.form.isValid()){
						//msgWindow.show();
						var id = top.getForm().getFieldValues().id;
						var starttime=Ext.util.Format.date(top.getForm().getFieldValues().start,'Y-m-d');
						var endtime = Ext.util.Format.date(top.getForm().getFieldValues().end,'Y-m-d');
						parent.newTab('messageload','加载Message','index.php?model=message&action=loadebay&id='+id+'&start='+starttime+'&end='+endtime);

				}
			}
        },{
        	text: '重置',
			handler:function(){top.form.reset();}
        }]
    });
	
	
	top.render(document.body);
    loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
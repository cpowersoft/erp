<?php /* Smarty version 2.6.14, created on 2015-09-07 15:25:04
         compiled from template/order.tpl */ ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['cfg']['page']['title']; ?>
</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="common/lib/ext/resources/css/ext-all.css"/>
<link rel="stylesheet" type="text/css" href="common/lib/ext/resources/css/xtheme-gray.css"/>
<link rel="stylesheet" type="text/css" href="themes/default/css/common.css"/>
<script type="text/javascript" src="common/lib/ext/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="common/lib/ext/ext-all.js"></script>
<!--<script type="text/javascript" src="common/lib/ext/ext-all-debug.js"></script>-->
<script type="text/javascript" src="common/js/common1.js"></script>
<script type="text/javascript">
Ext.BLANK_IMAGE_URL = '<?php echo @CFG_PATH_IMAGES; ?>
s.gif';
</script>
</head>
<body>
<link rel="stylesheet" type="text/css" href="common/lib/ext/ux/css/MultiSelect.css"/>
<script type="text/javascript" src="common/lib/ext/ux/MultiSelect.js"></script>
<script type="text/javascript" src="common/lib/ext/ux/ItemSelector.js"></script>
<script type="text/javascript">
Ext.onReady(function() {
	Ext.QuickTips.init();
    var ds = new Ext.data.ArrayStore({
        data: [<?php echo $this->_tpl_vars['order_field']; ?>
],
        fields: ['value','text']
    });
    var ds1 = new Ext.data.ArrayStore({
        data: [<?php echo $this->_tpl_vars['orderexport']; ?>
],
        fields: ['value','text']
    });
    var isForm = new Ext.form.FormPanel({
        title: '导出模版设置',
        width:700,
		buttonAlign:'center',
        bodyStyle: 'padding:10px;',
        renderTo: document.body,
        items:[{
            xtype: 'itemselector',
            id: 'itemselector',
			name:'itemselector',
            fieldLabel: '导出字段',
	        imagePath: 'common/lib/ext/ux/images/',
            multiselects: [{
                width: 250,
                height: 200,
                store: ds,
                displayField: 'text',
                valueField: 'value'
            },{
                width: 250,
                height: 200,
				displayField: 'text',
				valueField: 'value',
                store: ds1,
                tbar:[{
                    text: '清空',
                    handler:function(){
	                    isForm.getForm().findField('itemselector').reset();
	                }
                }]
            }]
        }],

        buttons: [{
            text: 'Save',
            handler: function(){
                if(isForm.getForm().isValid()){
						isForm.form.doAction('submit',{
							 url:'index.php?model=Template&action=saveorder',
							 method:'post',
							 params:'',
							 success:function(form,action){
							 		if (action.result.msg=='OK') {
										Ext.example.msg('保存成功',action.result.msg);
									} else {
										Ext.example.msg('保存失败',action.result.msg);
							 		}
							 },
							 failure:function(){
									Ext.example.msg('操作','服务器出现错误请稍后再试！');
							 }
                      });
                }
            }
        }]
    });
	loadend();
});
    </script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
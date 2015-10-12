<?php /* Smarty version 2.6.14, created on 2015-08-17 10:20:51
         compiled from dd/dd.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/normalgrid.js"></script>
<script type="text/javascript">
Ext.define('Ext.ux.DDGrid',{
	extend:'Ext.ux.NormalGrid',
	initComponent: function() {
        this.callParent(this);
    },
	createColumns: function() {
        var cols = [{xtype:'rownumberer'},{
						header: '标识',
						flex:1,
						dataIndex: 'dd_name'
					},{
						header: '名称',
						flex:1,
						dataIndex: 'dd_caption'
					}];
        this.columns = cols;
    },
    createTbar: function() {
    	var me = this;
        this.tbar = [{
            text: '编辑字典项',
            iconCls: 'x-tbar-update',
            id: 'editBtn',
			ref: '../editBtn',
			disabled:true,
            handler: function(){
				var id = getId(me);
				if (id) {
					parent.openWindow('4000122','编辑字典项目','index.php?model=dd&action=editItem&id='+id,300,500);
				} else {
					Ext.example.msg('出错啦','你还没有选择要操作的记录！');
				}
			}
        }, {
            text: '删除',
            id: 'removeBtn',
			hidden:true,
            handler: function(){void(0)}
        }];
    },
});
Ext.onReady(function() {
	Ext.QuickTips.init();
    var grid = Ext.create('Ext.ux.DDGrid',{
		title:'条目列表',
		headers:['序号','标识','名称'],
        fields: ['id','dd_name','dd_caption'],
		width:600,
		frame:true,
		listURL:'index.php?model=dd&action=list',
        renderTo: document.body
    });
	grid.getStore().load({
			params:{start:0,limit:grid.pagesize}
			});
	loadend();
});
</script>
  <div id="north-div"></div>
  <div id="center"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php /* Smarty version 2.6.14, created on 2015-08-10 13:20:53
         compiled from Inventory/ScanStockinAdd.tpl */ ?>
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/inventory/addscan.js"></script>
<script type="text/javascript">
var prefix= '<?php echo $this->_tpl_vars['prefix']; ?>
';
var yorder_sn='';
Ext.onReady(function(){
    Ext.QuickTips.init();
    var orderinfo = eval(<?php echo $this->_tpl_vars['order']; ?>
);   
    var order_status = [<?php echo $this->_tpl_vars['order_status']; ?>
];
    var Sales_channels = [<?php echo $this->_tpl_vars['Sales_channels']; ?>
];
    var stocktype = [<?php echo $this->_tpl_vars['stockin_type']; ?>
];
    var depot = [<?php echo $this->_tpl_vars['depot']; ?>
];
    var pid = [<?php echo $this->_tpl_vars['pid']; ?>
];       
    Ext.form.Field.prototype.msgTarget = 'side';
    var queryForm = Ext.create('Ext.form.Panel', {
        id: 'query_form_id',
        url: 'index.php?model=stockin&action=PScanhandle',
        border: false,
        frame: false,
        height:100,                                          
        labelAlign: 'left',
        bodyStyle: 'padding:25px;',
        items: [{
            xtype: 'fieldset',
            border: false,
            layout: 'hbox',
            items: [{
                xtype: 'displayfield',
                value: '产品条码:'
            }, {
                name: 'keyword',
                id: 'keyword',
                xtype: 'textfield',
                allowBlank: false,
                filedLable: '产品条码',
                width: 200,          
                blankText: '不能为空',
                style: 'margin-left:5px;text-indent:5px;',
                enableKeyEvents: true,
                listeners: {
                    scope: this,
                    keypress: function(field, e){
                        if (e.getKey() == 13) {
                            var form = Ext.getCmp("query_form_id").getForm();
                            if (form.isValid()) {
                                var number = form.findField('keyword').getValue();
                               
                                if (Ext.getCmp('good_form_id').goodsstore.find('goods_id', number) == -1) {
                                    form.submit({
                                        success: function(form, action){
                                                                           
                                            if (action.result.success == true) {
                                                
                                                Ext.get("cueinfo_id").update(action.result.msg);
                                                
                                                if (action.result.porder_id != undefined) 
                                                    form.findField('porder_id').setValue(action.result.porder_id);
                                                    
                                                if (action.result.goods != undefined) {
                                                    var Item = Ext.getCmp('good_form_id').recordItem;
                                                    var record = action.result.goods;
                                                    var row = new Item(record);
                                                    var goods_id = record.goods_id;
                                                    var index = Ext.getCmp('good_form_id').goodsstore.findBy(function(record, id){
                                                        return record.get('goods_id') == goods_id;
                                                    });
                                                    
                                                    if (index < 0) {
                                                        Ext.getCmp('good_form_id').goodsstore.insert(0, row);
                                                              
                                                    }
                                                    else {
                                                        Ext.example.msg('error', '该产品已扫描,请直接修改数量');
                                                    }
                                                }
                                                form.findField('keyword').setValue();
                                            }
                                            
                                            
                                          
                                        },
                                         failure: function(form, failureaction) {
                                             Ext.get("cueinfo_id").update(failureaction.result.msg); 
                                             form.findField('keyword').setValue(); 
                                        }
                                        
                                    });
                                }
                                else {
                                    Ext.get("cueinfo_id").update('产品编码已扫描!');
                                }
                            }//form.isValid()                            
                        }//e.getKey
                    }//keypress
                }//listeners
            }, {
                style: 'margin-left:20px;',
                border: false,
                html: '<div id="cueinfo_id"></div>'
            }, {
                name: 'porder_id',
                id: 'porder_id',
                xtype: 'textfield',
                hidden: true,
                value: pid
            }]
        }]
    });
    
    var viewport = new Ext.Viewport({
        layout: 'border',
        items: {
            xtype: 'container',
            region: 'center',
            items: [queryForm, Ext.create('Ext.ux.test.inventory.scan', {
                id: 'good_form_id',
                depot: depot,
                saveURL: 'index.php?model=stockin&action=savescan',
            })]
        }
    });
    loadend();
});
</script>
  <div id="center"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                  
    
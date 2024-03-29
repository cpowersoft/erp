﻿Ext.define('Ext.ux.test.inventory.scan', {//GoodForm
    extend: 'Ext.form.Panel',
    initComponent: function(){
        this.buttonAlign = 'center';
        this.creatGoodsstore();
        this.creatGoodsgrid();
        this.creatItems();
        this.creatButtons();
        this.createRecordItem();
        this.goodsGrid.getSelectionModel().on('selectionchange', function(sm){
            Ext.getCmp('removeBtn').setDisabled(!sm.hasSelection());
        });
        this.callParent();
    },
    creatItems: function(){
        this.items = [this.goodsGrid];
    },
    creatGoodsstore: function(){
        
        this.goodsstore = Ext.create('Ext.data.JsonStore', {
            fields:['rec_id', 'order_id', 'goods_id', 'goods_price', 'goods_qty', 'arrival_qty', 'return_qty', 'remark', 'goods_sn', 'goods_name'],
            
        });
        
                  
		/*var thiz = this;
        this.goodsstore = Ext.create('Ext.data.Store', {
            model: this.recordItem
        })                  */
		console.log(this.goodsstore);
        /*this.goodsstore = new Ext.data.Store({
         data: [],
         pruneModifiedRecords: true,
         reader: new Ext.data.JsonReader({
         fields: ['rec_id', 'order_id', 'goods_id', 'goods_price', 'goods_qty', 'arrival_qty', 'return_qty', 'remark', 'goods_sn', 'goods_name']
         })
         });*/
    },
    removeItem: function(){
        var data = this.goodsGrid.getSelectionModel().getSelected().data;
        var index = this.goodsstore.findBy(function(record, id){
            return record.get('goods_id') == data.goods_id && record.get('goods_qty') == data.goods_qty;
        });
        var goodsstore = this.goodsstore;
        Ext.Msg.confirm('Delete Alert!', 'Are you sure?', function(btn){
            if (btn == 'yes') {
                goodsstore.remove(goodsstore.getAt(index));
                return;
            }
        }, this.goodsGrid);
    },
    
    creatGoodsgrid: function(){
        this.goodsGrid = Ext.create('Ext.grid.Panel', {
			title:'产品清单',
            id: "proListPanel",
			border:false,
            height: 400,
            autoWidth: true,
            columns: [{
				flex:1,
                header: '产品编码<font color=red>*</font>',
                dataIndex: 'goods_sn',
                align: 'left'
            }, {
				flex:1,
                header: '产品名称<font color=red>*</font>',
                width: 250,
                dataIndex: 'goods_name',
                align: 'left'
            }, {
                header: '产品数量<font color=red>*</font>',
                dataIndex: 'goods_qty',
				flex:1,
                align: 'right',
                editor: new Ext.form.NumberField({
                    allowBlank: false,
                    allowNegative: false,
                    decimalPercision: 4,
                    style: 'text-align:left'
                })
            }, {
                header: '产品价格<font color=red>*</font>',
                dataIndex: 'goods_price',
				flex:1,
                align: 'right'
            }, {
                header: '关联单据',
                dataIndex: 'relate_order_sn',
				flex:1,
                align: 'right'
            }, {
                header: '产品备注',
                width: 200,
				flex:1,
                dataIndex: 'remark',
                align: 'left'
            }],
            selModel: Ext.create('Ext.selection.CheckboxModel'),
            store: this.goodsstore,
            clicksToEdit: 1,
            stripeRows: true,
            viewConfig: {
                forceFit: true
            },
            border: false,
            iconCls: 'icon-grid',
            tbar: new Ext.Toolbar({
                items: ['选择入库仓库货架', {
                    xtype: 'combo',
                    store: Ext.create('Ext.data.ArrayStore', {
                        fields: ["id", "key_type"],
                        data: this.depot
                    }),
                    valueField: "id",
                    displayField: "key_type",
                    mode: 'local',
                    editable: false,
                    forceSelection: true,
                    hiddenName: 'depot_id',
                    triggerAction: 'all',
                    allowBlank: false,
                    pagesise: 10,
                    width: 250,
                    id: 'depot'
                }, {
                    text: '删除',
                    iconCls: 'x-tbar-del',
                    id: 'removeBtn',
                    handler: this.removeItem.bind(this),
                    disabled: true
                }]
            })
        });
    },
    
    creatButtons: function(){
        this.buttons = [{
            text: '保存',
            type: 'submit',
            handler: this.formsubmit.bind(this)
        }];
    },
    
    createRecordItem: function(){
		 this.recordItem = Ext.define('recordItem', {
            extend: 'Ext.data.Model',
            fields: [{
                name: 'rec_id'
            }, {
                name: 'goods_sn'
            }, {
                name: 'goods_id'
            }, {
                name: 'goods_name'
            }, {
                name: 'goods_qty'
            }, {
                name: 'goods_name'
            }, {
                name: 'relate_order_sn'
            }, {
                name: 'remark'
            }, ]
        })
		
    },
    
    formsubmit: function(){
        if (!Ext.getCmp('depot').getValue()) {
            Ext.example.msg('Error', '请先选择入库货架');
            return;
        }
        var saveURL = this.saveURL;
        var order_id = Ext.fly('porder_id').getValue();
        var m = this.goodsstore.modified.slice(0);
        var thiz = this.goodsstore;
        var jsonArray = [];
        Ext.each(m, function(item){
            jsonArray.push(item.data);
        });
        if (jsonArray.length == 0) {
            Ext.each(thiz.data.items, function(item){
                jsonArray.push(item.data);
            });
        }
        this.getForm().doAction('submit', {
            url: saveURL,
            method: 'post',
            params: {
                'data': Ext.encode(jsonArray),
                'orderid': order_id,
                'depot_id': Ext.getCmp('depot').getValue()
            },
            success: function(form, action){
                if (action.result.success) {
                    Ext.Msg.alert('MSG', '保存成功');
                }
                else {
                    Ext.Msg.alert('保存失败', action.result.msg);
                }
            },
            failure: function(){
                Ext.Msg.alert('ERROR', '处理失败');
            }
        });
    }
});

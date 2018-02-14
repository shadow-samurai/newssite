<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                پیوند جدید
            </header>
            <div class="panel-body">
<!--                 <form role="form" action="link.php?type=insert" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">عنوان دسته بندی</label>
                        <input type="input" class="form-control" name="name" placeholder="نام">
                    </div>
                       <input type="input" class="form-control span9" name="address" placeholder="آدرس">
                    </div>
                    <button type="submit" class="btn btn-info">ارسال</button>
                </form>
 -->


<div id="jqGrid_container">
                    <table id="jqGrid"></table>
                    <div id="jqGridPager"></div>
                </div>
<script type="text/javascript">
$(document).ready(function () {
var template = "<div style='margin-left:15px;'>";
    template += "<div> name: </div><div>{name} </div>";
    template += "<div> url: </div><div>{url} </div>";
    template += "<hr style='width:100%;'/>";
    template += "<div> {sData} {cData}  </div></div>";
    $("#jqGrid").jqGrid({
    url: 'link.php?type=show',
    editurl: 'clientArray',
    datatype: "json",
    colModel: [
    {label: 'شناسه',name: 'id',width: 40,key: true,editable: true,editrules : { required: true}},
    {label: 'نام سایت',name: 'name',width: 100,editable: true},
    {label: 'آدرس سایت',name: 'url',width: 100,editable: true},
    ],
    shrinkToFit: true,
    autowidth: true,
    sortname: 'id',
    sortorder : 'asc',
    loadonce: true,
    viewrecords: true,
    width: "100%",
    height: 200,
    rowNum: 10,
    pager: "#jqGridPager",
    // addurl: 'link.php?type=update'
    });

    $('#jqGrid').navGrid('#jqGridPager',
    // the buttons to appear on the toolbar of the grid
    { edit: true, add: true, del: true, search: true, refresh: true, view: true, position: "left", cloneToTop: true },
    // options for the Edit Dialog
    // <input type="button" value="Get Selected Row" onclick="getSelectedRow()" />

    {
    editCaption: "The Edit Dialog",
    template: template,
    errorTextFormat: function (data) {
    return 'Error: ' + data.responseText
    }
    },
    // options for the Add Dialog
    {
    template: template,
    errorTextFormat: function (data) {
    return 'Error: ' + data.responseText
    }
    },
    // options for the Delete Dailog
    {
    errorTextFormat: function (data) {
    return 'Error: ' + data.responseText
    }
    });
    });
    function getSelectedRow() {
    var grid = $("#jqGrid");
    var rowKey = grid.jqGrid('getGridParam',"selrow");
    return rowKey;
    }




</script>



            </div>
        </section>
    </div>
</div>
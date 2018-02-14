<div class="row">
    <?php include_once '../config/config.php';?>
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                مدیریت نقشها
            </header>
            <div class="panel-body">
                <div class="col-lg-3">
                    <div id="jqGrid_container">
                    <table id="jqGrid"></table>
                    <div id="jqGridPager"></div>
                </div>
<script type="text/javascript">
$(document).ready(function () {
var template = "<div style='margin-left:15px;'>";
    template += "<div> role_name: </div><div>{role_name} </div>";
    // template += "<div> role: </div><div>{role} </div>";
    // template += "<div> make date </div><div>{PostalCode} </div>";
    // template += "<div> role</div><div> {role} </div>";
    template += "<hr style='width:100%;'/>";
    template += "<div> {sData} {cData}  </div></div>";
    $("#jqGrid").jqGrid({
    url: 'role_query.php?type=role',
    // we set the changes to be made at client side using predefined word clientArray
    editurl: 'clientArray',
    datatype: "json",
    colModel: [
    {label: 'ID',name: 'id',width: 40,key: true,editable: true,editrules : { required: true}},
    {label: 'role_name',name: 'role_name',width: 100,editable: true},
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
    pager: "#jqGridPager"
    });
    $('#jqGrid').navGrid('#jqGridPager',
    // the buttons to appear on the toolbar of the grid
    { edit: true, add: true, del: true, search: false, refresh: false, view: false, position: "left", cloneToTop: false },
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


<div class="col-lg-8">
<form role="form" action="role_query.php?type=insert" method="POST">
    <input type="hidden" name="role_name" value="">
    <table style="width:100%">
        <tr>
            <th>صفحه اصلی</th>
            <th>دسته بدنی ها</th>
            <th>ارسال خبر</th>
            <th>گالری</th>
            <th>پیوندها</th>
            <th>کاربران</th>
            <th>تنظیمات</th>
        </tr>
        <tr>
            <td>        صفحه اصلی
                <input id="main_page" type="checkbox" name="check[]" value="main_page" style="float: right; margin-left: 5px;" onclick="check_select()" />
<script>
function check_select() {
var grid = $("#jqGrid");
var rowKey = grid.jqGrid('getGridParam',"selrow");
if (rowKey>0) {
}else{
alert("ابتدا یک نقش را انتخاب نمایید");
document.getElementById("main_page").checked = false;
}
}
</script>
</td>
<td> دسته بندی
<input type="checkbox" name="check[]" value="category" style="float: right; margin-left: 5px;" />
</td>
<td> ارسال خبر
<input type="checkbox" name="check[]" value="news_send" style="float: right; margin-left: 5px;" /></td>
<td>  مدیریت تصاویر
    <input type="checkbox" name="check[]" value="image_managment" style="float: right; margin-left: 5px;" /></td>
    <td>  نمایش لیاک ها
        <input type="checkbox" name="check[]" value="link_show" style="float: right; margin-left: 5px;" /></td>
        <td> مدیریت کاربران
            <input type="checkbox" name="check[]" value="user_managment" style="float: right; margin-left: 5px;" /></td>
            <td>    تنظیمات کلی نرم افزار
                <input type="checkbox" name="check[]" value="main_setting" style="float: right; margin-left: 5px;" /></td>
            </tr>
            <tr>
                <td> </td>
                <td> </td>
                <td>  نمایش خبر
                    <input type="checkbox" name="check[]" value="news_show" style="float: right; margin-left: 5px;" /></td>
                    <td> مدیریت فیلم
                        <input type="checkbox" name="check[]" value="move_managment" style="float: right; margin-left: 5px;" /></td>
                        <td> تمام لینکها
                            <input type="checkbox" name="check[]" value="link_all" style="float: right; margin-left: 5px;" /></td>
                            <td>  نقشها
                                <input type="checkbox" name="check[]" value="user_role" style="float: right; margin-left: 5px;" /></td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> مدیریت صوتها
                                    <input type="checkbox" name="check[]" value="sound_managment" style="float: right; margin-left: 5px;" /></td>
                                    <td>  </td>
                                    <td> جارت سازمانی
                                        <input type="checkbox" name="check[]" value="user_chart" style="float: right; margin-left: 5px;" /></td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                </table>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
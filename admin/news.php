<div class="row">
    <?php include_once '../config/config.php';?>
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                ارسال خبر جدید
            </header>
            <div class="panel-body">
                <form role="form" action="news_query.php?type=insert" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                    <select name="category">
                        <?php
$select_category = "SELECT `id`,`name` FROM `category`";
mysqli_set_charset($connecion, "utf8");
$result = $connecion->query($select_category);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		?>
     <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                        <?php
}
}
?>
                    </select>
                    <div class="form-group">
                        <label for="exampleInputEmail1">محل نمایش خبر در سایت :  </label>
                        <input type="radio" name="radio" value="1"> نمایش در قسمت وسط
                        <input type="radio" name="radio" value="2"> نمایش در منوی کناری
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">عنوان خبر</label>
                        <input type="input" class="form-control" name="onvan" placeholder="خبر جدید">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">متن خبر</label>
                        <textarea name="editor"></textarea>
                    </div>
                    <script type="text/javascript">
                    CKEDITOR.replace( 'editor' , {
                    filebrowserUploadUrl: "test.php",
                    basicEntities : false,
                    entities : false,
                    forceSimpleAmpersand : true,
                    } );
                    </script>
                    <div class="form-group">
                        <label for="exampleInputFile">ارسال تصویر شاخص برای خبر</label>
                        <input type="file" name="news_pic">
                    </div>
                    <button type="submit" class="btn btn-info">ارسال</button>
                </form>
            </div>
        </section>
    </div>
</div>
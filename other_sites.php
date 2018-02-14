<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                ارسال خبر جدید
            </header>
            <div class="panel-body">
                <form role="form" action="category_query.php?type=insert" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">عنوان دسته بندی</label>
                        <input type="input" class="form-control" name="onvan" placeholder="عنوان">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">ارسال تصویر بند انگشتی برای دسته بندی</label>
                        <input type="file" name="pic">
                    </div>
                    <button type="submit" class="btn btn-info">ارسال</button>
                </form>
            </div>
        </section>
    </div>
</div>
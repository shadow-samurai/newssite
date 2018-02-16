<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                ارسال عکس
            </header>
            <div class="panel-body">
                <form role="form" action="uploads_query.php?file=images" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile" name="pic">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </section>
    </div>
</div>
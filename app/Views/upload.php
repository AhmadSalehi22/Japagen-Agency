<?= form_open_multipart('image/upload') ?>
<div class="containter mt-4">
    <div class="form-group col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Upload Image
                        </h5>
                    </div>
                    <div class="card-body">
                        <label class="mt-1">Image</label>
                        <div class="row">
                            <div class="col-md-8">
                                <input class="form-control my-2" type="file" name="userfile">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary my-2">Upload</button>
                            </div>
                        </div>
                        <?php if (isset($img_url)): ?>
                            <div class="row justify-content-center">
                                <label class="mt-1">Image Uploaded.<br>Link:</label>
                                <textarea class="mt-1"><?=$img_url?></textarea>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<div class="col-12">
    <!-- <button type="button" class="btn-primary" data-toggle="modal" data-target="#modelId1">Choose Image
    </button> -->

    <div class="modal fade" id="modelId1" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-m" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Choose Image</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">

                            <style>
                            [type=radio]:checked+img {
                                outline: 2px solid #f00;
                            }
                            </style>

                            <?php
                            $select_query = "SELECT * FROM filemanager";
                            $select_result = mysqli_query($conn, $select_query);
                            $i = 0;
                            while ($data_select = mysqli_fetch_array($select_result)) {
                                $i++;
                            ?>
                            <label>
                                <input type="radio" name="filename1" 
                                    value="<?php echo $data_select['filelink']; ?>"
                                      />
                                <img src="<?php echo "../../uploads/" . $data_select['filelink']; ?>"
                                    alt="" height="100px;" width="100px;"
                                    style="margin-right:20px;">
                            </label>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="firstFunction()">Save</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap modal end -->

<div class="form-group col-5 mb-0">
    <label class="col-form-label">Image</label>
</div>

<div class="input-group mb-5 col-12">
    <input id="imagebox" type="text" class="form-control" name="img">
    <div class="input-group-append">
        <button type="button" class="btn-primary" data-toggle="modal"
            data-target="#modelId1">Choose Image
        </button>
    </div>
</div>
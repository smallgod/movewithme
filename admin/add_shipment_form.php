<div class="">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" name="basic-layout-colored-form-control">Bill of Lading Info</h4>
            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-body collapse in">
            <div class="card-block">

                <div class="card-text">
                    <p>Bill of Lading is given by a shipment company. First 4 characters represents carrier.</p>
                </div>

                <form class="form" action="../includes/shipment.inc.php" method="post">
                    <div class="form-body">
                        <h4 class="form-section"><i class="icon-eye6"></i> Shipment Details</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bol">Bill Of Lading <code>*</code></label>
                                    <input name="bol" class="form-control border-primary" required="required"  placeholder="XXXX12345672334">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skr">SKR<code>*</code></label>
                                    <input name="skr" class="form-control border-primary">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="origin">Origin</label>
                                    <input name="origin" class="form-control border-primary" placeholder="Origin">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="destination">Destination</label>
                                    <input name="destination" class="form-control border-primary"
                                           placeholder="Destination">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="containerno">Container no</label>
                                    <input name="containerno" class="form-control border-primary"
                                           placeholder="XXXX1234567">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_of_containers">Number of Containers</label>
                                    <input type="number" name="no_of_containers" class="form-control border-primary"
                                           placeholder="Number of Containers">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="weight">Weight</label>
                                    <input name="weight" class="form-control border-primary" placeholder="Total Weight">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rar">RAR</label>
                                    <input name="rar" class="form-control border-primary"
                                           placeholder="Risk Assessment Report">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duty">Duty</label>
                                    <input name="duty" class="form-control border-primary" placeholder="Duty">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edd">Estimated Delivery Date</label>
                                    <input type="date" name="edd" class="form-control border-primary"
                                           placeholder="Estimated Delivery Date">
                                </div>
                            </div>
                        </div>

                        <h4 class="form-section"><i class="icon-mail6"></i> Contact Info</h4>

                        <div class="form-group">
                            <label for="shipper">Shipper</label>
                            <input class="form-control border-primary" placeholder="Shipper" name="shipper">
                        </div>

                        <div class="form-group">
                            <label for="consignee">Consignee</label>
                            <input class="form-control border-primary" placeholder="Consignee" name="consignee">
                        </div>

                        <div class="form-group">
                            <label for="consignor">Consignor</label>
                            <input class="form-control border-primary" name="consignor" placeholder="Consignor">
                        </div>

                        <div class="form-group">
                            <label for="details">More Details </label>
                            <textarea name="details" rows="5" class="form-control border-primary"
                                      placeholder="More Details"></textarea>
                        </div>

                    </div>

                    <div class="form-actions right">
                        <button type="button" class="btn btn-warning mr-1">
                            <i class="icon-cross2"></i> Cancel
                        </button>
                        <button class="btn btn-primary">
                            <i class="icon-check2"></i> Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

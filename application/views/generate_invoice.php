<?php $this->load->view('layouts/header') ?>
        <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Generate Invoice</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" id="invoiceForm" action="<?php echo base_url();?>/invoice/generateInvoice">
                        <div class="card-body" id="invoice-items">
                            <div class="mb-4">
                                <button type="button" class="btn btn-success float-right" id="new_item">Add New item</button>
                            </div>

                            <div class="item" id="item-1">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="input" data-item-parent="1" class="form-control name" name="name[]" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" data-item-parent="1" class="form-control calculate-line-total quantity" min="1" max="100" name="quantity[]" value="1" required>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Unit Price ($)</label>
                                    <input type="number" data-item-parent="1" class="form-control calculate-line-total price" name="price[]" placeholder="price" required>
                                </div>
                                <div class="form-group">
                                    <label>Tax</label>
                                    <select class="form-control calculate-line-total tax" name="tax[]" data-item-parent="1">
                                        <option value="0">0%</option>
                                        <option value="1">1%</option>
                                        <option value="5">5%</option>
                                        <option value="10">10%</option>
                                    </select>
                                </div>
                                <div class="item-total-section d-none" >
                                    <div class="form-group">
                                        <label for="name">Item Total</label>
                                        <input type="input" data-item-parent="1" class="form-control itemTotal" name="itemTotal[]" value="" readonly>
                                        <input type="hidden" data-item-parent="1" class="form-control itemTotalHidden" name="itemTotalActual[]" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Sub total without tax</label>
                                        <input type="input" data-item-parent="1" class="form-control no-tax-total" name="noTaxSubTotal[]" value="" readonly>
                                        <input type="hidden" data-item-parent="1" class="form-control no-tax-total-hidden" name="noTaxSubTotalActual[]" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Sub total with tax</label>
                                        <input type="input" data-item-parent="1" class="form-control tax-total" name="subTotal[]" value="" readonly>
                                        <input type="hidden" data-item-parent="1" class="form-control tax-total-hidden" name="subTotalActual[]" value="" readonly>
                                    </div>
                                </div>
                                <hr>
                                <hr>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="name">Discount</label>
                            <input type="input" data-item-parent="1" class="form-control" id="discount" name="discount" placeholder="Enter discount" >
                        </div>
                        <div class="form-group">
                            <label for="name">Total Amount</label>
                            <input type="input" data-item-parent="1" class="form-control" id="totalAmt" name="totalAmt" placeholder="Enter discount" readonly>
                        </div>


                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="generateInvoice" class="btn btn-info">Generate Invoice</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
        <!-- /.content -->

<div id="item-content" class="d-none">

    <div class="item" id="item-1">
        <div class="d-inline-block w-100">
            <button type="button" class="btn btn-danger remove-item float-right" data-item-parent="1">Remove Item</button>
        </div>
        <div class="form-group mt-4">
            <label for="name">Name</label>
            <input type="input" data-item-parent="1" class="form-control name" name="name[]" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" data-item-parent="1" class="form-control calculate-line-total quantity" min="1" max="100" name="quantity[]" value="1" required>
        </div>
        <div class="form-group">
            <label for="quantity">Unit Price ($)</label>
            <input type="number" data-item-parent="1" class="form-control calculate-line-total price" name="price[]" placeholder="price" required>
        </div>
        <div class="form-group">
            <label>Tax</label>
            <select class="form-control calculate-line-total tax" name="tax[]" data-item-parent="1">
                <option value="0">0%</option>
                <option value="1">1%</option>
                <option value="5">5</option>
                <option value="10">10</option>
            </select>
        </div>
        <div class="item-total-section d-none" >
            <div class="form-group">
                <label for="name">Item Total</label>
                <input type="input" data-item-parent="1" class="form-control itemTotal" name="itemTotal[]" value="" readonly>
                <input type="hidden" data-item-parent="1" class="form-control itemTotalHidden" name="itemTotalActual[]" value="" readonly>
            </div>
            <div class="form-group">
                <label for="name">Sub total without tax</label>
                <input type="input" data-item-parent="1" class="form-control no-tax-total" name="noTaxSubTotal[]" value="" readonly>
                <input type="hidden" data-item-parent="1" class="form-control no-tax-total-hidden" name="noTaxSubTotalActual[]" value="" readonly>
            </div>
            <div class="form-group">
                <label for="name">Sub total with tax</label>
                <input type="input" data-item-parent="1" class="form-control tax-total" name="subTotal[]" value="" readonly>
                <input type="hidden" data-item-parent="1" class="form-control tax-total-hidden" name="subTotalActual[]" value="" readonly>
            </div>
        </div>
        <hr>
        <hr>
    </div>
</div>
<?php $this->load->view('layouts/footer') ?>